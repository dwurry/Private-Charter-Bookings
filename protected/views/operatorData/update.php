<?php
/* @var $this OperatorDataController */
/* @var $model OperatorData */

$this->breadcrumbs = array('Operator Datas'=>array('index'),$model->operator_id=>array('view','id'=>$model->operator_id),'Update');

$this->menu = array(array('label'=>'List OperatorData','url'=>array('index')),array('label'=>'Create OperatorData','url'=>array('create')),array('label'=>'View OperatorData','url'=>array('view','id'=>$model->operator_id)),array('label'=>'Manage OperatorData','url'=>array('admin')));
?>

<h1>Update OperatorData <?php echo $model->operator_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>