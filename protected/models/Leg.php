<?php

/**
 * This is the model class for table "quote".
 *
 * The followings are the available columns in table 'quote':
 * 
 * @property integer $id
 * @property integer $quote_id
 * @property string $dep_arp
 * @property string $dep_time
 * @property integer $dep_ts
 * @property string $dep_tz
 * @property integer $dep_lat
 * @property integer $dep_lng
 * @property string $dep_address
 * @property string $arr_arp
 * @property string $arr_tz
 * @property integer $arr_lat
 * @property integer $arr_lng
 * @property string $arr_address
 * @property integer $dist
 * @property integer $num_trav
 *
 */
class Leg extends CActiveRecord{
	public $retTime;
	public $customerEmail;
	public $passengerEmail;
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'leg';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		return array(array('num_trav, dep_time, quote_id','required'),array('num_trav, dist, quote_id','numerical','integerOnly'=>true),array('dep_lat, dep_lng, arr_lat, arr_lng','numerical'),array('dep_arp, arr_arp','length','max'=>6),array('dep_address, arr_address','length','max'=>255),array('dep_time','length','min'=>9),array('dep_time','safe'),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, quote_id, dep_arp, arr_arp, dist, num_trav, dep_time, dep_lat, dep_lng, arr_lat, arr_lng, dep_address, arr_address','safe','on'=>'search'),array('dep_address, arr_address','validateAddress','on'=>'new'))		// true means addess maps to a lat/lng.
		;
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
		return array('id'=>'ID','quote_id'=>'Quote ID','dep_arp'=>'Departure Airport Code','dep_time'=>'Departure Time','dep_ts'=>'Departure Timestamp','dep_tz'=>'Departure Timezone','dep_lat'=>'Departure Latitude','dep_lng'=>'Departure Longitude','dep_address'=>'Departure Address','arr_arp'=>'Arrival Airport Code','arr_tz'=>'Arrival Timezone','arr_lat'=>'Arrival Latitude','arr_lng'=>'Arrival Longitude','arr_address'=>'Arrival Address','dist'=>'Distance','num_trav'=>'Number of Travelers');
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
		$criteria->compare('quote_id', $this->quote_id);
		$criteria->compare('dep_arp', $this->dep_arp, true);
		$criteria->compare('dep_time', $this->dep_time, true);
		$criteria->compare('dep_ts', $this->dep_tz);
		$criteria->compare('dep_tz', $this->dep_tz);
		$criteria->compare('dep_lat', $this->dep_lat);
		$criteria->compare('dep_lng', $this->dep_lng);
		$criteria->compare('dep_address', $this->dep_address, true);
		$criteria->compare('arr_arp', $this->arr_arp, true);
		$criteria->compare('arr_tz', $this->arr_tz);
		$criteria->compare('arr_lat', $this->arr_lat);
		$criteria->compare('arr_lng', $this->arr_lng);
		$criteria->compare('arr_address', $this->arr_address, true);
		$criteria->compare('dist', $this->dist);
		$criteria->compare('num_trav', $this->num_trav);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 *
	 * @return actions to perform before saving
	 */
	public function beforeSave(){
		if(!empty($this->dep_arp)) $this->dep_arp = strtoupper($this->dep_arp);
		if(!empty($this->arr_arp)) $this->arr_arp = strtoupper($this->arr_arp);
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
	
	/*
	 * We do this as a select to get an unstructured record back 
	 * so that we can add a buyer to the last leg for display.
	 * Why?
	 * Becuase dumb-asses at Yii never thought of how to add an 
	 * non-db handled field to CActiveRecord.
	 */
	public static function getLegsForQuote($qid){
		// SELECT * FROM `leg` WHERE `quote_id` = 17 order by `dep_time` ASC
		return Yii::app()->db->createCommand()
			->select('l.*, a.city as arr_city, a.state as arr_state, d.city as dep_city, d.state as dep_state')
			->from('leg l, airport a, airport d')
			->where('quote_id =:qid and l.arr_arp = a.location_id and l.dep_arp = d.location_id', array(':qid'=>$qid))->order('dep_ts ASC')->queryAll();
	}
	public static function getFirstLeg($qid){
		return Yii::app()->db->createCommand()->select('*')->from('leg')->where('quote_id =:qid', array(':qid'=>$qid))->order('dep_ts ASC')->limit(1)->queryRow();
	}
	public static function getLastLeg($qid){
		return Yii::app()->db->createCommand()->select('*')->from('leg')->where('quote_id =:qid', array(':qid'=>$qid))->order('dep_ts DESC')->limit(1)->queryRow();
	}
	public static function getSumOfDistances($qid){
		$distArray = Yii::app()->db->createCommand()->select('sum(dist) as dist')->from('leg')->where('quote_id = ' . $qid)->queryRow();
		return $distArray['dist'];
	}
	public static function getClosestAirport($lat, $lng){
		// "SELECT location_id, ( 3959 * acos( cos( radians(" . $lat . ") ) * cos( radians( `latitude_dd` ) ) * cos( radians( `longitude_dd` ) - radians(" . $lng . ") ) + sin( radians(" . $lat . ") ) * sin( radians( `latitude_dd` ) ) ) ) AS distance
		// FROM `airport`" . " WHERE TYPE = 'AIRPORT'" . " ORDER BY distance";
		return Yii::app()->db->createCommand()->select('location_id, ( 3959 * acos(cos(radians(' . $lat . ')) * 
										cos(radians(`latitude_dd`)) * 
										cos(radians(`longitude_dd`) - radians(' . $lng . ')) + sin(radians(' . $lat . ')) * 
										sin(radians(`latitude_dd`)))) AS distance')->from('airport')->where('TYPE = "AIRPORT"')->order('distance')->limit(1)->queryRow();
	}
	public function validateAddress($attribute, $params){
		// Note: The Yii-diots give you a text string of the attribute name instead of giving you the value.
		// You dereference the string like this: $this->$attribute (note the second $).
		// Params are fixed values passed into by the rules array.
		$prefix = explode('_', $attribute)[0]; // this gets the 'dep' or 'arr' prefix out of the attribute name.
		$value = $this->$attribute;
		
		$lat = $prefix . '_' . 'lat';
		$lng = $prefix . '_' . 'lng';
		$arp = $prefix . '_' . 'arp';
		
		$data = Airport::model()->findByAttributes(array('location_id'=>$value));
		if(isset($data)){ // found airport data
			$this->$lat = $data->latitude_dd;
			$this->$lng = $data->longitude_dd;
			$this->$arp = $value;
			return true;
		}
		
		// didn't find it under a know aiport code.
		$result = UsController::geoLookup($value);
		if(isset($result) && isset($result['location_type']) && $result['location_type'] == 'ROOFTOP'){
			$this->$lat = $result['lat'];
			$this->$lng = $result['lng'];
			$airportInfo = Leg::getClosestAirport($this->$lat, $this->$lng);
			$this->$arp = $airportInfo['location_id'];
			return true; // technicall, don't have to do this.
		}else{ // address string did not map to a lat long for google maps.
			$addressName = ($prefix == 'dep')?'departure':'arrival';
			$this->addError($attribute, 'There was a problem with the ' . $addressName . ' address information you entered.  Enter an airport ' . 'code (usally three digets like SQL for San Carlose Municipal Airport) ' . 'or the passenger\'s street address and we\'ll find nearby airports.  Do not ' . 'enter a location (like a street or intersection) because locations can be too ambiguous.');
			return false;
		}
	}
	public function buildReturnLeg($returnTime){
		$returnLeg = new Leg();
		$returnLeg->quote_id = $this->quote_id;
		$returnLeg->dep_arp = $this->arr_arp;
		$returnLeg->dep_address = $this->arr_address;
		$returnLeg->dep_ts = strtotime($returnTime);
		$returnLeg->dep_tz = Utility::getTimeZone($returnTime, $this->arr_lat, $this->arr_lng);
		$returnLeg->dep_time = Utility::applyTimezone($returnTime, $this->dep_tz);
		$returnLeg->dep_lat = $this->arr_lat;
		$returnLeg->dep_lng = $this->arr_lng;
		$returnLeg->arr_arp = $this->dep_arp;
		$returnLeg->arr_address = $this->dep_address;
		$returnLeg->arr_lat = $this->dep_lat;
		$returnLeg->arr_lng = $this->dep_lng;
		// Small window of error here. Since we don't know the flight time, in some cases there
		// will be a daylight savings change altering the time zone durring the flight.
		$returnLeg->arr_tz = Utility::getTimeZone($returnLeg->dep_time, $this->arr_lat, $this->arr_lng);
		$returnLeg->dist = $this->dist;
		$returnLeg->num_trav = $this->num_trav;
		$returnLeg->validateFutureTime($this->dep_ts, 'ret_time');
		return $returnLeg;
	}
	public function validateFutureTime($previousLegTS, $fieldName){
		// validating departure time: to do this properly we need the $leg->dep-tz, which
		// requires a valid lat/lng and a valid dep_address
		date_default_timezone_set(Yii::app()->params['timezone']);
		$timestamp = strtotime($this->dep_time);
		if($timestamp != false){
			$this->dep_tz = Utility::getTimeZone($this->dep_time, $this->dep_lat, $this->dep_lng);
			$dateTime = new DateTime($this->dep_time, new DateTimeZone($this->dep_tz));
			$this->dep_ts = $dateTime->getTimestamp();
			$this->dep_time = Utility::applyTimezone($this->dep_time, $this->dep_tz);
		}else{
			$this->addError('dep_time', 'Time as entered is not readable');
		}
		
		if(!isset($previousLegTS)){
			$nowTimestamp = new DateTime(null, new DateTimeZone($this->dep_tz));
			$nowTimestamp = $nowTimestamp->getTimestamp();
			$minDepartureTS = $nowTimestamp;
		}else{
			$minDepartureTS = $previousLegTS;
		}
		if($minDepartureTS > $this->dep_ts){
			$timeName = ($fieldName == 'dep_time')?'departure':'return';
			if(isset($previousLegTS)){
				$this->addError('dep_time', 'The ' . $timeName . ' time for this leg needs to be moved to a later date/time because it occurs before the previous leg.');
			}else{
				$this->addError('dep_time', 'The ' . $timeName . ' time for this leg needs to be moved to a later date/time because it occurs in the past.');
			}
		}
	}
	public static function calcFlightMins($legArray, $acRef, $route_buffer){
		$bufferedDist = $legArray['dist'] + $legArray['dist'] * $route_buffer;
		return round(($bufferedDist / ($acRef->speed * $acRef->derating) * 60), 0);
	}
	

}
