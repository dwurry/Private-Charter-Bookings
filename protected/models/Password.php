<?php

/**
 * This is the model class for Password which is used by "user".
 *
 * The followings are the available columns in table 'user':
 * 
 * @property string $oldPassword
 * @property string $NewPassword
 * @property string $VerifyPassword
 */
class Password extends CFormModel{
	public $oldPassword;
	public $newPassword = null;
	public $verifyPassword = false;
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('oldPassword, newPassword, verifyPassword','required'),array('newPassword, verifyPassword','safe'),array('oldPassword, newPassword, verifyPassword','required','on'=>'changePwd'),array('oldPassword','findPasswords','on'=>'changePwd'),array('verifyPassword','compare','compareAttribute'=>'newPassword','on'=>'changePwd'),array('oldPassword, newPassword, verifyPassword','length','max'=>32,'on'=>'changePwd'));
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array('oldPassword'=>'Password','newPassword'=>'New Password','verifyPassword'=>'Repeat Password');
	}
	public function findPasswords($attribute, $params){
		$user = User::model()->findByPk(Yii::app()->user->getId());
		if($user->password != md5($this->oldPassword)){
			$this->addError($attribute, 'Old password is incorrect.');
			$user->addError($attribute, 'Old password is incorrect.');
		}
	}
	public function changePwd(){
		$user = User::model()->findByPk(Yii::app()->user->getId());
		// verify password complexity
		// $user->password = md5($this->newPassword); // the change is already hacked in...
		$user->password = $this->newPassword;
		if($user->validate()) return $user->save();
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
