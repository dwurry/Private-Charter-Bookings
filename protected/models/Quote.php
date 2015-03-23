<?php

/**
 * This is the model class for table "quote".
 *
 * The followings are the available columns in table 'quote':
 * 
 * @property integer $id
 * @property integer $cust_id
 * @property integer $broker_id
 * @property integer $auth_level
 * @property integer $status change: status
 *          
 */
class Quote extends CActiveRecord{
	// Had to change this so that status represents the next event the quote is ready for...rather than the last event that occured.
	// Doing this makes queries much eaisier and the sorting can be done in the controller, prosederally rather than with complex
	// queries hitting the database.
	const STATUS_SY_PROCESS = 1;
	const STATUS_OP_REVIEW = 2;
	const STATUS_BR_REVIEW = 3;
	const STATUS_US_REVIEW = 4;
	const STATUS_US_ACCEPT = 5;
	const STATUS_US_PAID_FINAL = 6;
	const STATUS_OP_REJECT = 7;
	const STATUS_BR_REJECT = 8;
	const STATUS_US_REJECT = 9;
	
	// TODO = convert r.status to these codes ^ throughout this file
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'quote';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('cust_id, broker_id, auth_level, status','numerical','integerOnly'=>true),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, cust_id, broker_id, auth_level, status','safe','on'=>'search'));
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
		return array('id'=>'ID','cust_id'=>'Customer ID','broker_id'=>'Broker ID','auth_level'=>'Authorization Level','status'=>'Quote Status');
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
		$criteria->compare('cust_id', $this->cust_id);
		$criteria->compare('broker_id', $this->broker_id);
		$criteria->compare('auth_level', $this->auth_level);
		$criteria->compare('status', $this->status);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 *
	 * @return actions to perform before saving
	 */
	public function beforeSave(){
		return true;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return Quote the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	/*
	 * BEGIN CUSTOM FUNCTIONS
	 */
	
	// only selects from claimed operators now
	// TODO: resolve aircraft:home_airport issue.
	public function getQuoteMatchingAircraft($range, $no_seats){
		return Yii::app()->db->createCommand()
			->select('o.id AS aircraft_id,
            		  o.operator_id AS operator_id ')
            ->from('operator_aircraft o')
			->join('operator_aircraft_ref r', 'o.id=r.operator_aircraft_id')
			->join('operator p', 'o.operator_id=p.id')
		->where('r.no_seats>=:seats and o.range>=:range and p.claimed=:claimed', array(':seats'=>$no_seats,':range'=>$range,':claimed'=>1))->queryAll();
	}
	
	/**
	 * Verifies that the quote has not been run through the system yet.
	 * This could happen if multiple threads are running
	 * quotes.
	 * 
	 * @param unknown $id        
	 */
	public function checkForExistingQuote($id){
		return Yii::app()->db->createCommand()->select()->from('op_quote')->where('quote_id=:id1', array(':id1'=>$id))->queryAll();
	}
	public function getS1Quotes($id){
		return Yii::app()->db->createCommand()->select()->from('op_quote r')->join('quote q', 'r.quote_id=q.id')->where('r.operator_id=:id1 AND q.status=:st1', array(':id1'=>$id,':st1'=>Quote::STATUS_OP_REVIEW))->queryAll();
	}
	public function getOpReviewQuotes($id){
		return Yii::app()->db->createCommand()->select()->from('op_quote r')->join('quote q', 'r.quote_id=q.id')->where('r.operator_id=:id1 AND q.status=:st1', array(':id1'=>$id,':st1'=>Quote::STATUS_OP_REVIEW))->group('q.id')->queryAll();
	}
	const META_STATUS_REVIEW = 100; // Note: Meta Status interact with STATUS and can not have the same #'s.
	const META_STATUS_BOOKED = 101;
	
	// Time is only relevant when state = booked.
	const TIME_ANY = 0;
	const TIME_PENDING = 1; // Flights finalized but > now + 24 hours
	const TIME_CURRENT = 2; // Flights in progress Now < 24 hours and Now > 24 hours
	const TIME_PAST = 3; // historical records Time < now
	const GROUP_OP_QUOTES = 1;
	const GROUP_BR_QUOTES = 2; // quote:broker_id
	const GROUP_US_QUOTES = 3; // quote:cust_id
	public static function getTimeQueryStr($time){
		if($time == Quote::TIME_ANY) return '';
		$now = time();
		// note flights may show up in both Pending & Current because they can be made within 4 hours notice.
		if($time == Quote::TIME_PENDING) return 'AND d.origin_ts > ' . $now; // future
		if($time == Quote::TIME_CURRENT) return 'AND ( d.origin_ts < ' . $now . ' AND ' . 'd.final_ts > ' . $now . ') ';
		if($time == Quote::TIME_PAST) return 'AND d.final_ts < ' . $now; // history
	}
	public function getUserQuotesByStatus($uid, $status = QUOTE::META_STATUS_REVIEW, $group = Quote::GROUP_OP_QUOTES, $time = Quote::TIME_ANY){
		if($status == Quote::META_STATUS_REVIEW) $statusQuery = '( q.status = ' . Quote::STATUS_US_REVIEW . ' OR q.status = ' . Quote::STATUS_BR_REVIEW . ' OR q.status = ' . Quote::STATUS_OP_REVIEW . ' ) ';
		else if($status == Quote::META_STATUS_BOOKED) $statusQuery = '( q.status = ' . Quote::STATUS_US_ACCEPT . ' OR q.status = ' . Quote::STATUS_US_PAID_FINAL . ' ) ';
		else $statusQuery = 'q.status = ' . $status;
		
		$timeQuery = Quote::getTimeQueryStr($time);
		
		if($group == Quote::GROUP_OP_QUOTES) $userIdClause = 'd.operator_id';
		if($group == Quote::GROUP_BR_QUOTES) $userIdClause = 'q.broker_id';
		if($group == Quote::GROUP_US_QUOTES) $userIdClause = 'q.cust_id';
		
		return Yii::app()->db->createCommand()
		->selectDistinct('q.*')
		->from('quote q')
		->join('op_quote d', 'd.quote_id=q.id')
		->where($userIdClause . ' = ' . $uid . ' AND ' . $statusQuery . $timeQuery)->queryAll();
	}
	public function isCurrent(){
		return $this->existsByTimeStatus(Quote::TIME_CURRENT);
	}
	public function isBooked(){
		return $this->existsByTimeStatus(Quote::TIME_PENDING);
	}
	public function isHistory(){
		return $this->existsByTimeStatus(Quote::TIME_PAST);
	}
	public function existsByTimeStatus($time){ // $TIME uses Quote::TIME_[PENDING, CURRENT, PAST]
	                                            // get Quote
		$result = Yii::app()->db->createCommand()->selectDistinct('q.*')->from('quote q')->join('op_quote d', 'd.quote_id=q.id')->where('q.id' . ' = ' . $this->id . ' ' . ' AND ( q.status = ' . Quote::STATUS_US_ACCEPT . ' OR q.status = ' . Quote::STATUS_US_PAID_FINAL . ' ) ' . Quote::getTimeQueryStr($time))->queryAll();
		
		if(count($result) == 1) return true;
		else return false;
	}
	public function getQuoteByIdAndTimeStatus($id, $time){ // $TIME uses Quote::TIME_[PENDING, CURRENT, PAST]
		return Yii::app()->db->createCommand()->select('q.*')->from('quote q')->where(q . id . ' = ' . $id)->queryAll();
	}
	public function getS1QuoteDetail($oid, $qid){
		return Yii::app()->db->createCommand()->select('
            r.id as bid_id,
            a.n_number,
			a.serial_number,
            a.home_airport,
            a.cost_per_hour,
            a.range,
			a.id,
            f.mfr,
            f.model,
            f.no_seats,
            f.speed,
            r.overnights,
            r.overnight_fees,
            r.fet,
            r.total_cost,
			r.origin_ts,
			r.final_ts,
            r.status
            ')->from('op_quote r')->join('quote q', 'r.quote_id=q.id')->join('operator_aircraft a', 'r.aircraft_id=a.id')->join('operator_aircraft_ref f', 'a.id=f.operator_aircraft_id')->join('operator_aircraft_engref e', 'a.id=e.operator_aircraft_id')->where('r.status=:st2 AND r.operator_id=:id1 AND r.quote_id=:id2 ' /*AND q.status=:st1*/, 
            		array(':id1'=>$oid,':id2'=>$qid, 
            			  /*':st1'=>Quote::STATUS_OP_REVIEW, */
            			  ':st2'=>OpQuote::STATUS_OP_REVIEW))->queryAll();
	}
	public function updateQuoteStatus($quote_id, $status){
		$command = Yii::app()->db->createCommand();
		$command->update('quote', array('status'=>$status), 'id=:id', array(':id'=>$quote_id));
		return true;
	}
	public function getRadiusArps($lat, $lng){
		$query = "SELECT location_id, ( 3959 * acos( cos( radians(" . $lat . ") ) * cos( radians( `latitude_dd` ) ) * cos( radians( `longitude_dd` ) - radians(" . $lng . ") ) + sin( radians(" . $lat . ") ) * sin( radians( `latitude_dd` ) ) ) ) AS distance
		FROM `airport`" . " WHERE TYPE = 'AIRPORT'" . " ORDER BY distance" . " LIMIT 10";
		$rows = Yii::app()->db->createCommand($query)->queryAll();
		return $rows;
	}
	public function addArpToRelTable($qid, $code, $type){
		$command = Yii::app()->db->createCommand();
		$command->insert('quote_arp_codes', array('quote_id'=>$qid,'arp_code'=>$code,'type'=>$type));
		return true;
	}
	public function getArpsFromRelTable($qid, $type){
		return Yii::app()->db->createCommand()->select()->from('quote_arp_codes')->where('quote_id=:id1 AND type=:type1', array(':id1'=>$qid,':type1'=>$type))->queryAll();
	}
}
