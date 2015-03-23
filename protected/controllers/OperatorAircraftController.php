<?php
class OperatorAircraftController extends Controller {
	/**
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	
	/**
	 *
	 * @return array action filters
	 */
	public function filters() {
		return array (
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete'  // we only allow deletion via POST request
				);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * 
	 * @return array access control rules
	 */
	public function accessRules() {
		if (Yii::app ()->user->isGuest)
			$this->redirect ( Yii::app ()->createUrl ( 'site/login' ) );
		
		return array (
				array (
						'allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions' => array (
								'findn',
								'addn',
								'viewbyn',
								'editn' 
						),
						'expression' => '$user->level >= ' . User::USER_OP 
				),
				array (
						'allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions' => array (
								'index',
								'admin',
								'delete',
								'create',
								'view' 
						),
						'expression' => '$user->level >= ' . User::USER_ADMIN 
				),
				array (
						'deny', // deny all users
						'users' => array (
								'*' 
						) 
				) 
		);
	}
	
	/**
	 * Find by N Number.
	 */
	public function actionFindN() {
		$model = new FAAAircraftMaster ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['FAAAircraftMaster'] ))
			$model->attributes = $_GET ['FAAAircraftMaster'];
		
		$this->render ( 'findn', array (
				'model' => $model 
		) );
	}
	
	/**
	 * View by N Number.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 *        	DEPRECATED
	 */
	public function actionViewByN($id) {
		$model = OperatorAircraft::model ()->getFullAircraft ( $id );
		
		$this->render ( 'viewbyn', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Add Aircraft.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 */
	public function actionAddN($id) {
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if (isset ( $_POST ['FAAAircraftMaster'] )) {
			// get logged in user's info
			$userobj = User::model ()->findByPk ( Yii::app ()->user->getId () );
			$opid = $userobj->operator_id;
			
			// add operator_ids to POST data
			$_POST ['FAAAircraftMaster'] ['operator_id'] = $opid;
			
			$modelNew = new OperatorAircraft ();
			$modelRefNew = new OperatorAircraftRef ();
			$modelEngNew = new OperatorAircraftEngref ();
			
			$modelNew->attributes = $_POST ['FAAAircraftMaster'];
			$modelRefNew->attributes = $_POST ['FAAAircraftRef'];
			$modelEngNew->attributes = $_POST ['FAAEngineRef'];
			
			// header('Content-type: text/plain');
			// print_r($_POST);
			// exit;
			
			// validate
			$valid = $modelNew->validate ();
			$valid = $modelRefNew->validate () && $valid;
			$valid = $modelEngNew->validate () && $valid;
			
			// TODO add values below before validation
			if ($valid) {
				$modelNew->home_airport = $_POST ['home_airport'];
				$modelNew->cost_per_hour = $_POST ['cost_per_hour'];
				$modelNew->range = $_POST ['range'];
				$modelNew->save ( false );
				$modelRefNew->derating = $_POST ['derating'];
				$modelRefNew->operator_aircraft_id = $modelNew->id;
				$modelRefNew->save ( false );
				$modelEngNew->operator_aircraft_id = $modelNew->id;
				$modelEngNew->save ( false );
				Yii::app ()->user->setFlash ( 'success', "Aircraft " . $modelNew->n_number . " saved." );
				$this->redirect ( array (
						'findn' 
				) );
			} else {
				Yii::app ()->user->setFlash ( 'error', "Save Error" );
			}
		}
		
		$model = FAAAircraftMaster::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		$modelref = FAAAircraftRef::model ()->findByAttributes ( array (
				'code' => $model->mfr_mdl_code 
		) );
		if ($modelref === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		$modeleng = FAAEngineRef::model ()->findByAttributes ( array (
				'e_code' => $model->eng_mfr_mdl 
		) );
		if ($modeleng === null)
			// throw new CHttpException(404,'The requested page does not exist.');
			$modeleng = new FAAEngineRef ();
		
		$this->render ( 'addn', array (
				'model' => $model,
				'modelref' => $modelref,
				'modeleng' => $modeleng 
		) );
	}
	
	/**
	 * Edit Aircraft.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 */
	public function actionEditN($id) {
		$model = $this->loadModel ( $id );
		$modelref = OperatorAircraftRef::model ()->findByAttributes ( array (
				'operator_aircraft_id' => $model->id 
		) );
		// incomplete data from FAA DB; $modeleng may be null, handle appropriately throughout
		$modeleng = OperatorAircraftEngref::model ()->findByAttributes ( array (
				'operator_aircraft_id' => $model->id 
		) );
		if (is_null ( $modeleng )) {
			$nulleng = 1;
		} else {
			$nulleng = 0;
		}
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$image = new UploadImage ( $model->id, $model->n_number . '_1', 'raw' );
		
		if (isset ( $_POST ['update'] )) {
			if (isset ( $_POST ['UploadImage'] )) {
				$image->attributes = $_POST ['UploadImage'];
				$image->image = $_POST ['UploadImage'] ['image'];
				$image->upload ();
			}
			$model->attributes = $_POST ['OperatorAircraft'];
			$modelref->attributes = $_POST ['OperatorAircraftRef'];
			if ($nulleng != 1) {
				$modeleng->attributes = $_POST ['OperatorAircraftEngref'];
			}
			
			// validate
			$valid = $model->validate ();
			$valid = $modelref->validate () && $valid;
			if ($nulleng != 1) {
				$valid = $modeleng->validate () && $valid;
			}
			
			if ($valid) {
				$model->save ( false );
				$modelref->save ( false );
				if ($nulleng != 1) {
					$modeleng->save ( false );
				}
				Yii::app ()->user->setFlash ( 'success', "Record Updated" );
				$this->redirect ( array (
						'editn',
						'id' => $model->id 
				) );
			} else {
				Yii::app ()->user->setFlash ( 'error', "Save Error" );
			}
		}
		if (isset ( $_POST ['cancel'] )) {
			$this->redirect ( array (
					'co/index' 
			) );
		}
		
		$this->render ( 'editn', array (
				'model' => $model,
				'modelref' => $modelref,
				'modeleng' => $modeleng,
				'image' => $image 
		) );
	}
	
	/**
	 * Displays a particular model.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render ( 'view', array (
				'model' => $this->loadModel ( $id ) 
		) );
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model = new OperatorAircraft ();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['OperatorAircraft'] )) {
			$model->attributes = $_POST ['OperatorAircraft'];
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->id 
				) );
		}
		
		$this->render ( 'create', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel ( $id );
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['OperatorAircraft'] )) {
			$model->attributes = $_POST ['OperatorAircraft'];
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->id 
				) );
		}
		
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		$this->loadModel ( $id )->delete ();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if (! isset ( $_GET ['ajax'] ))
			$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
					'admin' 
			) );
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		$dataProvider = new CActiveDataProvider ( 'OperatorAircraft' );
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new OperatorAircraft ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['OperatorAircraft'] ))
			$model->attributes = $_GET ['OperatorAircraft'];
		
		$this->render ( 'admin', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be loaded
	 * @return OperatorAircraft the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id) {
		$model = OperatorAircraft::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 * 
	 * @param OperatorAircraft $model
	 *        	the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'operator-aircraft-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
