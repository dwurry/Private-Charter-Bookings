<?php
/* @var $this OperatorAircraftController */
/* @var $model OperatorAircraft */

$this->breadcrumbs = array('Operator Aircrafts'=>array('index'),'Create');

$this->menu = array(array('label'=>'List OperatorAircraft','url'=>array('index')),array('label'=>'Manage OperatorAircraft','url'=>array('admin')));
?>

<h1>Create OperatorAircraft</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>