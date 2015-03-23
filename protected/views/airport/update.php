<?php
/* @var $this AirportController */
/* @var $model Airport */

$this->breadcrumbs = array('Airports'=>array('index'),$model->id=>array('view','id'=>$model->id),'Update');

$this->menu = array(array('label'=>'List Airport','url'=>array('index')),array('label'=>'Create Airport','url'=>array('create')),array('label'=>'View Airport','url'=>array('view','id'=>$model->id)),array('label'=>'Manage Airport','url'=>array('admin')));
?>

<h1>Update Airport <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>