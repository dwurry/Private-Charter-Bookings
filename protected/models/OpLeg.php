<?php

/**
 * This is the model class for table "op_quote".
 *
 * The followings are the available columns in table 'op_quote':
 * 
 * @property integer $id
 * @property integer $leg_id
 * @property integer $quote_id
 * @property integer $op_id
 * @property integer $aircraft_id
 * @property integer $mins
 * @property integer $cost
 * @property string $margin
 * @property string $total
 * @property integer $dep_ts
 * @property integer $arr_ts
 * @property integer $dist
 */
class OpLeg extends CActiveRecord{
	const STATUS_OP_REVIEW = 0;
	const STATUS_BR_REVIEW = 1;
	const STATUS_US_REVIEW = 2;
	const STATUS_US_ACCEPT = 3;
	const STATUS_US_CANCEL = 4;
	const STATUS_OP_REJECT = 5;
	const STATUS_BR_REJECT = 6;
	const STATUS_US_REJECT = 7;
	const STATUS_OP_ERROR = 8;
	const STATUS_BR_ERROR = 9;
	const STATUS_US_ERROR = 10;
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'op_leg';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('cost, margin, total','required'),
					array('id, leg_id, quote_id, op_id, aircraft_id, mins, dist, dep_ts, arr_ts','numerical','integerOnly'=>true),
					array('cost, margin, total','numerical'),
					array('id, quote_id, leg_id, op_id, aircraft_id, mins, cost, margin, total, dist, dep_ts, arr_ts','safe','on'=>'search'));
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations(){
		return array();
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array('id'=>'ID',
					'quote_id'=>'Quote',
					'leg_id'=>'Leg',
					'op_id'=>'Operator',
					'aircraft_id'=>'Aircraft',
					'mins'=>'Sum of all flight legs minutes',
					'cost'=>'Flight Cost',
					'margin'=>'Margin (ChOp Fee)',
					'total'=>'Subtotal (pre-tax)',
					'dep_ts'=>'Scheduled time of departure',
					'arr_ts'=>'Estimated time of arivial',
					'dist'=>'Liniar distance from departing airport runway to arriving airport runway in nautical miles');
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
		
		$criteria->compare('id',		$this->id);
		$criteria->compare('leg_id',	$this->id);
		$criteria->compare('quote_id',	$this->quote_id);
		$criteria->compare('op_id', $this->op_id);
		$criteria->compare('aircraft_id', $this->aircraft_id);
		$criteria->compare('mins',		$this->mins);
		$criteria->compare('cost',		$this->cost, true);
		$criteria->compare('margin',	$this->margin, true);
		$criteria->compare('total',	$this->total, true);
		$criteria->compare('dep_ts', $this->origin_ts, true);
		$criteria->compare('arr_ts', $this->final_ts, true);
		$criteria->compare('dist', $this->dist, true);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * This is a signature method required by CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return OpQuote the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	public function calcMins(){
		// Need opQuote, opData, AcRefData
		$ac = OperatorAircraft::model()->findByPk($this->aircraft_id);
		$opData = OperatorData::model()->findByPk($this->op_id);
		$acRef = OperatorAircraftRef::model()->findByAttributes(array('operator_aircraft_id'=>$ac->id));
		
		return round((60*($this->dist + 
				($this->dist * $opData->default_route_buffer)) / 
				($acRef->speed * $acRef->derating)), 0);
	}
	
	public function setValues($leg, $dist, $mins, $cost, $margin, $total, $dep_ts){
		$this->dist 	= $dist;
		$this->mins 	= $mins;
		$this->cost 	= $cost;
		$this->margin 	= $margin;
		$this->total	= $total;
		$this->dep_ts	= $dep_ts;
		$arrTime = Utility::calcArrivalTime($leg['dep_time'], $leg['dep_tz'], $this->mins, 30, 30, $leg['arr_tz']);
		$this->arr_ts = strtotime($arrTime);
	}
}
