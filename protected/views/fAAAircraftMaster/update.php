<?php
/* @var $this FAAAircraftMasterController */
/* @var $model FAAAircraftMaster */

$this->breadcrumbs = array('Faaaircraft Masters'=>array('index'),$model->name=>array('view','id'=>$model->id),'Update');

$this->menu = array(array('label'=>'List FAAAircraftMaster','url'=>array('index')),array('label'=>'Create FAAAircraftMaster','url'=>array('create')),array('label'=>'View FAAAircraftMaster','url'=>array('view','id'=>$model->id)),array('label'=>'Manage FAAAircraftMaster','url'=>array('admin')));
?>

<h1>Update FAAAircraftMaster <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>