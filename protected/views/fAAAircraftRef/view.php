<?php
/* @var $this FAAAircraftRefController */
/* @var $model FAAAircraftRef */

$this->breadcrumbs = array('Faaaircraft Refs'=>array('index'),$model->id);

$this->menu = array(array('label'=>'List FAAAircraftRef','url'=>array('index')),array('label'=>'Create FAAAircraftRef','url'=>array('create')),array('label'=>'Update FAAAircraftRef','url'=>array('update','id'=>$model->id)),array('label'=>'Delete FAAAircraftRef','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),array('label'=>'Manage FAAAircraftRef','url'=>array('admin')));
?>

<h1>View FAAAircraftRef #<?php echo $model->id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('id','code','mfr','model','type_acft','type_eng','ac_cat','build_cert_ind','no_eng','no_seats','ac_weight','speed')));
?>
