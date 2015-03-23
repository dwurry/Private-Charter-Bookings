<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * 
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $company
 * @property string $charter_num
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $phone
 * @property string $weight
 * @property integer $operator_id
 * @property integer $auth_level
 * @property integer $activation_code
 * @property integer $status
 */
class User extends CActiveRecord{
	const USER_ADMIN = 100;
	const USER_OP = 50;
	const USER_BR = 30;
	const USER_US = 10;
	const USER_TR = 5; // Traveler
	public $oldPassword;
	public $password_repeat = null;
	public $password_changed = false;
	
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
		return array(array('fname, lname, username, email, company, street, city, state, zip, phone','required'),array('password','required','on'=>'insert'),array('fname, lname, phone','length','max'=>30),array('password','length','max'=>32),array('username','length','max'=>20),array('email, company, street','length','max'=>100),array('charter_num, city','length','max'=>50),array('state','length','max'=>2),array('zip','length','max'=>10),array('activation_code','length','max'=>40),array('operator_id, auth_level, status','length','max'=>11),array('password_repeat','safe'),array('old_password, new_password, repeat_password','required','on'=>'changePwd'),array('old_password','findPasswords','on'=>'changePwd'),array('repeat_password','compare','compareAttribute'=>'new_password','on'=>'changePwd'),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, fname, lname, username, email, company, charter_num, street, city, state, zip, phone, operator_id, auth_level, status','safe','on'=>'search'));
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
		return array('id'=>'ID','fname'=>'First Name','lname'=>'Last Name','username'=>'Username','email'=>'Email','password'=>'Password','password_repeat'=>'Repeat Password','company'=>'Company','charter_num'=>'Charter Number','street'=>'Street','city'=>'City','state'=>'State','zip'=>'Zip Code','phone'=>'Phone','operator_id'=>'Operator ID','auth_level'=>'Auth Level (10=user, 30=broker, 50=operator, 100=admin)','activation_code'=>'Activation Code','status'=>'Status');
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
		$criteria->compare('charter_num', $this->charter_num, true);
		$criteria->compare('street', $this->street, true);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('state', $this->state, true);
		$criteria->compare('zip', $this->zip, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('operator_id', $this->operator_id);
		$criteria->compare('auth_level', $this->auth_level);
		$criteria->compare('activation_code', $this->activation_code);
		$criteria->compare('status', $this->status);
		
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
		if($name == "password") $this->password_changed = true;
		parent::setAttribute($name, $value);
	}
	
	/**
	 *
	 * @return actions to perform before saving ie: hash password
	 */
	public function beforeSave(){
		if($this->isNewRecord){
			$this->password = $this->encryptPassword();
		}elseif($this->password_changed){
			$this->password = $this->encryptPassword();
		}
		return parent::beforeSave();
	}
	public function encryptPassword(){
		// replace this with much stronger hashing
		return md5($this->password);
	}
	public function findPasswords($attribute, $params){
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if($user->password != md5($this->old_password)) $this->addError($attribute, 'Old password is incorrect.');
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
