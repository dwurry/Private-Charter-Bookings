<?php

/**
 * This is the model class for table "broker_detail".
 *
 * The followings are the available columns in table 'broker_detail':
 * 
 * @property integer $id
 * @property integer $quote_id
 * @property integer $bid_id
 * @property string $percent
 * @property string $percent_fee
 * @property string $fixed_fee
 * @property boolean $agree
 * @property string $contract_acceptance
 * @property string $contract
 */
class BrokerDetail extends CActiveRecord{
	public $passengerEmail = '';
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'broker_detail';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('quote_id, bid_id, percent_fee, fixed_fee','required'),array('quote_id, bid_id','numerical','integerOnly'=>true),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, quote_id, bid_id, percent, percent_fee, fixed_fee, contract_acceptance, contract','safe','on'=>'search'));
	}
	
	/**
	 * check user has aggreed to chontract (validation function)
	 * dumbasses? Nobody thought about how to validate a partial object?
	 */
	public function validateAgreement($attribute, $params){
		if(isset($this->$attribute) && $this->$attribute != 1){
			$this->addError($attribute, 'You must accept term to use our service');
			return false;
		}else{
			return true;
		}
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
		return array('id'=>'ID','quote_id'=>'Quote','bid_id'=>'Bid','percent'=>'Percent Charged','percent_fee'=>'Fee Charged based on commission','fixed_fee'=>'Fixed Fee charged on all bookings','agree'=>'Agree to the contract terms','contract_acceptance'=>'Contract Acceptance','contract'=>'Contract Text');
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
		$criteria->compare('bid_id', $this->bid_id);
		$criteria->compare('percent', $this->percent);
		$criteria->compare('percent_fee', $this->percent_fee);
		$criteria->compare('fixed_fee', $this->fixed_fee);
		$criteria->compare('agree', $this->agree);
		$criteria->compare('contract_acceptance', $this->contract_acceptance, true);
		$criteria->compare('contract', $this->contract, true);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return BrokerDetail the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
