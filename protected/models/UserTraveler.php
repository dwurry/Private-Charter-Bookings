<?php

/**
 * This is an adaptaion of the model class for table "user" to accomodate Travelers as system users.
 * Travelers have several unique characteristics:
 * - They are entered by the broker or the buyer.
 * - They may or may not interact directly with the system.
 * - They may login and get a travel confirmation.
 * - They may login and see their flight history and use the system (as a buyer).
 * - They may never use the system and get all their informaiton from by broker or buyer.
 * - The minimal requiremt for a traveler is fname, lname, email, phone and weight
 * - weight is requred for load ballancing in small aircraft.
 * - The username is set to the email address.
 * - Passwords are not validated.
 * - If a traveler logs into the system, they are converted to a full user with auth_level = 10.
 *
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property string $username
 * @property string $email
 * @property string $company
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $phone
 * @property string $weight
 * @property integer $auth_level
 */
class UserTraveler extends CActiveRecord{
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'user';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('fname, lname, email, phone, weight','required'),array('fname, lname, phone','length','max'=>30),array('username','length','max'=>20),array('email, company, street','length','max'=>100),array('city','length','max'=>50),array('state','length','max'=>2),array('weight','length','max'=>6),		// 245.00 lbs.
		array('zip','length','max'=>10),array('auth_level','length','max'=>11),array('fname, lname, email, phone, weight, company, street, city, state, zip','safe'),array('id, fname, lname, username, email, company, street, city, state, zip, phone, weight, auth_level','safe','on'=>'search'));
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
		return array('id'=>'ID','fname'=>'First Name','lname'=>'Last Name','username'=>'Username','email'=>'Email','company'=>'Company','street'=>'Street','city'=>'City','state'=>'State','zip'=>'Zip Code','phone'=>'Phone','weight'=>'Travlers weight in lbs.','auth_level'=>'Auth Level (5=traveler)');
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
		$criteria->compare('fname', $this->fname, true);
		$criteria->compare('lname', $this->lname, true);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('company', $this->company, true);
		$criteria->compare('street', $this->street, true);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('state', $this->state, true);
		$criteria->compare('zip', $this->zip, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('auth_level', $this->auth_level);
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	// override parent functions for password functionality
	public function setAttributes($attributes, $safe = true){
		foreach($attributes as $name=>$value){
			$this->setAttribute($name, $value);
		}
		return true;
	}
	
	// override parent functions for password functionality
	public function setAttribute($name, $value){
		parent::setAttribute($name, $value);
	}
	
	/**
	 *
	 * @return actions to perform before saving ie: hash password
	 */
	public function beforeSave(){
		return parent::beforeSave();
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return User the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
