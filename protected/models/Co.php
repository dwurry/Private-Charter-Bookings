<?php

/**
 * This is the model class for table "operator".
 *
 * The followings are the available columns in table 'operator':
 * 
 * @property integer $id
 * @property string $name
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip
 * @property string $phone
 * @property string $email
 * @property integer $year_est
 * @property integer $fleet
 * @property integer $full_time_pilots
 * @property integer $part_time_pilots
 * @property string $certificate
 * @property string $designator
 * @property string $where_licensed
 * @property string $operated_by
 * @property string $website
 * @property string $source_url
 */
class Co extends CActiveRecord{
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'operator';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('name, street, city, state, country, zip, phone, email, year_est, fleet, full_time_pilots, part_time_pilots, certificate, where_licensed, website, source_url','required'),array('year_est, fleet, full_time_pilots, part_time_pilots','numerical','integerOnly'=>true),array('name, street, email, certificate, where_licensed, operated_by, website','length','max'=>100),array('city, country, phone','length','max'=>50),array('state','length','max'=>2),array('designator','length','max'=>4),array('zip','length','max'=>10),array('source_url','length','max'=>300),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, name, street, city, state, country, zip, phone, email, year_est, fleet, full_time_pilots, part_time_pilots, certificate, designator, where_licensed, operated_by, website, source_url','safe','on'=>'search'));
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
		return array('id'=>'ID','name'=>'Name','street'=>'Street','city'=>'City','state'=>'State','country'=>'Country','zip'=>'Zip','phone'=>'Phone','email'=>'Email','year_est'=>'Year Est','fleet'=>'Fleet','full_time_pilots'=>'Full Time Pilots','part_time_pilots'=>'Part Time Pilots','certificate'=>'Certificate','designator'=>'Designator','where_licensed'=>'Where Licensed','operated_by'=>'Operated By','website'=>'Website','source_url'=>'Source Url');
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
		$criteria->compare('name', $this->name, true);
		$criteria->compare('street', $this->street, true);
		$criteria->compare('city', $this->city, true);
		$criteria->compare('state', $this->state, true);
		$criteria->compare('country', $this->country, true);
		$criteria->compare('zip', $this->zip, true);
		$criteria->compare('phone', $this->phone, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('year_est', $this->year_est);
		$criteria->compare('fleet', $this->fleet);
		$criteria->compare('full_time_pilots', $this->full_time_pilots);
		$criteria->compare('part_time_pilots', $this->part_time_pilots);
		$criteria->compare('certificate', $this->certificate, true);
		$criteria->compare('designator', $this->designator, true);
		$criteria->compare('where_licensed', $this->where_licensed, true);
		$criteria->compare('operated_by', $this->operated_by, true);
		$criteria->compare('website', $this->website, true);
		$criteria->compare('source_url', $this->source_url, true);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return Co the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
