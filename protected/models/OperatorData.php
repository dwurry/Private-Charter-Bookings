<?php

/**
 * This is the model class for table "operator_data".
 *
 * The followings are the available columns in table 'operator_data':
 * 
 * @property integer $operator_id
 * @property string $default_margin
 * @property string $default_route_buffer
 * @property string $overnight_fee
 */
class OperatorData extends CActiveRecord{
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'operator_data';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('default_margin, default_route_buffer, overnight_fee','required'),array('operator_id','numerical','integerOnly'=>true),array('default_margin, default_route_buffer, overnight_fee','numerical'),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('operator_id, default_margin, default_route_buffer, overnight_fee','safe','on'=>'search'));
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
		return array('operator_id'=>'Operator','default_margin'=>'Default Margin, Percentage','default_route_buffer'=>'Default Route Buffer, Percentage','overnight_fee'=>'Overnight Fee');
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
		
		$criteria->compare('operator_id', $this->operator_id);
		$criteria->compare('default_margin', $this->default_margin, true);
		$criteria->compare('default_route_buffer', $this->default_route_buffer, true);
		$criteria->compare('overnight_fee', $this->overnight_fee, true);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return OperatorData the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
