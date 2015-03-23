<?php
class UsController extends Controller{
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
		'postOnly + delete'); // we only allow deletion via POST request
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 *
	 * @return array access control rules
	 */
	public function accessRules(){
		if(Yii::app()->user->isGuest){
			$this->redirect(Yii::app()->createUrl('site/login'));
		}
		
		return array(array('allow','actions'=>array('index','view','newQuote','viewQuote','acceptQuote','editProfile','deleteCrmLink','customers'),'expression'=>'$user->level >= ' . User::USER_US),array('allow','actions'=>array('brokerReviewBids','brokerRemoveBid','brokerEditBid','brokerSubmitBids','brokerAdmin'),'expression'=>'$user->level >= ' . User::USER_BR),array('allow','actions'=>array('create','update','admin','delete'),'expression'=>'$user->level >= ' . User::USER_ADMIN),array('deny','users'=>array('*')));
	}
	
	/**
	 * Renders an existing quote in the creation phase or a new quote if $id = -1.
	 * To render as a new quote, call like this:
	 * Yii::app()->createUrl('/us/new/-1')
	 */
	public function actionNewQuote($id){
		if(count($_POST) == 0){ // comming in from the outside (not from the New Quote form).
			if($id == 0){
				return $this->render('new', array('leg'=>new Leg(),'quote'=>new Quote()));
			}else{
				return $this->renderNewQuote($id);
			}
		}
		if(isset($_POST['cancel'])){
			$quoteID = $_POST['quote_id'];
			if(isset($quoteID)){
				$quote = Quote::model()->findByPk($quoteID);
				$quote->status = Quote::STATUS_US_REJECT;
				$quote->save();
			}
			return $this->render('new', array('leg'=>new Leg(),'quote'=>new Quote()));
		}
		$leg = new Leg();
		if(isset($_POST['Leg'])){
			// Get Form Values:
			// NOTE: We need leg values for form reentry in addTraveler case
			$leg->quote_id = $_POST['quote_id'];
			$leg->passengerEmail = $_POST['Leg']['passengerEmail'];
			$leg->dep_address = $_POST['Leg']['dep_address'];
			$leg->arr_address = $_POST['Leg']['arr_address'];
			$leg->num_trav = $_POST['Leg']['num_trav'];
			$leg->dep_time = $_POST['Leg']['dep_time'];
			$leg->retTime = $_POST['Leg']['retTime']; // $dep_time;
			$leg->customerEmail = $_POST['Leg']['customerEmail'];
			
			$quote = Quote::model()->findByPk($leg->quote_id);
			
			$addedLegDisplay = true; // which might also be addedTraveler
		}
		if(isset($_POST['addPassenger'])){
			$traveler = User::model()->findByAttributes(array('email'=>$leg->passengerEmail));
			// Add CRM Link
			$crmLink = CrmLink::model()->createQuoteSet($quote, $traveler, CrmLink::USER_TYPE_PASSENGER);
			if($crmLink->hasErrors()){
				$leg->addError('passengerEmail', 'This traveler is already listed in the passenger manifest');
				$saveSuccess = false;
			}else{
				$saveSuccess = true;
			}
			return $this->renderNewQuote($leg->quote_id, $leg);
		}
		// Note: There is no way to tell in Yii if fields in a form have been changed - brainiacs behind this framework and all
		// As such, we can't tell if "submit" means submit the fields and the defined
		// legs or just the defined legs.
		// So, if $leg->quote_id is defined, then we submit just the legs.
		// Could put in hidden fields and see if they change or a hidden check-sum.
		if(isset($_POST['submit']) and (isset($_POST['quote_id']) and $_POST['quote_id'] > 0)){
			return $this->processSubmitNewQuote();
		}
		if(isset($_POST['addLeg']) || isset($_POST['submit'])){  //this is a first time submit or an addLeg
			$user = User::model()->findByPk(Yii::app()->user->getId());
			
			if(!isset($leg->quote_id) or !strlen(trim($leg->quote_id)) > 0){ // create quote object---second time through only!
				$quote = new Quote();
				$quote->auth_level = Yii::app()->user->level;
				$quote->status = Quote::STATUS_SY_PROCESS;
				if($user->auth_level >= User::USER_BR){
					if(isset($leg->customerEmail) && strlen(trim($leg->customerEmail)) > 0){ // TODO: Error if user not found...defaults to broker below!
						$payor = User::model()->findByAttributes(array('email'=>$leg->customerEmail));
					}
					$quote->cust_id = (isset($payor))?$payor->id:$user->id;
					$quote->broker_id = $user->id;
				}else{
					$quote->cust_id = Yii::app()->user->getId();
				}
				$quote->save(); // create quote object here so we have quote->id to build the leg!
			}
			$leg->quote_id = $quote->id;
			// need to validate input (dates in the future, departure after previous leg)
			
			$leg->validateAddress('dep_address', null);
			
			$leg->validateAddress('arr_address', null);
			
			if(!$leg->hasErrors()){
				// query legs to get last leg to validate departure time of this leg
				$legs = Leg::model()->getLegsForQuote($quote->id);
				$legId = count($legs);
				$leg->validateFutureTime($legs[($legId - 1)]['dep_ts'], 'dep_time');
			}
			if(!$leg->hasErrors()){ // may have picke up errors in validateDepartureTime()
				$leg->arr_tz = Utility::getTimeZone($leg->dep_time, $leg->arr_lat, $leg->arr_lng);
				$leg->dist = round($this->tripDistance($leg->dep_arp, $leg->arr_arp, $leg->dep_lat, $leg->dep_lng, $leg->arr_lat, $leg->arr_lng));
				if(isset($leg->retTime) && strlen(trim($leg->retTime)) > 0){ // reverse the leg
					$returnLeg = $leg->buildReturnLeg($leg->retTime);
					$returnLegSuccess = $returnLeg->save();
				}else{
					$returnLegSuccess = true;
				}
				$saveSuccess = ($quote->save() && $leg->save() && $returnLegSuccess);
			}
		}
		if($saveSuccess){ // Render form from saved values
			if(isSet($_POST['addLeg'])) return $this->redirect(Yii::app()->createUrl('us/newQuote', array('id'=>$quote->id)));
			else 			// submit
			return $this->processSubmitNewQuote();
		}
		// Render error form ($leg has error in it)
		return $this->renderNewQuote($leg->quote_id, $leg);
	}
	public function processSubmitNewQuote(){
		// Process the existing quotes....
		include '../protected/commands/ProcessCommand.php';
		
		ProcessCommand::run();
		
		Yii::app()->user->setFlash('success', "Thank you.  You'll receive an email when your trip has been processed.");
		// TODO: Create a quote confirmation page!
		return $this->redirect(array('us/index'));
	}
	public function actionDeleteCrmLink($id){
		$crmId = $id;
		$crmLink = CrmLink::model()->findByPk($crmId);
		CrmLink::model()->deleteByPk($crmId);
		$this->redirect(Yii::app()->user->returnUrl);
		$this->redirect(Yii::app()->createUrl('us/newQuote', array('id'=>$crmLink->biz_id)));
	}
	
	/**
	 * RenderNewQuote
	 *
	 * @param unknown $quoteId        
	 * @param unknown $controller        
	 */
	public function renderNewQuote($quoteId, $leg = null){ // this is being done so that we can render new from outside UsController
		$quote = Quote::model()->findByPk($quoteId);
		$legs = Leg::getLegsForQuote($quoteId);
		$legId = count($legs);
		if($legId > 0){
			$legs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote->cust_id);
		}
		$legs = Utility::buildFlightLegs(array(), $legs, $quote);
		$legs = new CArrayDataProvider($legs, array('pagination'=>false));
		if($leg == null){
			$lastLeg = Leg::getLastLeg($quoteId);
			$newLeg = new Leg();
			$newLeg->dep_address = $lastLeg['arr_address'];
			$newLeg->num_trav = $lastLeg['num_trav'];
			$newLeg->quote_id = $lastLeg['quote_id'];
			$leg = $newLeg;
		}
		$addedLegDisplay = true;
		$travelers = CrmLink::getQuotePassengers($quoteId);
		$travelers = new CArrayDataProvider($travelers, array('pagination'=>false));
		
		return $this->render('/us/new', array('quote'=>$quote,'leg'=>$leg,'legs'=>$legs,'addedLegDisplay'=>$addedLegDisplay,'travelers'=>$travelers));
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
		$model = new Quote();
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['Quote'])){
			$model->attributes = $_POST['Quote'];
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
		
		if(isset($_POST['Quote'])){
			$model->attributes = $_POST['Quote'];
			if($model->save()) $this->redirect(array('view','id'=>$model->id));
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
		if(Yii::app()->user->level == User::USER_OP) $this->redirect(array('co/index'));
		$myid = Yii::app()->user->getId();
		
		if(Yii::app()->user->level == User::USER_BR){ // display broker validation records
			$activeReviewer = Quote::STATUS_BR_REVIEW;
			$review1 = Quote::STATUS_OP_REVIEW;
			$review2 = Quote::STATUS_US_REVIEW;
			$group = Quote::GROUP_BR_QUOTES;
			$action = 'us/brokerReviewBids';
		}else{
			$activeReviewer = Quote::STATUS_US_REVIEW;
			$review1 = Quote::STATUS_OP_REVIEW;
			$review2 = Quote::STATUS_BR_REVIEW;
			$group = Quote::GROUP_US_QUOTES;
			$action = 'us/viewQuote'; // maybe go to 'us/acceptQuote'?
		}
		
		// Get Charter Operators Quotes awaiting review
		$activeReviewQuotes = Quote::model()->getUserQuotesByStatus($myid, $activeReviewer, $group);
		$legs = array();
		
		foreach($activeReviewQuotes as $quote){
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegs($legs, $newLegs, $quote);
		}
		if(sizeof($legs) > 0) $activeReviewLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$inactiveReviewer1Quotes = Quote::model()->getUserQuotesByStatus($myid, $review1, $group);
		$inactiveReviewer2Quotes = Quote::model()->getUserQuotesByStatus($myid, $review2, $group);
		$reviewQuotes = array_merge($inactiveReviewer1Quotes, $inactiveReviewer2Quotes);
		$legs = array();
		foreach($reviewQuotes as $quote){
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegs($legs, $newLegs, $quote);
		}
		if(sizeof($legs) > 0) $reviewLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$pendingTrips = Quote::model()->getUserQuotesByStatus($myid, Quote::META_STATUS_BOOKED, $group, Quote::TIME_PENDING);
		$legs = array();
		foreach($pendingTrips as $quote){
			$opQuote = OpQuote::model()->findByAttributes(array('quote_id'=>$quote['id'], 'status'=>OpQuote::STATUS_US_ACCEPT));
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegs($legs, $newLegs, $opQuote);
		}
		if(sizeof($legs) > 0) $pendingLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$activeTrips = Quote::model()->getUserQuotesByStatus($myid, Quote::META_STATUS_BOOKED, $group, Quote::TIME_CURRENT);
		$legs = array();
		foreach($activeTrips as $quote){
			$opQuote = OpQuote::model()->findByAttributes(array('quote_id'=>$quote['id'], 'status'=>OpQuote::STATUS_US_ACCEPT));
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegs($legs, $newLegs, $opQuote);
		}
		if(sizeof($legs) > 0) $activeLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$historyTrips = Quote::model()->getUserQuotesByStatus($myid, Quote::META_STATUS_BOOKED, $group, Quote::TIME_PAST);
		$legs = array();
		foreach($historyTrips as $quote){
			$opQuote = OpQuote::model()->findByAttributes(array('quote_id'=>$quote['id'], 'status'=>OpQuote::STATUS_US_ACCEPT));
			$newLegs = Leg::model()->getLegsForQuote($quote['id']);
			$legId = count($newLegs);
			if($legId > 0){
				$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote['cust_id']);
			}
			$legs = Utility::buildFlightLegs($legs, $newLegs, $opQuote);
		}
		if(sizeof($legs) > 0) $historyLegs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		$this->render('index', array('activeReviewLegs'=>$activeReviewLegs,'action'=>$action,'reviewLegs'=>$reviewLegs,'pending'=>$pendingLegs,'active'=>$activeLegs,'history'=>$historyLegs));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin(){
		$model = new Quote('search');
		$model->unsetAttributes(); // clear any default values
		if(isset($_GET['Quote'])) $model->attributes = $_GET['Quote'];
		
		$this->render('admin', array('model'=>$model));
	}
	public function actionViewQuote($id){
		// log
		Yii::app()->utility->logActivity("u", $user->id, "view", "ViewQuote", Yii::app()->user->getId());
		
		$quote = Quote::model()->findByPk($id);

		$legs = array();
		$newLegs = Leg::model()->getLegsForQuote($id);
		$legId = count($newLegs);
		if($legId > 0){
			$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote->cust_id);
		}
		$legs = Utility::buildFlightLegs($legs, $newLegs, $quote);
		
		$legs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		// Get all op_quote entries relative to this quote;
		$bidStatus = ($quote->status == Quote::STATUS_US_REVIEW)?
			OpQuote::STATUS_US_REVIEW:
			OpQuote::STATUS_US_ACCEPT;
		$bids = OpQuote::model()->findAllByAttributes(array('quote_id'=>$id,'status'=>$bidStatus));

		$passengers = CrmLink::getQuotePassengers($id);
		$passengers = new CArrayDataProvider($passengers, array('pagination'=>false));
		
		
		if(isset($_POST['acceptQuote'])){
			// Start the accept quote process
			//
			$this->redirect(array('us/index'));
		} // $_POST['submitBids']
		  		
		$this->render('viewQuote', array('legs'=>$legs,'bids'=>$bids,'passengers'=>$passengers, 'quote'=>$quote));
	}
	
	/**
	 * Allows broker to attach fees to quote and approve quote for user.
	 */
	public function actionBrokerReviewBids($id){
		$user = User::model()->findByPk(Yii::app()->user->getId());
		
		// log
		Yii::app()->utility->logActivity("b", $user->id, "view", "brReviewBids", $id);
		
		// get all quotes returned from ops for my trip
		$quote = Quote::model()->findByPk($id);
		
		// if broker_id != user_is return (security breach...wrong person looking at data
		$broker = BrokerSettings::model()->findByAttributes(array('user_id'=>$quote->broker_id));
		
		$legs = array();
		$newLegs = Leg::model()->getLegsForQuote($quote['id']);
		$legId = count($newLegs);
		if($legId > 0){
			$newLegs[($legId - 1)]['buyer'] = Utility::buildBuyerDataModelFromUID($quote->cust_id);
		}
		$legs = Utility::buildFlightLegs($legs, $newLegs, $quote);
		
		$legs = new CArrayDataProvider($legs, array('pagination'=>false));
		
		// Get all op_quote entries relative to this quote;
		$bids = OpQuote::model()->findAllByAttributes(array('quote_id'=>$id,'status'=>OpQuote::STATUS_BR_REVIEW));
		
		if(isset($_POST['submitBids'])){
			foreach($bids as $bid){
				$success = OpQuote::model()->updateByPk($bid['id'], array('status'=>OpQuote::STATUS_US_REVIEW));
				if(success){
					Yii::app()->utility->logActivity("o", $quote['broker_id'], "submitted", "bid", $bid['id']);
					Yii::app()->user->setFlash('success', "Bid(s) have been submitted");
					Quote::model()->updateByPk($quote->id, array('status'=>Quote::STATUS_US_REVIEW));
				}
			}
			$this->redirect(array('us/index'));
		} // $_POST['submitBids']
		
		$this->render('brokerReviewBids', array('legs'=>$legs,'bids'=>$bids,'quote'=>$quote,'broker'=>$broker));
	}
	public function actionBrokerRemoveBid($id){
		OpQuote::model()->updateByPk($id, array('status'=>OpQuote::STATUS_BR_REJECT));
		$bid = OpQuote::model()->findByPk($id);
		$this->actionBrokerReviewBids($bid->quote_id);
	}
	public function actionBrokerEditBid($id){
		// get the bidDetails
		$bid = OpQuote::model()->findByPk($id);
		$brDetail = BrokerDetail::model()->findByAttributes(array('bid_id'=>$bid['id']));
		// check the contract and if empty, fill from BrokerSettings
		if(!isset($brDetail->contract) || sizeof(trim($brDetail->contract)) <= 0){
			$brSettings = BrokerSettings::model()->findByAttributes(array('user_id'=>Yii::app()->user->getId()));
			$brDetail->contract = (isset($brSettings))?$brSettings->contract:'';
			$brDetail->save();
		}
		if(isset($_POST['recalc']) || isset($_POST['save'])){
			$brDetail->fixed_fee = $_POST['BrokerDetail']['fixed_fee'];
			$brDetail->percent = $_POST['BrokerDetail']['percent'];
			$brDetail->contract = $_POST['BrokerDetail']['contract'];
			$brDetail->save();
			if(isset($_POST['save'])){
				$bid = OpQuote::model()->findByPk($id);
				$this->redirect(array('us/brokerReviewBids/' . $bid['quote_id']));
			}
		}
		$this->render('brokerEditBid', array('bid'=>$bid,'brDetail'=>$brDetail));
	}
	public function actionbrokerSubmitBids($id){
		OpQuote::model()->updateAll(array('status'=>OpQuote::STATUS_US_REVIEW), 'quote_id = ' . $id);
		Quote::model()->updateByPk($id, array('status'=>Quote::STATUS_US_REVIEW));
		$this->redirect(array('us/index'));
	}
	
	/**
	 * Accept quote by paying for it via braintree transaction
	 *
	 * @param $opQuoteId Primary
	 *        Key for OpQuote table
	 */
	public function actionAcceptQuote($id){
		$brDetail = BrokerDetail::model()->findByAttributes(array('bid_id'=>$id));
		
		if(isset($_POST['BrokerDetail'])){
			if(isset($_POST['addPassenger'])){
				$quote = Quote::model()->findByPk($brDetail->quote_id);
				$bid = OpQuote::model()->findByPk($brDetail->bid_id);
				$passengerEmail = $_POST['BrokerDetail']['passengerEmail'];
				$passenger = User::model()->findByAttributes(array('email'=>$passengerEmail));
				$crmLink = CrmLink::model()->createQuoteSet($quote, $passenger, CrmLink::USER_TYPE_PASSENGER);

				if($brDetail->hasErrors()){
					$brDetail->addError('passengerEmail', 'This traveler is already listed in the passenger manifest');
					$saveSuccess = false;
				}else{
					$saveSuccess = true;
				}
				
			}else{
				$brDetail->agree = $_POST['BrokerDetail']['agree'];
				if($brDetail->validateAgreement('agree', array('value'=>1))){
					$brDetail->contract_acceptance = new CDbExpression('NOW()');
					$brDetail->save();
					if(isset($_POST['submitPayment'])){
						$travelers = CrmLink::getQuotePassengerIds($brDetail->quote_id);
						$bid = OpQuote::model()->findByPk($brDetail->bid_id);						
						CrmLink::model()->createBidSet($bid, $travelers);
						$this->redirect(array('transaction/braintree/' . $id));
					}	
				}
			}
		}
		$travelers = CrmLink::getQuotePassengers($brDetail->quote_id);
		$travelers = new CArrayDataProvider($travelers, array('pagination'=>false));
		
		return $this->render('acceptQuote', array('bidId'=>$id,'brDetail'=>$brDetail, 'travelers'=>$travelers));
	}
	
	/**
	 * actionEditProfile
	 */
	public function actionEditProfile(){
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if($user->auth_level >= User::USER_BR){
			$broker = BrokerSettings::model()->findByAttributes(array('user_id'=>$user->id));
		}
		if($user->auth_level == User::USER_OP){
			$operator = Operator::model()->findByPk($user->operator_id); // Ah #u*&! Indexed backwards
		}
		if($user->auth_level >= User::USER_BR){
			$type = ($user->auth_level == User::USER_BR)?UploadImage::LOGO_BR:UploadImage::LOGO_OP;
			$id = ($user->auth_level == User::USER_OP)?$operator->id:$broker->id;
			$image = new UploadImage($id, $type, 'raw');
			if(isset($_POST['uploadLogo'])){
				if($image->validate()){ // this validates nothing image type and size will be validated on upload.
					$image->upload();
				}
			}
		}
		$picture = new UploadImage($user->id, 'picture', 'raw');
		if(isset($_POST['uploadPicture'])){
			if($picture->validate()){ // this validates nothing image type and size will be validated on upload.
				$picture->upload();
			}
		}
		if(isset($_POST['contract'])){
			$broker->added_fee = $_POST['BrokerSettings']['added_fee'];
			$broker->percent_commision = $_POST['BrokerSettings']['percent_commision'];
			$broker->contract = $_POST['BrokerSettings']['contract'];
			if($broker->validate()){
				$broker->save();
			}
		}
		$password = new Password();
		if(isset($_POST['password'])){
			$password->oldPassword = $_POST['Password']['oldPassword'];
			$password->newPassword = $_POST['Password']['newPassword'];
			$password->verifyPassword = $_POST['Password']['verifyPassword'];
			if($password->validate()){
				// $user->password = md5($password->newPassword);
				$user->password = $password->newPassword;
				$user->save();
			}
		}
		if(isset($_POST['save'])){
			$user->fname = $_POST['User']['fname'];
			$user->lname = $_POST['User']['lname'];
			$user->email = $_POST['User']['email'];
			$user->company = $_POST['User']['company'];
			$user->street = $_POST['User']['street'];
			$user->city = $_POST['User']['city'];
			$user->state = $_POST['User']['state'];
			$user->zip = $_POST['User']['zip'];
			$user->phone = $_POST['User']['phone'];
			// $user->attributes = $_POST['User'];
			$valid = $user->validate();
			if($valid){
				$user->save();
			}
		}
		$this->render('editProfile', array('user'=>$user,'broker'=>$broker,'operator'=>$operator,'password'=>$password,'image'=>$image,'picture'=>$picture));
	}
	
	/**
	 * actionChangePassword()
	 *
	 * @param unknown $id        
	 */
	public function actionChangePassword($id){
		$user = new User();
		
		$user = User::model()->findByAttributes(array('id'=>$id));
		$user->setScenario('changePwd');
		
		if(isset($_POST['User'])){
			
			$user->attributes = $_POST['User'];
			$valid = $user->validate();
			
			if($valid){
				
				$user->password = md5($user->new_password);
				
				if($user->save()) $this->redirect(array('editProfile','msg'=>'successfully changed password'));
				else $this->redirect(array('editProfile','msg'=>'password not changed'));
			}
		}
		
		$this->render('editProfile', array('user'=>$user));
	}
	public function actionCustomers(){
		if(isset($_POST['newCustomer'])) $this->redirect(Yii::app()->createUrl('user/travelerEntry/0'));
		$customers = CrmLink::getCustomers();
		$customers = new CArrayDataProvider($customers, array('pagination'=>false));
		$this->render('customers', array('customers'=>$customers));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 *
	 * @param integer $id
	 *        the ID of the model to be loaded
	 * @return Quote the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id){
		$model = Quote::model()->findByPk($id);
		if($model === null) throw new CHttpException(404, 'The requested page does not exist.');
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 *
	 * @param Quote $model
	 *        the model to be validated
	 */
	protected function performAjaxValidation($model){
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'quote-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/*
	 * Calculate distance between airports for trip
	 */
	public function tripDistance($dep_arp = "", $arr_arp = "", $dep_lat = "", $dep_lng = "", $arr_lat = "", $arr_lng = ""){
		if(strlen($dep_arp) > 0){
			$dep = Airport::model()->find(array('select'=>'latitude_dd, longitude_dd','condition'=>'location_id=:locID','params'=>array(':locID'=>$dep_arp)));
			$deplat = $dep->latitude_dd;
			$deplon = $dep->longitude_dd;
		}else{
			$deplat = $dep_lat;
			$deplon = $dep_lng;
		}
		if(strlen($arr_arp) > 0){
			$arr = Airport::model()->find(array('select'=>'latitude_dd, longitude_dd','condition'=>'location_id=:locID','params'=>array(':locID'=>$arr_arp)));
			$arrlat = $arr->latitude_dd;
			$arrlon = $arr->longitude_dd;
		}else{
			$arrlat = $arr_lat;
			$arrlon = $arr_lng;
		}
		
		return $this->calculateDistance($deplat, $deplon, $arrlat, $arrlon, "N");
	}
	
	/*
	 * Break apart DMS values DEPRECATED
	 */
	public function getDMSparts($dms){
		$parts = explode("-", $dms);
		$parts[3] = substr($parts[2], -1);
		$parts[2] = substr($parts[2], 0, -1);
		return $parts;
	}
	
	/*
	 * Convert DMS to decimal DEPRECATED
	 */
	public function convertDMSToDD($days, $minutes, $seconds, $direction){
		$dd = $days + $minutes / 60 + $seconds / (60 * 60);
		
		if($direction == "S" || $direction == "W"){
			$dd = $dd * -1;
		} // Don't do anything for N or E
		return $dd;
	}
	
	/* :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: */
    /*::                                                                         :*/
    /*::  This routine calculates the distance between two points (given the     :*/
    /*::  latitude/longitude of those points). It is being used to calculate     :*/
    /*::  the distance between two locations using GeoDataSource(TM) Products    :*/
    /*::                     													 :*/
    /*::  Definitions:                                                           :*/
    /*::    South latitudes are negative, east longitudes are positive           :*/
    /*::                                                                         :*/
    /*::  Passed to function:                                                    :*/
    /*::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  :*/
    /*::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  :*/
    /*::    unit = the unit you desire for results                               :*/
    /*::           where: 'M' is statute miles                                   :*/
    /*::                  'K' is kilometers (default)                            :*/
    /*::                  'N' is nautical miles                                  :*/
    /*::  Worldwide cities and other features databases with latitude longitude  :*/
    /*::  are available at http://www.geodatasource.com                          :*/
    /*::                                                                         :*/
    /*::  For enquiries, please contact sales@geodatasource.com                  :*/
    /*::                                                                         :*/
    /*::  Official Web site: http://www.geodatasource.com                        :*/
    /*::                                                                         :*/
    /*::         GeoDataSource.com (C) All Rights Reserved 2014		   		     :*/
    /*::                                                                         :*/
    /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
    public function calculateDistance($lat1, $lon1, $lat2, $lon2, $unit){
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
		
		if($unit == "K"){
			return ($miles * 1.609344);
		}else if($unit == "N"){
			return ($miles * 0.8684);
		}else{
			return $miles;
		}
	}
	public static function geoLookup($string){
		$string = str_replace(" ", "+", urlencode($string));
		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $string . "&sensor=false";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$response = json_decode(curl_exec($ch), true);
		
		// If Status Code is ZERO_RESULTS, OVER_QUERY_LIMIT, REQUEST_DENIED or INVALID_REQUEST
		if($response['status'] != 'OK'){return null;}
		$geometry = $response['results'][0]['geometry'];
		
		$longitude = $geometry['location']['lng'];
		$latitude = $geometry['location']['lat'];
		
		$array = array('lat'=>$geometry['location']['lat'],'lng'=>$geometry['location']['lng'],'location_type'=>$geometry['location_type']);
		
		return $array;
	}
	public function actionCalDemo(){
		$this->render('calDemo');
	}
}
