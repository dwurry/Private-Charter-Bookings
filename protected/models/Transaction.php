<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * 
 * @property integer $id
 * @property integer $bid_id
 * @property integer $user_id
 * @property integer $quote_id
 * @property integer $type
 * @property string $timestamp
 * @property string $amount
 * @property string $charge_account_name
 * @property string $bank_routing_number
 * @property string $checking_account
 * @property string $drivers_license_number
 * @property string $drivers_license_state
 * @property string $credit_card
 * @property string $credit_card_exparation_date
 * @property string $credit_card_security_code
 * @property string $credit_card_name
 * @property integer $aproval_stage
 * @property string $electronic_signature_name
 * @property integer $electronic_sinature_password
 * @property string $contract_acceptance
 * @property string $contract
 */
class Transaction extends CActiveRecord{
	
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'transaction';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('bid_id, user_id, quote_id, type, timestamp, amount, charge_account_name, credit_card, credit_card_exparation_date, credit_card_security_code, credit_card_name, aproval_stage, contract_acceptance','required'),
				// array('bid_id, user_id, type, aproval_stage, electronic_sinature_password', 'numerical', 'integerOnly'=>true),
				array('amount','length','max'=>12),array('charge_account_name','length','max'=>50),
				// array('electronic_signature_name', 'length', 'max'=>50),
				// array('bank_routing_number, checking_account, drivers_license_number', 'length', 'max'=>25),
				array('credit_card','length','max'=>30),array('credit_card_name','length','max'=>20) 
		// The following rule is used by search().
		// @todo Please remove those attributes that should not be searched.
		// array('id, bid_id, user_id, quote_id, type, timestamp, amount, charge_account_name, bank_routing_number, checking_account, drivers_license_number, drivers_license_state, credit_card, credit_card_exparation_date, credit_card_security_code, credit_card_name, aproval_stage, electronic_signature_name, electronic_sinature_password, contract_acceptance', 'safe', 'on'=>'search'),
		// array('contract_acceptance', 'required', 'requiredValue' => 1, 'message' => 'You must accept term to use our service'),
				);
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
		return array('id'=>'ID','bid_id'=>'Bid',		// formerly op_quote_id
		'user_id'=>'User','quote_id'=>'Quote','type'=>'0 = ACH, 1 = Credit, 2 = debit, 3 = pay pal, 4 = bill me later...','timestamp'=>'Timestamp','amount'=>'Amount','charge_account_name'=>'Charge Account Name','bank_routing_number'=>'Bank Routing Number','checking_account'=>'Checking Account','drivers_license_number'=>'Drivers License Number','drivers_license_state'=>'Drivers License State','credit_card'=>'Credit Card','credit_card_exparation_date'=>'Credit Card Exparation Date','credit_card_security_code'=>'Credit Card Security Code','credit_card_name'=>'visa, master card, amex','aproval_stage'=>'0=entered, 1=verified, 2=billed, 3=cleared, 4=disputed, 5=canceled ','electronic_signature_name'=>'Electronic Signature Name','electronic_sinature_password'=>'Electronic Sinature Password','contract_acceptance'=>' I accept the contract terms');
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
		$criteria->compare('bid_id', $this->bid_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('quote_id', $this->quote_id);
		$criteria->compare('type', $this->type);
		$criteria->compare('timestamp', $this->timestamp, true);
		$criteria->compare('amount', $this->amount, true);
		$criteria->compare('charge_account_name', $this->charge_account_name, true);
		$criteria->compare('bank_routing_number', $this->bank_routing_number, true);
		$criteria->compare('checking_account', $this->checking_account, true);
		$criteria->compare('drivers_license_number', $this->drivers_license_number, true);
		$criteria->compare('drivers_license_state', $this->drivers_license_state, true);
		$criteria->compare('credit_card', $this->credit_card, true);
		$criteria->compare('credit_card_exparation_date', $this->credit_card_exparation_date, true);
		$criteria->compare('credit_card_security_code', $this->credit_card_security_code, true);
		$criteria->compare('credit_card_name', $this->credit_card_name, true);
		$criteria->compare('aproval_stage', $this->aproval_stage);
		$criteria->compare('electronic_signature_name', $this->electronic_signature_name, true);
		$criteria->compare('electronic_sinature_password', $this->electronic_sinature_password);
		$criteria->compare('contract_acceptance', $this->contract_acceptance, true);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return Transaction the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	/**
	 * Function to encrypt data.
	 *
	 * Recieves one argument that is the value which is to be encrypted
	 */
	public function encrypt($val){
		if($val != ""){
			
			$ky = "lyfft.off";
			$key = "lyfft.off";
			for($a = 0; $a < strlen($ky); $a++){
				$key[$a % 16] = chr(ord($key[$a % 16]) ^ ord($ky[$a]));
			}
			$mode = MCRYPT_MODE_ECB;
			$enc = MCRYPT_RIJNDAEL_128;
			$val = str_pad($val, (16 * (floor(strlen($val) / 16) + (strlen($val) % 16 == 0?2:1))), chr(16 - (strlen($val) % 16)));
			return addslashes(mcrypt_encrypt($enc, $key, $val, $mode, mcrypt_create_iv(mcrypt_get_iv_size($enc, $mode), MCRYPT_DEV_URANDOM)));
		}else{
			return "";
		}
	}
	
	/**
	 * Function to decrypt data.
	 * Recieves one argument that is the value which is to be decrypted.
	 */
	public function decrypt($val){
		if($val != ""){
			$ky = "lyfft.off";
			$key = "lyfft.off";
			for($a = 0; $a < strlen($ky); $a++){
				$key[$a % 16] = chr(ord($key[$a % 16]) ^ ord($ky[$a]));
			}
			$mode = MCRYPT_MODE_ECB;
			$enc = MCRYPT_RIJNDAEL_128;
			$dec = stripcslashes(@mcrypt_decrypt($enc, $key, $val, $mode, @mcrypt_create_iv(@mcrypt_get_iv_size($enc, $mode), MCRYPT_DEV_URANDOM)));
			return rtrim($dec, ((ord(substr($dec, strlen($dec) - 1, 1)) >= 0 and ord(substr($dec, strlen($dec) - 1, 1)) <= 16)?chr(ord(substr($dec, strlen($dec) - 1, 1))):null));
		}else{
			return "";
		}
	}
}
