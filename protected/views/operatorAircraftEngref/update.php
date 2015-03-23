<?php
/* @var $this OperatorAircraftEngrefController */
/* @var $model OperatorAircraftEngref */

$this->breadcrumbs = array('Operator Aircraft Engrefs'=>array('index'),$model->id=>array('view','id'=>$model->id),'Update');

$this->menu = array(array('label'=>'List OperatorAircraftEngref','url'=>array('index')),array('label'=>'Create OperatorAircraftEngref','url'=>array('create')),array('label'=>'View OperatorAircraftEngref','url'=>array('view','id'=>$model->id)),array('label'=>'Manage OperatorAircraftEngref','url'=>array('admin')));
?>

<h1>Update OperatorAircraftEngref <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>