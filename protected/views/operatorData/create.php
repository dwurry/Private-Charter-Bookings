<?php
/* @var $this OperatorDataController */
/* @var $model OperatorData */

$this->breadcrumbs = array('Operator Datas'=>array('index'),'Create');

$this->menu = array(array('label'=>'List OperatorData','url'=>array('index')),array('label'=>'Manage OperatorData','url'=>array('admin')));
?>

<h1>Create OperatorData</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>