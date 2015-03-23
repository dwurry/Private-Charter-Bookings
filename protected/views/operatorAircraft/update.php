<?php
/* @var $this OperatorAircraftController */
/* @var $model OperatorAircraft */

$this->breadcrumbs = array('Operator Aircrafts'=>array('index'),$model->name=>array('view','id'=>$model->id),'Update');

$this->menu = array(array('label'=>'List OperatorAircraft','url'=>array('index')),array('label'=>'Create OperatorAircraft','url'=>array('create')),array('label'=>'View OperatorAircraft','url'=>array('view','id'=>$model->id)),array('label'=>'Manage OperatorAircraft','url'=>array('admin')));
?>

<h1>Update OperatorAircraft <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>