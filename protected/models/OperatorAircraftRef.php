<?php

/**
 * This is the model class for table "operator_aircraft_ref".
 *
 * The followings are the available columns in table 'operator_aircraft_ref':
 * 
 * @property integer $id
 * @property string $code
 * @property string $mfr
 * @property string $model
 * @property integer $type_acft
 * @property integer $type_eng
 * @property integer $ac_cat
 * @property integer $build_cert_ind
 * @property integer $no_eng
 * @property integer $no_seats
 * @property string $ac_weight
 * @property integer $speed
 * @property string $derating
 * @property integer $operator_aircraft_id
 */
class OperatorAircraftRef extends CActiveRecord{
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'operator_aircraft_ref';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('code, mfr, model, type_acft, type_eng, ac_cat, build_cert_ind, no_eng, no_seats, ac_weight, speed','required'),array('type_acft, type_eng, ac_cat, build_cert_ind, no_eng, no_seats, speed, operator_aircraft_id','numerical','integerOnly'=>true),array('derating','numerical'),array('code, ac_weight','length','max'=>7),array('mfr','length','max'=>30),array('model','length','max'=>20),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, code, mfr, model, type_acft, type_eng, ac_cat, build_cert_ind, no_eng, no_seats, ac_weight, speed, derating, operator_aircraft_id','safe','on'=>'search'));
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
		return array('id'=>'ID','code'=>'Code','mfr'=>'Mfr','model'=>'Model','type_acft'=>'Type Acft','type_eng'=>'Type Eng','ac_cat'=>'Ac Cat','build_cert_ind'=>'Build Cert Ind','no_eng'=>'No Eng','no_seats'=>'No Seats','ac_weight'=>'Ac Weight','speed'=>'Speed','derating'=>'Speed Derating','operator_aircraft_id'=>'Operator Aircraft');
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
		$criteria->compare('code', $this->code, true);
		$criteria->compare('mfr', $this->mfr, true);
		$criteria->compare('model', $this->model, true);
		$criteria->compare('type_acft', $this->type_acft);
		$criteria->compare('type_eng', $this->type_eng);
		$criteria->compare('ac_cat', $this->ac_cat);
		$criteria->compare('build_cert_ind', $this->build_cert_ind);
		$criteria->compare('no_eng', $this->no_eng);
		$criteria->compare('no_seats', $this->no_seats);
		$criteria->compare('ac_weight', $this->ac_weight, true);
		$criteria->compare('speed', $this->speed);
		$criteria->compare('derating', $this->derating);
		$criteria->compare('operator_aircraft_id', $this->operator_aircraft_id);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return OperatorAircraftRef the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
