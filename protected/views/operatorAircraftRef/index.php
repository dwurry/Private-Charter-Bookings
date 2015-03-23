<?php
/* @var $this OperatorAircraftRefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Operator Aircraft Refs');

$this->menu = array(array('label'=>'Create OperatorAircraftRef','url'=>array('create')),array('label'=>'Manage OperatorAircraftRef','url'=>array('admin')));
?>

<h1>Operator Aircraft Refs</h1>

<?php

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>
