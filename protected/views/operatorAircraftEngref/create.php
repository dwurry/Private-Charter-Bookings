<?php
/* @var $this OperatorAircraftEngrefController */
/* @var $model OperatorAircraftEngref */

$this->breadcrumbs = array('Operator Aircraft Engrefs'=>array('index'),'Create');

$this->menu = array(array('label'=>'List OperatorAircraftEngref','url'=>array('index')),array('label'=>'Manage OperatorAircraftEngref','url'=>array('admin')));
?>

<h1>Create OperatorAircraftEngref</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>