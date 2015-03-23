<?php
/* @var $this OperatorAircraftEngrefController */
/* @var $model OperatorAircraftEngref */

$this->breadcrumbs = array('Operator Aircraft Engrefs'=>array('index'),$model->id);

$this->menu = array(array('label'=>'List OperatorAircraftEngref','url'=>array('index')),array('label'=>'Create OperatorAircraftEngref','url'=>array('create')),array('label'=>'Update OperatorAircraftEngref','url'=>array('update','id'=>$model->id)),array('label'=>'Delete OperatorAircraftEngref','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),array('label'=>'Manage OperatorAircraftEngref','url'=>array('admin')));
?>

<h1>View OperatorAircraftEngref #<?php echo $model->id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('id','code','mfr','model','type','horsepower','thrust','operator_aircraft_id')));
?>
