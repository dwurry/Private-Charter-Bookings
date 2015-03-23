<?php
/* @var $this FAAAircraftMasterController */
/* @var $model FAAAircraftMaster */

$this->breadcrumbs = array('Faaaircraft Masters'=>array('index'),$model->name);

$this->menu = array(array('label'=>'List FAAAircraftMaster','url'=>array('index')),array('label'=>'Create FAAAircraftMaster','url'=>array('create')),array('label'=>'Update FAAAircraftMaster','url'=>array('update','id'=>$model->id)),array('label'=>'Delete FAAAircraftMaster','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),array('label'=>'Manage FAAAircraftMaster','url'=>array('admin')));
?>

<h1>View FAAAircraftMaster #<?php echo $model->id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('id','n_number','serial_number','mfr_mdl_code','eng_mfr_mdl','year_mfr','type_registrant','name','street','street2','city','state','zip_code','region','county','country','last_action_date','cert_issue_date','certification','type_aircraft','type_engine','status_code','mode_s_code','fract_owner','air_worth_date','other_names_1','other_names_2','other_names_3','other_names_4','other_names_5','expiration_date','unique_id','kit_mfr','kit_model','mode_s_code_hex')));
?>
