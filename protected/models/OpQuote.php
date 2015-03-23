<?php

/**
 * This is the model class for table "op_quote".
 *
 * The followings are the available columns in table 'op_quote':
 * 
 * @property integer $id
 * @property integer $quote_id
 * @property integer $operator_id
 * @property integer $aircraft_id
 * @property integer $overnights
 * @property string $overnight_fees
 * @property string $fet
 * @property string $total_cost
 * @property tinyint $status
 * @property integer $origin_ts Add
 * @property integer $final_ts Add
 */
class OpQuote extends CActiveRecord{
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
	
	public $margin;   // Use for forms only - do not store data
	public $subtotal; // Use for forms only - do not store data
	public $total_dist;// Use for forms only - do not store data
	public $flight_mins;// Use for forms only - do not store data
	public $flight_cost;// Use for forms only - do not store data
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'op_quote';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('overnight_fees, total_cost','required'),
					array('id, quote_id, operator_id, aircraft_id, overnights, status, origin_ts, final_ts','numerical','integerOnly'=>true),
					array('overnight_fees, fet, total_cost','numerical'),
					array('id, quote_id, operator_id, overnights, status, overnight_fees, total_cost, origin_ts, final_ts','safe','on'=>'search'));
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
		return array('id'=>'ID',
					'quote_id'=>'Quote',
					'operator_id'=>'Operator',
					'overnights'=>'Overnights',
					'overnight_fees'=>'Overnight Fees',
					'fet'=>'Federal Excise Tax',
					'total_cost'=>'Total Cost',
					'status'=>'Status',
					'origin_ts'=>'Time of earliest known departure',
					'final_ts'=>'Time of latest know arivial (or departure if arival is not yet known)',);
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
		$criteria->compare('operator_id', $this->operator_id);
		$criteria->compare('aircraft_id', $this->aircraft_id);
		$criteria->compare('overnights', $this->overnights);
		$criteria->compare('overnight_fees', $this->overnight_fees, true);
		$criteria->compare('fet', $this->fet, true);
		$criteria->compare('total_cost', $this->total_cost, true);
		$criteria->compare('status', $this->status, true);
		$criteria->compare('origin_ts', $this->origin_ts, true);
		$criteria->compare('final_ts', $this->final_ts, true);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Required by all CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return OpQuote the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	public static function rejectByUser($quoteId, $opId){
		OpQuote::model()->updateAll(array('status'=>OpQuote::STATUS_US_ACCEPT), 'op_quote.id = ' . $opId);
		OpQuote::model()->updateAll(array('status'=>OpQuote::STATUS_US_REJECT), 'op_quote.quote_id = ' . $quoteId . ' ' . '&& (op_quote.status = ' . OpQuote::STATUS_US_REVIEW . ')');
		
		return true;
	}
	
	public function getLegs(){
		return OpLeg::model()->findAllByAttributes(array('quote_id'=>$this->quote_id, 'aircraft_id'=>$this->aircraft_id));		
	}
	
	// Rollup methods calcuate totals from the legs and roll them up into the quote.
	
	/**
	 * Collects the dollare value of all leg costs.
	 */
	public function legsCostRollup(){
		$legs = $this->getLegs();
		$total = 0;
		foreach ($legs as $leg){
			$total += $leg->total;
		}
		return $total;
	}
	
	/**
	 * Collects the dollar value of all leg margins.
	 */
	public function legsMarginRollup(){
		$legs = $this->getLegs();
		$total = 0;
		foreach ($legs as $leg){
			$total += $leg->margin;
		}
		return $total;
	}
	
	/**
	 * Collects the distance value of all legs.
	 */
	public function legsDistanceRollup(){
		$legs = $this->getLegs();
		$total = 0;
		foreach ($legs as $leg){
			$total += $leg->dist;
		}
		return $total;
	}
	
	/**
	 * Figures out the total in-flight minutes for the trip.
	 * @return number
	 */
	public function legsMinRollup(){
		$legs = $this->getLegs();
		$total = 0;
		foreach ($legs as $leg){
			$total += $leg->mins;
		}
		return $total;
	}
	
	public function calcOriginTs(){
		$ts = Yii::app()->db->createCommand()
			->select('min(dep_ts)')
			->from('op_leg')
			->where('quote_id = '.$this->quote_id. ' AND aircraft_id = '.$this->aircraft_id)->queryAll();
		$ts = $ts[0]['min(dep_ts)'];
		return $ts;
	}
	
	public function calcFinalTs(){
		$ts = Yii::app()->db->createCommand()
		->select('max(arr_ts)')
		->from('op_leg')
		->where('quote_id = '.$this->quote_id. ' AND aircraft_id = '.$this->aircraft_id)->queryAll();
		$ts = $ts[0]['max(arr_ts)'];
		return $ts;
		
	}
	
	/**
	 * Calculates the overnights
	 */
	public function calcOvernights(){
		$originLeg = Leg::getFirstLeg($this->quote_id);
		$finalLeg = Leg::getLastLeg($this->quote_id);
		// verify that last arr = first leg dep...otherwise we need to include an extra fee to move the aircraft.
		$depdate = new DateTime($originLeg['dep_time'], new DateTimeZone($originLeg['dep_tz']));
		$retdate = new DateTime($finalLeg['dep_time'], new DateTimeZone($finalLeg['dep_tz']));
		$interval = $depdate->diff($retdate);
		return $interval->format('%a');
	}
	
	/**
	 * Calcuates the overnight fees
	 */
	public function calcOvernightFees(){
		$op = OperatorData::model()->findByPk($this->operator_id);
		return $this->overnights * $op['overnight_fee'];
	}
	
	/**
	 * Calculates the subtotal (sum of all fees before taxes) $opLeg->costs + $opLeg->margin + opLeg->overnight_fees
	 */
	public function calcSubtotal(){
		return $this->legsCostRollup() + $this->overnight_fees;
	}
	/**
	 * Calculates the federal excise tax
	 */
	public function calcFet(){
		return $this->calcSubtotal() * Utility::FET_PERCENT;
	}
	
	public function calcTotal(){
		return $this->calcSubtotal() + $this->calcFet();
	}
		
	public function updateOpQuote($quote, $aircraft, $save=true){
		
		$this->updateOpLegs($quote, $aircraft, $save);
		
		$this->origin_ts 	= $this->calcOriginTs();
		$this->final_ts		= $this->calcFinalTs();
		$this->overnights 	= $this->calcOvernights();
		$this->overnight_fees = $this->calcOvernightFees();
		$this->fet			= $this->calcFet();
		$this->total_cost	= $this->calcTotal();
		$this->status 		= OpQuote::STATUS_OP_REVIEW;
		if($save) $this->save();		
	}
	
	public function updateOpLegs($quote, $aircraft, $save=true){
		$op = OperatorData::model()->findByPk($aircraft['operator_id']);
		$ac_ref = OperatorAircraftRef::model()->findByAttributes(array('operator_aircraft_id'=>$aircraft['aircraft_id']));
		$ac_data = OperatorAircraft::model()->findByPk($aircraft['aircraft_id']);
								
		// get Legs for quote
		$legs = Leg::model()->getLegsForQuote($quote->id);
		foreach ($legs as $leg){
			$opLeg = new OpLeg();
			$opLeg->leg_id		= $leg['id'];
			$opLeg->quote_id 	= $quote->id;
			$opLeg->op_id = $aircraft['operator_id'];
			$opLeg->aircraft_id = $aircraft['aircraft_id'];
			$bufferedDist 		= $leg['dist'] + $leg['dist'] * $op['default_route_buffer'];
			$legMins			= round(($bufferedDist / ($ac_ref->speed * $ac_ref->derating) * 60), 0);
			$legCost			= round((($legMins / 60) * $ac_data->cost_per_hour),0);
			$legMargin			= round($legCost * $op['default_margin'], 0);
			$opLeg->setValues($leg, $leg['dist'], $legMins, $legCost, $legMargin, $legCost + $legMargin, $leg['dep_ts']);
			if($save) $opLeg->save();
		}
	}
}
