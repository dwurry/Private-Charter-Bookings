<?php

/**
 * This is the model class for table "FAA_engine_ref".
 *
 * The followings are the available columns in table 'FAA_engine_ref':
 * 
 * @property integer $id
 * @property string $e_code
 * @property string $e_mfr
 * @property string $e_model
 * @property integer $type
 * @property integer $horsepower
 * @property integer $thrust
 */
class FAAEngineRef extends CActiveRecord{
	/**
	 *
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'FAA_engine_ref';
	}
	
	/**
	 *
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(array('e_code, e_mfr, e_model, type, horsepower, thrust','required'),array('type, horsepower, thrust','numerical','integerOnly'=>true),array('e_code','length','max'=>5),array('e_mfr','length','max'=>10),array('e_model','length','max'=>13),
				// The following rule is used by search().
				// @todo Please remove those attributes that should not be searched.
				array('id, e_code, e_mfr, e_model, type, horsepower, thrust','safe','on'=>'search'));
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
		return array('id'=>'ID','e_code'=>'Code','e_mfr'=>'Mfr','e_model'=>'Model','type'=>'Type','horsepower'=>'Horsepower','thrust'=>'Thrust');
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
		$criteria->compare('e_code', $this->e_code, true);
		$criteria->compare('e_mfr', $this->e_mfr, true);
		$criteria->compare('e_model', $this->e_model, true);
		$criteria->compare('type', $this->type);
		$criteria->compare('horsepower', $this->horsepower);
		$criteria->compare('thrust', $this->thrust);
		
		return new CActiveDataProvider($this, array('criteria'=>$criteria));
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 *
	 * @param string $className
	 *        active record class name.
	 * @return FAAEngineRef the static model class
	 */
	public static function model($className = __CLASS__){
		return parent::model($className);
	}
}
