<?php

/**
 * This is the model class for table "FAA_aircraft_master".
 *
 * The followings are the available columns in table 'FAA_aircraft_master':
 * 
 * @property integer $id
 * @property string $n_number
 * @property string $serial_number
 * @property string $mfr_mdl_code
 * @property string $eng_mfr_mdl
 * @property integer $year_mfr
 * @property integer $type_registrant
 * @property string $name
 * @property string $street
 * @property string $street2
 * @property string $city
 * @property string $state
 * @property string $zip_code
 * @property string $region
 * @property string $county
 * @property string $country
 * @property string $last_action_date
 * @property string $cert_issue_date
 * @property string $certification
 * @property integer $type_aircraft
 * @property integer $type_engine
 * @property string $status_code
 * @property string $mode_s_code
 * @property string $fract_owner
 * @property string $air_worth_date
 * @property string $other_names_1
 * @property string $other_names_2
 * @property string $other_names_3
 * @property string $other_names_4
 * @property string $other_names_5
 * @property string $expiration_date
 * @property string $unique_id
 * @property string $kit_mfr
 * @property string $kit_model
 * @property string $mode_s_code_hex
 */
class FAAAircraftMaster extends CActiveRecord{
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'FAA_aircraft_master';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('n_number, serial_number, mfr_mdl_code, eng_mfr_mdl, year_mfr, type_registrant, name, street, street2, city, state, zip_code, region, county, country, last_action_date, cert_issue_date, certification, type_aircraft, type_engine, status_code, mode_s_code, fract_owner, air_worth_date, other_names_1, other_names_2, other_names_3, other_names_4, other_names_5, expiration_date, unique_id, kit_mfr, kit_model, mode_s_code_hex','required'),array('year_mfr, type_registrant, type_aircraft, type_engine','numerical','integerOnly'=>true),array('n_number, eng_mfr_mdl','length','max'=>5),array('serial_number, kit_mfr','length','max'=>30),array('mfr_mdl_code','length','max'=>7),array('name, other_names_1, other_names_2, other_names_3, other_names_4, other_names_5','length','max'=>50),array('street, street2','length','max'=>33),array('city','length','max'=>18),array('state, country, status_code','length','max'=>2),array('zip_code, certification, mode_s_code_hex','length','max'=>10),array('region, fract_owner','length','max'=>1),array('county','length','max'=>3),array('mode_s_code, unique_id','length','max'=>8),array('kit_model','length','max'=>20),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, n_number, serial_number, mfr_mdl_code, eng_mfr_mdl, year_mfr, type_registrant, name, street, street2, city, state, zip_code, region, county, country, last_action_date, cert_issue_date, certification, type_aircraft, type_engine, status_code, mode_s_code, fract_owner, air_worth_date, other_names_1, other_names_2, other_names_3, other_names_4, other_names_5, expiration_date, unique_id, kit_mfr, kit_model, mode_s_code_hex','safe','on'=>'search'));
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
		return array('id'=>'ID','n_number'=>'N Number','serial_number'=>'Serial Number','mfr_mdl_code'=>'Mfr Mdl Code','eng_mfr_mdl'=>'Eng Mfr Mdl','year_mfr'=>'Year Mfr','type_registrant'=>'Type Registrant','name'=>'Name','street'=>'Street','street2'=>'Street2','city'=>'City','state'=>'State','zip_code'=>'Zip Code','region'=>'Region','county'=>'County','country'=>'Country','last_action_date'=>'Last Action Date','cert_issue_date'=>'Cert Issue Date','certification'=>'Certification','type_aircraft'=>'Type Aircraft','type_engine'=>'Type Engine','status_code'=>'Status Code','mode_s_code'=>'Mode S Code','fract_owner'=>'Fract Owner','air_worth_date'=>'Air Worth Date','other_names_1'=>'Other Names 1','other_names_2'=>'Other Names 2','other_names_3'=>'Other Names 3','other_names_4'=>'Other Names 4','other_names_5'=>'Other Names 5','expiration_date'=>'Expiration Date','unique_id'=>'Unique','kit_mfr'=>'Kit Mfr','kit_model'=>'Kit Model','mode_s_code_hex'=>'Mode S Code Hex');
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
		$criteria->compare('n_number', $this->n_number, true);
		$criteria->compare('serial_number', $this->serial_number, true);
		$criteria->compare('mfr_mdl_code', $this->mfr_mdl_code, true);
		$criteria->compare('eng_mfr_mdl', $this->eng_mfr_mdl, true);
		$criteria->compare('year_mfr', $this->year_mfr);
		$criteria->compare('type_registrant', $this->type_registrant);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('street', $this->street, true);
		$criteria->compare('street2', $this->street2, true);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('state', $this->state, true);
		$criteria->compare('zip_code', $this->zip_code, true);
		$criteria->compare('region', $this->region, true);
		$criteria->compare('county', $this->county, true);
		$criteria->compare('country', $this->country, true);
		$criteria->compare('last_action_date', $this->last_action_date, true);
		$criteria->compare('cert_issue_date', $this->cert_issue_date, true);
		$criteria->compare('certification', $this->certification, true);
		$criteria->compare('type_aircraft', $this->type_aircraft);
		$criteria->compare('type_engine', $this->type_engine);
		$criteria->compare('status_code', $this->status_code, true);
		$criteria->compare('mode_s_code', $this->mode_s_code, true);
		$criteria->compare('fract_owner', $this->fract_owner, true);
		$criteria->compare('air_worth_date', $this->air_worth_date, true);
		$criteria->compare('other_names_1', $this->other_names_1, true);
		$criteria->compare('other_names_2', $this->other_names_2, true);
		$criteria->compare('other_names_3', $this->other_names_3, true);
		$criteria->compare('other_names_4', $this->other_names_4, true);
		$criteria->compare('other_names_5', $this->other_names_5, true);
		$criteria->compare('expiration_date', $this->expiration_date, true);
		$criteria->compare('unique_id', $this->unique_id, true);
		$criteria->compare('kit_mfr', $this->kit_mfr, true);
		$criteria->compare('kit_model', $this->kit_model, true);
		$criteria->compare('mode_s_code_hex', $this->mode_s_code_hex, true);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return FAAAircraftMaster the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
