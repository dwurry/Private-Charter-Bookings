<?php
/* @var $this OperatorAircraftRefController */
/* @var $model OperatorAircraftRef */

$this->breadcrumbs = array('Operator Aircraft Refs'=>array('index'),$model->id=>array('view','id'=>$model->id),'Update');

$this->menu = array(array('label'=>'List OperatorAircraftRef','url'=>array('index')),array('label'=>'Create OperatorAircraftRef','url'=>array('create')),array('label'=>'View OperatorAircraftRef','url'=>array('view','id'=>$model->id)),array('label'=>'Manage OperatorAircraftRef','url'=>array('admin')));
?>

<h1>Update OperatorAircraftRef <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>