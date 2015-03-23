<?php
/* @var $this FAAEngineRefController */
/* @var $model FAAEngineRef */

$this->breadcrumbs = array('Faaengine Refs'=>array('index'),'Create');

$this->menu = array(array('label'=>'List FAAEngineRef','url'=>array('index')),array('label'=>'Manage FAAEngineRef','url'=>array('admin')));
?>

<h1>Create FAAEngineRef</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>