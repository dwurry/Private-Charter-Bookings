<?php
/* @var $this OperatorAircraftController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Operator Aircrafts');

$this->menu = array(array('label'=>'Create OperatorAircraft','url'=>array('create')),array('label'=>'Manage OperatorAircraft','url'=>array('admin')));
?>

<h1>Operator Aircrafts</h1>

<?php

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>
