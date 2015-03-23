<?php

/**
 * This is the model class for table "crm_link".
 *
 * The followings are the available columns in table 'quote':
 *
 * @property integer $id
 * @property integer $biz_id
 * @property integer $biz_type
 * @property integer $user_id
 * @property integer $user_type
 *
 */
class CrmLink extends CActiveRecord{
	const BIZ_TYPE_QUOTE = 1; // This link specifies a traveler in a proposal/quote biz_id = Quote:id
	const BIZ_TYPE_BR = 2; // This link specifies a customer of a broker. biz_id = User:id but could be broker_id in future.
	const BIZ_TYPE_OP = 3; // This link specifies a customer of an Operator biz_id = Operator:id
	const BIZ_TYPE_BUYER = 4;
	const USER_TYPE_PASSENGER = 1;
	const USER_TYPE_BUYER = 2;
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'crm_link';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		return array(array('biz_id, biz_type, user_id, user_type','required'),array('biz_id, biz_type, user_id, user_type','numerical','integerOnly'=>true),array('id, biz_id, biz_type, user_id, user_type','safe','on'=>'search'));
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations(){
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array();
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array('id'=>'ID','biz_id'=>'Business ID','biz_type'=>'Type of biz','user_id'=>'User linked to business','user_type'=>'Type of User traveler (Buyer or Passenger)');
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 *         based on the search/filter conditions.
	 */
	public function search(){
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria = new CDbCriteria();
		
		$criteria->compare('id', $this->id);
		$criteria->compare('biz_id', $this->biz_id);
		$criteria->compare('biz_type', $this->biz_type);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('user_type', $this->user_type);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 *
	 * @return actions to perform before saving
	 */
	public function beforeSave(){
		return $this->verifyUnique();
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return CrmLink the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	public static function getQuotePassengers($quoteId){
		return Yii::app()->db->createCommand()->selectDistinct('u.*, l.id as crm_id')
			->from('user u')
			->join('crm_link l', 'u.id = l.user_id')
			->where('l.biz_id = ' . $quoteId . ' AND l.biz_type = ' . CrmLink::BIZ_TYPE_QUOTE . ' AND l.user_type = ' . CrmLink::USER_TYPE_PASSENGER)
			->queryAll();
	}
	
	public static function getQuotePassengerIds($quoteId){
		return Yii::app()->db->createCommand()->selectDistinct('u.id')
			->from('user u')
			->join('crm_link l', 'u.id = l.user_id')
			->where('l.biz_id = ' . $quoteId . ' AND l.biz_type = ' . CrmLink::BIZ_TYPE_QUOTE . ' AND l.user_type = ' . CrmLink::USER_TYPE_PASSENGER)
			->queryAll();
	}
	
	public static function getQuoteBuyer($quoteId){
		return Yii::app()->db->createCommand()->selectDistinct('u.*, l.id as crm_id')->from('user u')->join('crm_link l', 'u.id = l.user_id')->where('l.biz_id = ' . $quoteId . ' AND l.biz_type = ' . CrmLink::BIZ_TYPE_QUOTE . ' AND l.user_type = ' . CrmLink::USER_TYPE_BUYER)->queryAll();
	}
	
	public static function getCustomers(){
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if(isset($user->operator_id) && $user->operator_id != 0){
			$biz_id = $user->operator_id;
			$biz_type = CrmLink::BIZ_TYPE_OP;
		}elseif($user->auth_level == User::USER_BR){
			$biz_id = $user->id;
			$biz_type = CrmLink::BIZ_TYPE_BR;
		}else{
			$biz_id = $user->id;
			$biz_type = CrmLink::BIZ_TYPE_BUYER;
		}
		
		return Yii::app()->db->createCommand()->selectDistinct('u.*, l.id as crm_id')->from('user u')->join('crm_link l', 'u.id = l.user_id')->where('l.biz_id = ' . $biz_id . ' AND l.biz_type = ' . $biz_type)->queryAll();
	}
	public static function getOperatorCustomers($opId){
		return Yii::app()->db->createCommand()->selectDistinct('u.*, l.id as crm_id')->from('user u')->join('crm_link l', 'u.id = l.user_id')->where('l.biz_id = ' . $opId . ' AND l.biz_type = ' . CrmLink::BIZ_TYPE_OP)->queryAll();
	}
	public static function getBrokerCustomers($brId){
		return Yii::app()->db->createCommand()->selectDistinct('u.*, l.id as crm_id')->from('user u')->join('crm_link l', 'u.id = l.user_id')->where('l.biz_id = ' . $brId . ' AND l.biz_type = ' . CrmLink::BIZ_TYPE_BR)->queryAll();
	}
	public function verifyUnique(){
		if($this->biz_type != CrmLink::BIZ_TYPE_QUOTE) 		// note quotes are alloed both USER_BUYER and USER_TRAVELER...
		$existingLink = CRMLink::model()->findByAttributes(array('biz_id'=>$this->biz_id,'biz_type'=>$this->biz_type,'user_id'=>$this->user_id));
		else $existingLink = CRMLink::model()->findByAttributes(array('biz_id'=>$this->biz_id,'biz_type'=>$this->biz_type,'user_id'=>$this->user_id,'user_type'=>$this->user_type));
		
		if(isset($existingLink)){
			$this->addError('id', 'this entry already exists in the db and will not be saved because it is not unique.');
			return false;
		}else{
			return true;
		}
	}
	public static function authorizeUserAccess($id){
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if($id == $user->id) return true;
		if($user->auth_level < User::USER_BR) return false;
		$bizId = $user->id;
		$bizType = CrmLink::BIZ_TYPE_BR;
		if(isset($user->operator_id)){
			$bizId = $user->operator_id;
			$bizType = CrmLink::BIZ_TYPE_OP;
		}
		$valid = Yii::app()->db->createCommand()->selectDistinct('u.id')->from('user u')->join('crm_link l', 'u.id = l.user_id')->where('l.biz_id = ' . $bizId . ' AND l.biz_type = ' . $bizType . ' and u.id = ' . $id)->queryAll();
		if(isset($valid) and $valid[0]['id'] == $id) return true;
		else return false;
	}
	public static function createQuoteSet($quote, $customer, $user_type){
		$userId = $customer->id;
		return CrmLink::create($quote->id, CrmLink::BIZ_TYPE_QUOTE, $userId, $user_type);
	}
	public static function createBidSet($bid, $travlerIdArray){
		$quote = Quote::model()->findByPk($bid->quote_id);
		// add buyer to quote and operator
		$existingBuyer = CrmLink::model()->findByAttributes(array('biz_id'=>$quote->id,'biz_type'=>CrmLink::BIZ_TYPE_QUOTE,'user_type'=>CrmLink::USER_TYPE_BUYER));
		if(!isset($existingBuyer)) CrmLink::create($quote->id, CrmLink::BIZ_TYPE_QUOTE, $quote->cust_id, CrmLink::USER_TYPE_BUYER);
		$existingBuyer = CrmLink::model()->findByAttributes(array('biz_id'=>$bid->operator_id,'biz_type'=>CrmLink::BIZ_TYPE_OP,'user_type'=>CrmLink::USER_TYPE_BUYER));
		if(!isset($existingBuyer)) CrmLink::create($bid->operator_id, CrmLink::BIZ_TYPE_OP, $quote->cust_id, CrmLink::USER_TYPE_BUYER);
		// add travelers to quote, operator, buyer and broker (because travelers may come from buy or broker)
		foreach($travlerIdArray as $userId){
			// Add Travelers to Quote
			$existingTraveler = CrmLink::model()->findByAttributes(array('biz_id'=>$quote->id,'biz_type'=>CrmLink::BIZ_TYPE_QUOTE,'user_id'=>$userId['id'],'user_type'=>CrmLink::USER_TYPE_PASSENGER));
			if(!isset($existingTraveler)) CrmLink::create($quote->id, CrmLink::BIZ_TYPE_QUOTE, $userId['id'], CrmLink::USER_TYPE_PASSENGER);
			// Add Travelers to Operator
			$existingTraveler = CrmLink::model()->findByAttributes(array('biz_id'=>$bid->operator_id,'biz_type'=>CrmLink::BIZ_TYPE_QUOTE,'user_id'=>$userId['id']));
			if(!isset($existingTraveler)) CrmLink::create($bid->operator_id, CrmLink::BIZ_TYPE_OP, $userId['id'], CrmLink::USER_TYPE_PASSENGER);
			// Add Travelers to Broker
			$existingTraveler = CrmLink::model()->findByAttributes(array('biz_id'=>$quote->broker_id,'biz_type'=>CrmLink::BIZ_TYPE_BR,'user_id'=>$userId['id']));
			if(!isset($existingTraveler)) CrmLink::create($quote->broker_id, CrmLink::BIZ_TYPE_BR, $userId['id'], CrmLink::USER_TYPE_PASSENGER);
			// Add Travelers to Buyer
			$existingTraveler = CrmLink::model()->findByAttributes(array('biz_id'=>$quote->cust_id,'biz_type'=>CrmLink::BIZ_TYPE_BUYER,'user_id'=>$userId['id']));
			if(!isset($existingTraveler)) CrmLink::create($quote->cust_id, CrmLink::BIZ_TYPE_BUYER, $userId['id'], CrmLink::USER_TYPE_PASSENGER);
		}
	}
	
	public static function create($biz_id, $biz_type, $user_id, $user_type){
		$crmLink = new CrmLink();
		$crmLink->biz_id = $biz_id;
		$crmLink->biz_type = $biz_type;
		$crmLink->user_id = $user_id;
		$crmLink->user_type = $user_type;
		$crmLink->save();
		return $crmLink;
	}
	public static function addLink($biz, $user, $user_type){
		if(is_a($biz, 'Operator')){
			$biz_type = CrmLink::BIZ_TYPE_OP;
		}elseif(is_a($biz, 'Quote')){
			$biz_type = CrmLink::BIZ_TYPE_QUOTE;
		}else{
			$biz_type = CrmLink::BIZ_TYPE_BR;
		}
		return CrmLink::create($biz->id, $biz_type, $user->id, $user_type);
	}
}
	