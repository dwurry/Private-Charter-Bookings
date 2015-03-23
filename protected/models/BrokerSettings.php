<?php

/**
 * This is the model class for table "broker_settings".
 *
 * The followings are the available columns in table 'broker_settings':
 * 
 * @property integer $id
 * @property integer $user_id
 * @property string $company_name
 * @property string $address_street
 * @property string $address_2nd_line
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $email
 * @property stringd $percent_commision
 * @property string $added_fee
 * @property string $contract
 */
class BrokerSettings extends CActiveRecord{
	const DEFAULT_COMMISSION = 5;
	const DEFAULT_FIXED_FEE = 100;
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'broker_settings';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('user_id, city, state, zip, email, percent_commision, added_fee','required'),array('id, user_id','numerical','integerOnly'=>true),array('company_name, address_street, address_2nd_line, city, email','length','max'=>45),array('state','length','max'=>2),array('zip','length','max'=>10),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, user_id, company_name, address_street, address_2nd_line, city, state, zip, email, percent_commision, added_fee, contract','safe','on'=>'search'));
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
		return array('id'=>'ID','user_id'=>'User','company_name'=>'Company Name','address_street'=>'Address Street','address_2nd_line'=>'Address 2nd Line','city'=>'City','state'=>'State','zip'=>'Zip','email'=>'Email','percent_commision'=>'Percent Commision','added_fee'=>'Added Fee','contract'=>'Contract');
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
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('company_name', $this->company_name, true);
		$criteria->compare('address_street', $this->address_street, true);
		$criteria->compare('address_2nd_line', $this->address_2nd_line, true);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('state', $this->state, true);
		$criteria->compare('zip', $this->zip, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('percent_commision', $this->percent_commision);
		$criteria->compare('added_fee', $this->added_fee);
		$criteria->compare('contract', $this->contract, true);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return BrokerSettings the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
