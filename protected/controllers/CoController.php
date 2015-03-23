<?php

/*
 * Charter Operator Account Controller
 */
class CoController extends Controller{
	public function init(){
		if($this->isValidForRedirectRequest(Yii::app()->request)){
			Yii::app()->user->returnUrl = Yii::app()->request->requestUri;
		}
	}
	public function isValidForRedirectRequest($request){
		/* something validations of request, like isAjax or other */
		return true;
	}
	
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
		'postOnly + delete');		// we only allow deletion via POST request
		
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 *
	 * @return array access control rules
	 */
	public function accessRules(){
		if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->createUrl('site/login'));
		
		return array(array('allow',		// allow authenticated user to perform 'create' and 'update' actions
		'actions'=>array('index','updateOperator','updateUser','quotes','coReviewBids','editQuote','updateSettings','RemoveFromQuote','submitQuote','updateAircraftQuote','customers','aircraft','view'),'expression'=>'$user->level >= ' . User::USER_OP),array('allow',		// allow admin user to perform 'admin' and 'delete' actions
		'actions'=>array('admin','delete','create','view'),'expression'=>'$user->level >= ' . User::USER_ADMIN),array('deny',		// deny all users
		'users'=>array('*')));
	}
	
	/**
	 * Displays a particular model.
	 *
	 * @param integer $id
	 *        the ID of the model to be displayed
	 */
	public function actionView($id){
		$this->render('view', array('model'=>$this->loadModel($id)));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate(){
		$model = new Co();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Co'])){
			$model->attributes = $_POST['Co'];
			if($model->save()) $this->redirect(array('view','id'=>$model->id));
		}
		
		$this->render('create', array('model'=>$model));
	}
	
	/**
	 * Updates Operator.
	 */
	public function actionUpdateUser(){
		
		// get logged in user's info
		$model = User::model()->findByPk(Yii::app()->user->getId());
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['User'])){
			$model->attributes = $_POST['User'];
			if($model->save()){
				Yii::app()->user->setFlash('success', "Update Successful");
				$this->redirect(array('updateUser'));
			}
		}
		
		// blank out password
		$model->password = "";
		
		$this->render('updateUser', array('model'=>$model));
	}
	
	/**
	 * Updates Operator.
	 */
	public function actionUpdateOperator(){
		// get logged in user's info
		$userobj = User::model()->findByPk(Yii::app()->user->getId());
		$id = $userobj->operator_id;
		
		$model = $this->loadModel($id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Co'])){
			$model->attributes = $_POST['Co'];
			if($model->save()) Yii::app()->user->setFlash('success', "Update Successful");
			$this->redirect(array('updateOperator'));
		}
		
		$this->render('updateOperator', array('model'=>$model));
	}
	
	/**
	 * Updates Settings.
	 */
	public function actionUpdateSettings(){
		// get logged in user's info
		$userobj = User::model()->findByPk(Yii::app()->user->getId());
		$id = $userobj->operator_id;
		
		$model = OperatorData::model()->findByPk($id);
		$model->default_margin = $model->default_margin * 100;
		$model->default_route_buffer = $model->default_route_buffer * 100;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['OperatorData'])){
			$model->attributes = $_POST['OperatorData'];
			$model->default_margin = $model->default_margin / 100;
			$model->default_route_buffer = $model->default_route_buffer / 100;
			if($model->save()) Yii::app()->user->setFlash('success', "Update Successful");
			$this->redirect(array('updateSettings'));
		}
		
		$this->render('updateSettings', array('model'=>$model));
	}
	
	/**
	 * Show quotes.
	 */
	public function actionQuotes(){
		// get logged in user's info
		$user = User::model()->findByPk(Yii::app()->user->getId());
		
		// log
		Yii::app()->utility->logActivity("o", $user->operator_id, "view", "quotes", "-");
		
		// Get quotes
		$quotes = Quote::model()->getOpReviewQuotes($user->operator_id);
		$legs = array();
		
		foreach($quotes as $quote){
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote->cust_id);
			}
			$legs = Utility::buildFlightLegs($legs, $newLegs, $quote);
		}
		$legs = new CArrayDataProvider($newLegs, array('pagination'=>false));
		
		$dataProvider = new CArrayDataProvider($quotes, array('pagination'=>false));
		$buttonAction = 'co/coReviewBids';
		$this->render('quotes', array('legs'=>$legs,'action'=>$buttonAction,'dataProvider'=>$dataProvider));
	}
	
	public function actionCoReviewBids($id){
		// get logged in user data
		$user = User::model()->findByPk(Yii::app()->user->getId());
		// get quote data
		$quote = Quote::model()->findByPk($id);
		// get operator data
		$op = OperatorData::model()->findByPk($user->operator_id);
		
		// log
		Yii::app()->utility->logActivity("o", $user->operator_id, "view", "coReviewBids", $quote->id);
		
		$legs = array();
		$newLegs = Leg::model()->getLegsForQuote($quote['id']);
		$legId = count($newLegs);
		if($legId > 0){
			$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote->cust_id);
		}
		$legs = Utility::buildFlightLegs($legs, $newLegs, $quote);
		
		$legs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		// get quote detail, each aircraft
		$quote_ac = Quote::model()->getS1QuoteDetail($user->operator_id, $id);
		if(isset($_POST['submitBids'])){
			// Walk the quate aircraft list and change status
			foreach($quote_ac as $bid){
				$newBidStatus = ($quote->auth_level == User::USER_BR)?OpQuote::STATUS_BR_REVIEW:OpQuote::STATUS_US_REVIEW;
				$newQuoteStatus = ($quote->auth_level == User::USER_BR)?Quote::STATUS_BR_REVIEW:Quote::STATUS_US_REVIEW;
				$success = OpQuote::model()->updateByPk($bid['bid_id'], array('status'=>$newBidStatus));
				if(success){
					Yii::app()->utility->logActivity("o", $bid['operator_id'], "submitted", "bid", $bid['bid_id']);
					Yii::app()->user->setFlash('success', "Bid(s) have been submitted");
					Quote::model()->updateByPk($quote->id, array('status'=>$newQuoteStatus));
				}
			}
			$unprocessedBids = OpQuote::model()->findAllByAttributes(array('quote_id'=>$quote->id,'operator_id'=>$user->operator_id,'status'=>OpQuote::STATUS_OP_REVIEW));
			foreach($unprocessedBids as $errorBid){
				// Note: In the particular case that changed this, the error that occured was an airplane
				// in the bid list that did not have an engine associated with it. The particular
				// thing being tracked here is the difference between the $quote_ac result above
				// which has a complex join and the simple find we are using to update the status.
				// as a result, if any of the data in the join fails, that aircraft does not show
				// up to the operator.
				OpQuote::model()->updateByPk($errorBid->id, array('status'=>OpQuote::STATUS_OP_ERROR));
				Yii::app()->utility->logActivity("o", $errorBid->operator_id, "error", "bid", $errorBid->id);
				Yii::app()->user->setFlash('issue', "Bid " . $errorBid->id . " with aircraft id " . $errorBid->aircraft_id . " did not submit probably because the aircraft is not in the system correctly");
			}
			// redirect
			$this->redirect(array('index'));
		} // $_POST['submitBids']
		
		$this->render('coReviewBids', array('legs'=>$legs,'model'=>$quote_ac,'quote'=>$quote,'op'=>$op));
	}
	
	/**
	 * Edit Quote.
	 */
	public function actionEditQuote($id){
		// TODO: ensure this quote is for this operator
		$opQuote = OpQuote::model()->findByPk($id);
		if($opQuote->status != OpQuote::STATUS_OP_REVIEW && $opQuote->status != OpQuote::STATUS_OP_REJECT){
			Yii::app()->user->setFlash('error', "Quote already submitted");
			$this->redirect($this->createUrl('Quotes'));
		}
		$quote = Quote::model()->findByPk($opQuote->quote_id);
		$opdata = OperatorData::model()->findByAttributes(array('operator_id'=>$opQuote->operator_id));
		$opdata->default_route_buffer = $opdata->default_route_buffer * 100;
		$opdata->default_margin = $opdata->default_margin * 100;
		$acdata = OperatorAircraft::model()->findByPk($opQuote->aircraft_id);
		$acrefdata = OperatorAircraftRef::model()->findByAttributes(array('operator_aircraft_id'=>$acdata->id));
		$acrefdata->derating = $acrefdata->derating * 100;
		
		// log
		Yii::app()->utility->logActivity("o", $opQuote->operator_id, "edit", "quote", $quote->id);
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($opQuote);
		
		if(isset($_POST['recalc'])){
			// set opQuotes to post data, don't save
			$opQuote->attributes = $_POST['OpQuote'];
			$opdata->attributes = $_POST['OperatorData'];
			$acdata->attributes = $_POST['OperatorAircraft'];
			$acrefdata->attributes = $_POST['OperatorAircraftRef'];
			$opQuote->updateOpQuote($quote, $acdata, $save);
		}
		
		if(isset($_POST['save'])){
			// note that changes not recalculated may not be saved. Possibly desirable, but should verify
			$opQuote->attributes = $_POST['OpQuote'];
			// $opQuote->status=2; //removed STATUS_OP_MODIFIED-using workflow based status instead.
			if($opQuote->save()){
				Yii::app()->user->setFlash('success', "Update Successful");
				// $this->redirect(array('coReviewBids'));
				$this->redirect($this->createUrl('coReviewBids', array('id'=>$opQuote->quote_id)));
			}
		}
		
		$newLegs = Leg::model()->getLegsForQuote($quote['id']);
		$legId = count($newLegs);
		if($legId > 0){
			$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote->cust_id);
		}
		$legs = Utility::buildFlightLegs(array(), $newLegs, $quote);
		$legs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$this->render('editQuote', array('opQuote'=>$opQuote,'quote'=>$quote,'opdata'=>$opdata,'acdata'=>$acdata,'acrefdata'=>$acrefdata,'legs'=>$legs));
	}
	
	/**
	 * Update Quote Aircraft Airport.
	 */
	public function actionUpdateAircraftQuote(){
		if($_POST){
			// update cqd, post[rid] is id, post[dep_arp] or post[arr_arp]
			$cqd = OpQuote::model()->findByPk($_POST['rid']);
			if(isset($_POST['dep_arp'])){
				$cqd->dep_arp = $_POST['dep_arp'];
			}
			if(isset($_POST['arr_arp'])){
				$cqd->arr_arp = $_POST['arr_arp'];
			}
			
			// update distance
			if($cqd->dep_arp != "" && $cqd->arr_arp != ""){
				// do dist calc, add to cqd->dist
				$dist = Yii::app()->utility->tripDistance($cqd->dep_arp, $cqd->arr_arp);
				$cqd->dist = round($dist);
			}
			if($cqd->save()){
				Yii::app()->user->setFlash('success', "Update Successful");
				$this->redirect($this->createUrl('coReviewBids', array('id'=>$cqd->quote_id)));
			}
			// update quote values
		}
	}
	
	/**
	 * Remove From Quote.
	 * aka Don't offer this aircraft
	 */
	public function actionRemoveFromQuote($id){
		// TODO: ensure this quote is for this operator, and ensure it hasn't been submitted to the user yet (status 1 or 2 only)
		$model = OpQuote::model()->findByPk($id);
		$doupdate = OpQuote::model()->updateByPk($id, array("status"=>OpQuote::STATUS_OP_REJECT));
		if($doupdate > 0){
			Yii::app()->user->setFlash('success', "Update Successful");
			// $this->redirect(array('coReviewBids'));
			$this->redirect($this->createUrl('coReviewBids', array('id'=>$model->quote_id)));
		}else{
			Yii::app()->user->setFlash('error', "Could Not Remove");
			// $this->redirect(array('coReviewBids'));
			$this->redirect($this->createUrl('coReviewBids', array('id'=>$model->quote_id)));
		}
	}
	
	/**
	 * Submit a Quote
	 */
	public function actionSubmitQuote($id){
		// TODO: ensure this quote is for this operator
		$user = User::model()->findByPk(Yii::app()->user->getId());
		// Workflow: If a quote was entered by a broker (auth_level===30) then we send the quote to the broker as a user
		// otherwise, we send the quote to the user because there is not a broker review.
		$quote = Quote::model()->findByPk($id);
		$newBidStatus = ($quote->auth_level == User::USER_BR)?OpQuote::STATUS_BR_REVIEW:OpQuote::STATUS_US_REVIEW;
		$doupdate = OpQuote::model()->updateAll(array('status'=>$newBidStatus), 'quote_id = ' . $id . ' AND operator_id = ' . $user->operator_id . ' AND status =' . OpQuote::STATUS_OP_REVIEW);
		if($doupdate){
			$newQuoteStatus = ($quote->auth_level == User::USER_BR)?Quote::STATUS_BR_REVIEW:Quote::STATUS_US_REVIEW;
			$doupdate = Quote::model()->updateQuoteStatus($id, $newQuoteStatus);
		}
		if($doupdate > 0){
			Yii::app()->user->setFlash('success', "Update Successful");
			$this->redirect(array('quotes'));
		}else{
			Yii::app()->user->setFlash('error', "Could Not Update");
			$this->redirect(array('quotes'));
		}
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
		// log
		Yii::app()->utility->logActivity("o", Yii::app()->user->getId(), "view", "account", "-");
		$user = User::model()->findByPk(Yii::app()->user->getId());
		
		// Get Charter Operators Quotes awaiting review
		$opReviewQuotes = Quote::model()->getUserQuotesByStatus($user->operator_id, Quote::STATUS_OP_REVIEW);
		$legs = array();
		
		foreach($opReviewQuotes as $quote){
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegs($legs, $newLegs, $quote);
		}
		$opReviewLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$reviewButton = 'co/coReviewBids';
		
		$brReviewQuotes = Quote::model()->getUserQuotesByStatus($user->operator_id, Quote::STATUS_BR_REVIEW);
		$usReviewQuotes = Quote::model()->getUserQuotesByStatus($user->operator_id, Quote::STATUS_US_REVIEW);
		$reviewQuotes = array_merge($brReviewQuotes, $usReviewQuotes);
		$legs = array();
		foreach($reviewQuotes as $quote){
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegs($legs, $newLegs, $quote);
		}
		$reviewLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		if($user->operator_id > 0){
			$operator = Operator::model()->findByPk($user->operator_id);
			
			// Get aircraft
			$aircraft = OperatorAircraft::model()->with('operator_aircraft_ref')->findAllByAttributes(array('operator_id'=>$user->operator_id));
			
			$dataProvider = new CArrayDataProvider($aircraft, array('pagination'=>false));
		}else{
			$operator = false;
			$dataProvider = false;
		}
		
		// check for status 1 quotes -- status 1 is an old designator of status now it stands for Quote::STATUS_OP_REVIEW
		$openQuotes = Quote::model()->getS1Quotes($user->operator_id);
		if(!empty($openQuotes)) Yii::app()->user->setFlash('notice', "You have pending quotes");
		
		$pendingTrips = Quote::model()->getUserQuotesByStatus($user->operator_id, Quote::META_STATUS_BOOKED, Quote::GROUP_OP_QUOTES, Quote::TIME_PENDING);
		$legs = array();
		foreach($pendingTrips as $quote){
			// get opQuote  (since there's only one)
			$opQuote = OpQuote::model()->findByAttributes(array('quote_id'=>$quote['id'], 'status'=>OpQuote::STATUS_US_ACCEPT));
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegsFromBid($opQuote->id, $legs);
		}
		if(sizeof($legs) > 0) $pendingLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$activeTrips = Quote::model()->getUserQuotesByStatus($user->operator_id, Quote::META_STATUS_BOOKED, Quote::GROUP_OP_QUOTES, Quote::TIME_CURRENT);
		$legs = array();
		foreach($activeTrips as $quote){
			$opQuote = OpQuote::model()->findByAttributes(array('quote_id'=>$quote['id'], 'status'=>OpQuote::STATUS_US_ACCEPT));
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegsFromBid($opQuote->id, $legs);
		}
		if(sizeof($legs) > 0) $activeLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$historyTrips = Quote::model()->getUserQuotesByStatus($user->operator_id, Quote::META_STATUS_BOOKED, Quote::GROUP_OP_QUOTES, Quote::TIME_PAST);
		$legs = array();
		foreach($historyTrips as $quote){
			$opQuote = OpQuote::model()->findByAttributes(array('quote_id'=>$quote['id'], 'status'=>OpQuote::STATUS_US_ACCEPT));
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegsFromBid($opQuote->id, $legs);
		}
		if(sizeof($legs) > 0) $historyLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$this->render('index', array('opReviewLegs'=>$opReviewLegs,'reviewButton'=>$reviewButton,'reviewLegs'=>$reviewLegs,'pending'=>$pendingLegs,'active'=>$activeLegs,'history'=>$historyLegs));
	}
	public function actionCustomers(){
		$this->forward('us/customers');
	}
	public function actionAircraft(){
		// show logged in user's info
		$user = User::model()->findByPk(Yii::app()->user->getId());
		
		// log
		Yii::app()->utility->logActivity("o", $user->operator_id, "view", "aircraft", "-");
		
		// Get aircraft
		$aircraft = OperatorAircraft::model()->with('operator_aircraft_ref')->findAllByAttributes(array('operator_id'=>$user->operator_id));
		
		$aircraftList = new CArrayDataProvider($aircraft, array('pagination'=>false));
		
		if(Yii::app()->user->level >= 100){
			$adminCheck = "You are an admin.";
		}else{
			$adminCheck = "Not an admin.";
		}
		
		$this->render('aircraft', array('user'=>$user,'aircraftList'=>$aircraftList));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin(){
		$model = new Co('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['Co'])) $model->attributes = $_GET['Co'];
		
		$this->render('admin', array('model'=>$model));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 *
	 * @param integer $id
	 *        the ID of the model to be loaded
	 * @return Co the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id){
		$model = Co::model()->findByPk($id);
		if($model === null) throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 *
	 * @param Co $model
	 *        the model to be validated
	 */
	protected function performAjaxValidation($model){
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'co-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
