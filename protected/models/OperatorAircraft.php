<?php

/**
 * This is the model class for table "operator_aircraft".
 *
 * The followings are the available columns in table 'operator_aircraft':
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
 * @property integer $operator_id
 * @property string $home_airport
 * @property integer $cost_per_hour
 * @property integer $range
 */
class OperatorAircraft extends CActiveRecord{
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'operator_aircraft';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				// array('n_number, serial_number, mfr_mdl_code, eng_mfr_mdl, year_mfr, type_registrant, name, street, street2, city, state, zip_code, region, county, country, last_action_date, cert_issue_date, certification, type_aircraft, type_engine, status_code, mode_s_code, fract_owner, air_worth_date, other_names_1, other_names_2, other_names_3, other_names_4, other_names_5, expiration_date, unique_id, kit_mfr, kit_model, mode_s_code_hex', 'required'),
				array('n_number, serial_number, mfr_mdl_code','required'),array('year_mfr, type_registrant, type_aircraft, type_engine, operator_id, cost_per_hour, range','numerical','integerOnly'=>true),array('n_number, eng_mfr_mdl','length','max'=>5),array('serial_number, kit_mfr','length','max'=>30),array('mfr_mdl_code','length','max'=>7),array('name, other_names_1, other_names_2, other_names_3, other_names_4, other_names_5','length','max'=>50),array('street, street2','length','max'=>33),array('city','length','max'=>18),array('state, country, status_code','length','max'=>2),array('zip_code, certification, mode_s_code_hex','length','max'=>10),array('region, fract_owner','length','max'=>1),array('county','length','max'=>3),array('mode_s_code, unique_id','length','max'=>8),array('kit_model','length','max'=>20),array('home_airport','length','max'=>6),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, n_number, serial_number, mfr_mdl_code, eng_mfr_mdl, year_mfr, type_registrant, name, street, street2, city, state, zip_code, region, county, country, last_action_date, cert_issue_date, certification, type_aircraft, type_engine, status_code, mode_s_code, fract_owner, air_worth_date, other_names_1, other_names_2, other_names_3, other_names_4, other_names_5, expiration_date, unique_id, kit_mfr, kit_model, mode_s_code_hex, operator_id, home_airport, cost_per_hour, range','safe','on'=>'search'));
	}
	
	/**
	 *
	 * @return array relational rules.
	 */
	public function relations(){
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('operator_aircraft_ref'=>array(self::HAS_ONE,'OperatorAircraftRef',array('operator_aircraft_id'=>'id'),'order'=>'n_number ASC'));
	}
	
	/**
	 *
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array('id'=>'ID','n_number'=>'N Number','serial_number'=>'Serial Number','mfr_mdl_code'=>'Mfr Mdl Code','eng_mfr_mdl'=>'Eng Mfr Mdl','year_mfr'=>'Year Mfr','type_registrant'=>'Type Registrant','name'=>'Name','street'=>'Street','street2'=>'Street2','city'=>'City','state'=>'State','zip_code'=>'Zip Code','region'=>'Region','county'=>'County','country'=>'Country','last_action_date'=>'Last Action Date','cert_issue_date'=>'Cert Issue Date','certification'=>'Certification','type_aircraft'=>'Type Aircraft','type_engine'=>'Type Engine','status_code'=>'Status Code','mode_s_code'=>'Mode S Code','fract_owner'=>'Fract Owner','air_worth_date'=>'Air Worth Date','other_names_1'=>'Other Names 1','other_names_2'=>'Other Names 2','other_names_3'=>'Other Names 3','other_names_4'=>'Other Names 4','other_names_5'=>'Other Names 5','expiration_date'=>'Expiration Date','unique_id'=>'Unique','kit_mfr'=>'Kit Mfr','kit_model'=>'Kit Model','mode_s_code_hex'=>'Mode S Code Hex','operator_id'=>'Operator','home_airport'=>'Home Airport','cost_per_hour'=>'Operating Cost per Hour','range'=>'Range');
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
		$criteria->compare('operator_id', $this->operator_id);
		$criteria->compare('home_airport', $this->mode_s_code_hex, true);
		$criteria->compare('cost_per_hour', $this->operator_id);
		$criteria->compare('range', $this->operator_id);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 *
	 * @return actions to perform before saving
	 */
	public function beforeSave(){
		if(!empty($this->home_airport)) $this->home_airport = strtoupper($this->home_airport);
		return true;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return OperatorAircraft the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
	
	/*
	 * BEGIN CUSTOM FUNCTIONS
	 */
	public function getFullAircraft($id){
		// removed m.operator_id AS m_operator_id, add back in when changing from FAA master to operator aircraft
		return Yii::app()->db->createCommand()->select('
            m.id AS m_id,
    		m.n_number AS m_n_number,
    		m.serial_number AS m_serial_number,
    		m.mfr_mdl_code AS m_mfr_mdl_code,
    		m.eng_mfr_mdl AS m_eng_mfr_mdl,
    		m.year_mfr AS m_year_mfr,
    		m.type_registrant AS m_type_registrant,
    		m.name AS m_name,
    		m.street AS m_street,
    		m.street2 AS m_street2,
    		m.city AS m_city,
    		m.state AS m_state,
    		m.zip_code AS m_zip_code,
    		m.region AS m_region,
    		m.county AS m_county,
    		m.country AS m_country,
    		m.last_action_date AS m_last_action_date,
    		m.cert_issue_date AS m_cert_issue_date,
    		m.certification AS m_certification,
    		m.type_aircraft AS m_type_aircraft,
    		m.type_engine AS m_type_engine,
    		m.status_code AS m_status_code,
    		m.mode_s_code AS m_mode_s_code,
    		m.fract_owner AS m_fract_owner,
    		m.air_worth_date AS m_air_worth_date,
    		m.other_names_1 AS m_other_names_1,
    		m.other_names_2 AS m_other_names_2,
    		m.other_names_3 AS m_other_names_3,
    		m.other_names_4 AS m_other_names_4,
    		m.other_names_5 AS m_other_names_5,
    		m.expiration_date AS m_expiration_date,
    		m.unique_id AS m_unique_id,
    		m.kit_mfr AS m_kit_mfr,
    		m.kit_model AS m_kit_model,
    		m.mode_s_code_hex AS m_mode_s_code_hex,
    		r.id AS bid_id,
    		r.code AS r_code,
    		r.mfr AS r_mfr,
    		r.model AS r_model,
    		r.type_acft AS r_type_acft,
    		r.type_eng AS r_type_eng,
    		r.ac_cat AS r_ac_cat,
    		r.build_cert_ind AS r_build_cert_ind,
    		r.no_eng AS r_no_eng,
    		r.no_seats AS r_no_seats,
    		r.ac_weight AS r_ac_weight,
    		r.speed AS r_speed,
    		e.id AS e_id,
    		e.code AS e_code,
    		e.mfr AS e_mfr,
    		e.model AS e_model,
    		e.type AS e_type,
    		e.horsepower AS e_horsepower,
    		e.thrust AS e_thrust
            ')->from('FAA_aircraft_master m')->join('FAA_aircraft_ref r', 'm.mfr_mdl_code=r.code')->join('FAA_engine_ref e', 'm.eng_mfr_mdl=e.code')->where('m.id=:id', array(':id'=>$id))->queryRow();
	}
}
