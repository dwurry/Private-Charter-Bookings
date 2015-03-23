<?php
/* @var $this FAAAircraftMasterController */
/* @var $model FAAAircraftMaster */

$this->breadcrumbs = array('Faaaircraft Masters'=>array('index'),'Create');

$this->menu = array(array('label'=>'List FAAAircraftMaster','url'=>array('index')),array('label'=>'Manage FAAAircraftMaster','url'=>array('admin')));
?>

<h1>Create FAAAircraftMaster</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>