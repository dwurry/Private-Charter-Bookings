<?php
class TransactionController extends Controller{
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
		
		return array(array('allow',		// allow all users to perform 'index' and 'view' actions
		'actions'=>array('payment','braintree','confirmation'),'expression'=>'$user->level >= ' . User::USER_US),array('allow',		// allow admin user to perform 'admin' and 'delete' actions
		'actions'=>array(),'expression'=>'$user->level >= ' . User::USER_ADMIN),
				// array('deny', // deny all users
				array('allow',				// allow all users
				'users'=>array('*')));
	}
	
	/**
	 *
	 * @param unknown $id        
	 */
	public function actionBraintree($id){
		$bid_id = $id; // !Signature has to match .. variable must be called "$id" - It's not type safe, just "name" safe -- num-nuts!
		$legs = Utility::buildFlightLegsFromBid($bid_id);
		$flightLegs = Utility::buildFlightDataModel($legs);
		$flightData['payAttempt'] = 0;
		$flightData['legs'] = $flightLegs;
		$flightData['bid_id'] = $bid_id;
		$opQuote = OpQuote::model()->findByPk($bid_id);
		
		require_once '../protected/extensions/BraintreeApi/models/BraintreeCCForm.php';
		$payment = new BraintreeCCForm('charge'); // also option for 'charge', 'customer', 'address', and 'creditcard'
		$payment->amount = Utility::buildCostModel($opQuote['total_cost'], Utility::TOTAL, false);
		$payment->orderId = $bid_id;
		
		if(isset($_POST['BraintreeCCForm'])){
			$flightData['payAttempt']++;
			$payment->setAttributes($_POST['BraintreeCCForm']);
			if($payment->validate()){
				$result = $payment->send();
				if($result){
					$lyfftTrans = $this->recordTransaction($payment, $flightData, $result, $opQuote, Utility::TOTAL);
					if($lyfftTrans->save()){
						OpQuote::rejectByUser($opQuote['quote_id'], $opQuote['id']);
						Quote::model()->updateQuoteStatus($opQuote['quote_id'], Quote::STATUS_US_ACCEPT);
						// $this->render('confirmation', array('transaction'=>$lyfftTrans, 'quoteDetail'=>$quoteDetail));
						// $this->actionConfirmation($lyfftTrans->id);
						$this->redirect(array('transaction/confirmation/' . $lyfftTrans->id));
						return;
					}
				}else{
					Yii::app()->utility->logActivity("u", Yii::app()->user->getId(), "braintree payment", "User payment failed", Yii::app()->user->getId());
				}
			}
		}
		// Note that the braintreeCCUI object requires both the 'model' for the $payment and the 'payment' is because
		// the JS requires an object called '$model' and the PHP requires an object called '$payment'
		// and here ends my disertation on why I don't like PHP as a major development language...
		$this->render('braintreeCCUI', array('model'=>$payment,'payment'=>$payment,'flightData'=>$flightData));
	}
	public function actionConfirmation($id){
		// $templateController = new TemplatesController("TemplatesController");
		// confirm to Operator
		Yii::import('application.controllers.TemplatesController');
		TemplatesController::actionOpConfirmBid($id);
		// confirm to Broker
		TemplatesController::actionBrConfirmBid($id);
		// confirm to Buyer
		TemplatesController::actionUsConfirmBid($id);
		
		$transaction_id = $id;
		$transaction = Transaction::model()->findByPk($transaction_id);
		
		$this->render('confirmation', array('transaction'=>$transaction));
	}
	public function recordTransaction($payment, $flightData, $result, $opQuote, $paymenttype){
		$btTrans = $result['result']->transaction;
		$lyfftTrans = new Transaction();
		$lyfftTrans->contract_acceptance = date("Y-m-d H:i:s"); // can't get here without it...TODO - need to add contracts and have a contract record with acceptance...
		$lyfftTrans->bid_id = $opQuote['id'];
		$lyfftTrans->user_id = Yii::app()->user->id;
		$lyfftTrans->quote_id = $opQuote['quote_id'];
		$lyfftTrans->type = $paymenttype;
		$lyfftTrans->timestamp = date("Y-m-d H:i:s");
		$lyfftTrans->amount = $btTrans->amount;
		$lyfftTrans->charge_account_name = $btTrans->customer['firstName'] . ' ' . $btTrans->customer['lastName'];
		$lyfftTrans->credit_card = $btTrans->creditCardDetails->maskedNumber;
		$lyfftTrans->credit_card_exparation_date = $btTrans->creditCardDetails->expirationDate;
		$lyfftTrans->credit_card_security_code = "???"; // not provided by Braintree
		$lyfftTrans->aproval_stage = Utility::SUBMITTED;
		$lyfftTrans->credit_card_name = $btTrans->creditCardDetails->cardType;
		return $lyfftTrans;
	}
}