<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity{
	/**
	 * Authenticates a user.
	 */
	private $_id;
	public function authenticate(){
		$record = User::model()->findByAttributes(array('username'=>$this->username));
		if($record === null) $this->errorCode = self::ERROR_USERNAME_INVALID;
		else if($record->password !== md5($this->password)) $this->errorCode = self::ERROR_PASSWORD_INVALID;
		else{
			$this->_id = $record->id;
			$this->setState('id', $record->id);
			$this->setState('fname', $record->fname);
			$this->setState('lname', $record->lname);
			$this->setState('company', $record->company);
			$this->setState('level', $record->auth_level); // Yii::app()->user->level
			$this->errorCode = self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	public function getId(){
		return $this->_id;
	}
}