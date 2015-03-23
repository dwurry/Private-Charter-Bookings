<?php

/*
 * User Admin
 */
class UserController extends Controller{
	
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
	public function filters(){
		return array('accessControl',		// perform access control for CRUD operations
		'postOnly + delete'); // we only allow deletion via POST request
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 *
	 * @return array access control rules
	 */
	public function accessRules(){
		if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->createUrl('site/login'));
		return array(array('allow','actions'=>array('travelerEntry','accessViolation','deleteCrmLink'),'expression'=>'$user->level >= ' . User::USER_US),array('allow','actions'=>array('index','view','admin','delete','create','update'),'expression'=>'$user->level >= ' . User::USER_ADMIN),array('deny','users'=>array('*')));
	}
	
	/**
	 * Displays a particular model.
	 *
	 * @param integer $id
	 *        the ID of the model to be displayed
	 */
	public function actionView($id){
		if(!CrmLink::authorizeUserAccess($id)){
			// log
			Yii::app()->utility->logActivity("u", Yii::app()->user->getId(), "view", "user", 'User # ' . Yii::app()->user->getId() . ' attempted unathorized access to the user' . $id);
			$this->render('accessViolation');
		}else{
			$this->render('view', array('model'=>$this->loadModel($id)));
		}
	}
	public function actionAccessViolation(){
		// log
		Yii::app()->utility->logActivity("u", Yii::app()->user->getId(), "view", "user", "access violation");
		$this->render('accessViolation');
	}
	public function actionTravelerEntry($id){ // zero for new traveler
		$traveler = new UserTraveler();
		if($_POST['Save'] || $_POST['Create']){
			$traveler->attributes = $_POST['UserTraveler'];
			$traveler->fname = $_POST['UserTraveler']['fname'];
			$traveler->lname = $_POST['UserTraveler']['lname'];
			$traveler->email = $_POST['UserTraveler']['email'];
			$traveler->company = $_POST['UserTraveler']['company'];
			$traveler->street = $_POST['UserTraveler']['street'];
			$traveler->city = $_POST['UserTraveler']['city'];
			$traveler->state = $_POST['UserTraveler']['state'];
			$traveler->zip = $_POST['UserTraveler']['zip'];
			$traveler->phone = $_POST['UserTraveler']['phone'];
			$traveler->weight = $_POST['UserTraveler']['weight'];
			$traveler->auth_level = User::USER_TR;
			
			// Look up user based on email and ID based on this.
			$existingTraveler = UserTraveler::model()->findByAttributes(array('email'=>$traveler->email));
			if(isset($existingTraveler)){
				$traveler = $existingTraveler;
				$saved = true;
			}else{
				$traveler->username = $traveler->email;
				$saved = $traveler->save();
			}
			
			// add CRM Link
			$user = User::model()->findByPk(Yii::app()->user->getId());
			$crmLink = new CrmLink();
			if(isset($user->operator_id) && $user->operator_id != 0){
				$crmLink->biz_id = $user->operator_id;
				$crmLink->biz_type = CrmLink::BIZ_TYPE_OP;
			}elseif($user->auth_level == User::USER_BR){
				$crmLink->biz_id = $user->id;
				$crmLink->biz_type = CrmLink::BIZ_TYPE_BR;
			}else{
				$crmLink->biz_id = $user->id;
				$crmLink->biz_type = CrmLink::BIZ_TYPE_BUYER;
			}
			
			$crmLink->user_id = $traveler->id;
			$crmLink->user_type = CrmLink::USER_TYPE_PASSENGER;
			$crmLink->save();
			
			if(isset($saved) && $saved){ // saved == true
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}
		if(!isset($traveler['fname']) && $id != 0) $traveler = UserTraveler::model()->findByPk($id);
		$this->render('travelerEntry', array('traveler'=>$traveler));
	}
	public function actionDeleteCrmLink($id){
		$crmId = $id;
		$crmLink = CrmLink::model()->findByPk($crmId);
		CrmLink::model()->deleteByPk($crmId);
		// Chrome is putting 'favicon.ico in place of $id in returnUrl...
		$returnUrl = str_replace('favicon.ico', $crmLink->biz_id, Yii::app()->user->returnUrl);
		$this->redirect($returnUrl);
		
		// $this->redirect(Yii::app()->createUrl('us/newQuote', array('id'=>$crmLink->biz_id)));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){
		$model = new User();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['User'])){
			$model->attributes = $_POST['User'];
			if($model->save()) $this->redirect(array('view','id'=>$model->id));
		}
		$this->render('create', array('model'=>$model));
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *        the ID of the model to be updated
	 */
	public function actionUpdate($id){
		$model = $this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['User'])){
			// check starting auth level in case of op promotion
			$notop = 0;
			if($model->auth_level != 50){
				$notop = 1;
			}
			$model->attributes = $_POST['User'];
			if($model->save()){
				// add default values if operator
				if($model->auth_level == 50 && $notop == 1){
					// promoting a op, add default values
					$opdata = new OperatorData();
					$opdata->operator_id = $model->operator_id;
					$opdata->default_margin = "0.00";
					$opdata->default_route_buffer = "0.00";
					$opdata->overnight_fee = "0.00";
					$opdata->save();
				}
				// now redirect
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		$this->render('update', array('model'=>$model));
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 *
	 * @param integer $id
	 *        the ID of the model to be deleted
	 */
	public function actionDelete($id){
		$this->loadModel($id)->delete();
		
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])) $this->redirect(isset($_POST['returnUrl'])?$_POST['returnUrl']:array('admin'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex(){
		$dataProvider = new CActiveDataProvider('User');
		$this->render('index', array('dataProvider'=>$dataProvider));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin(){
		$model = new User('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['User'])) $model->attributes = $_GET['User'];
		
		$this->render('admin', array('model'=>$model));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 *
	 * @param integer $id
	 *        the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id){
		$model = User::model()->findByPk($id);
		if($model === null) throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 *
	 * @param User $model
	 *        the model to be validated
	 */
	protected function performAjaxValidation($model){
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'user-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
