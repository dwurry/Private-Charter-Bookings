<?php
/* @var $this FAAAircraftRefController */
/* @var $model FAAAircraftRef */

$this->breadcrumbs = array('Faaaircraft Refs'=>array('index'),'Create');

$this->menu = array(array('label'=>'List FAAAircraftRef','url'=>array('index')),array('label'=>'Manage FAAAircraftRef','url'=>array('admin')));
?>

<h1>Create FAAAircraftRef</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>