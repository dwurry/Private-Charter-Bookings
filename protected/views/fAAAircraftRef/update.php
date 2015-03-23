<?php
/* @var $this FAAAircraftRefController */
/* @var $model FAAAircraftRef */

$this->breadcrumbs = array('Faaaircraft Refs'=>array('index'),$model->id=>array('view','id'=>$model->id),'Update');

$this->menu = array(array('label'=>'List FAAAircraftRef','url'=>array('index')),array('label'=>'Create FAAAircraftRef','url'=>array('create')),array('label'=>'View FAAAircraftRef','url'=>array('view','id'=>$model->id)),array('label'=>'Manage FAAAircraftRef','url'=>array('admin')));
?>

<h1>Update FAAAircraftRef <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>