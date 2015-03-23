<?php
/* @var $this CoController */
/* @var $model Co */

$this->breadcrumbs = array('Cos'=>array('index'),'Create');

$this->menu = array(array('label'=>'List Co','url'=>array('index')),array('label'=>'Manage Co','url'=>array('admin')));
?>

<h1>Create Co</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>