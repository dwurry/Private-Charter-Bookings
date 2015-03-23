<?php
/* @var $this OperatorDataController */
/* @var $model OperatorData */

$this->breadcrumbs = array('Operator Datas'=>array('index'),$model->operator_id);

$this->menu = array(array('label'=>'List OperatorData','url'=>array('index')),array('label'=>'Create OperatorData','url'=>array('create')),array('label'=>'Update OperatorData','url'=>array('update','id'=>$model->operator_id)),array('label'=>'Delete OperatorData','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->operator_id),'confirm'=>'Are you sure you want to delete this item?')),array('label'=>'Manage OperatorData','url'=>array('admin')));
?>

<h1>View OperatorData #<?php echo $model->operator_id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('operator_id','default_margin','default_route_buffer','overnight_fee')));
?>
