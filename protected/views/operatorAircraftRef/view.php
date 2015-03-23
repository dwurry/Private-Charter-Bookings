<?php
/* @var $this OperatorAircraftRefController */
/* @var $model OperatorAircraftRef */

$this->breadcrumbs = array('Operator Aircraft Refs'=>array('index'),$model->id);

$this->menu = array(array('label'=>'List OperatorAircraftRef','url'=>array('index')),array('label'=>'Create OperatorAircraftRef','url'=>array('create')),array('label'=>'Update OperatorAircraftRef','url'=>array('update','id'=>$model->id)),array('label'=>'Delete OperatorAircraftRef','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),array('label'=>'Manage OperatorAircraftRef','url'=>array('admin')));
?>

<h1>View OperatorAircraftRef #<?php echo $model->id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('id','code','mfr','model','type_acft','type_eng','ac_cat','build_cert_ind','no_eng','no_seats','ac_weight','speed','operator_aircraft_id')));
?>
