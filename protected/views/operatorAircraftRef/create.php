<?php
/* @var $this OperatorAircraftRefController */
/* @var $model OperatorAircraftRef */

$this->breadcrumbs = array('Operator Aircraft Refs'=>array('index'),'Create');

$this->menu = array(array('label'=>'List OperatorAircraftRef','url'=>array('index')),array('label'=>'Manage OperatorAircraftRef','url'=>array('admin')));
?>

<h1>Create OperatorAircraftRef</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>