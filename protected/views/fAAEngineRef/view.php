<?php
/* @var $this FAAEngineRefController */
/* @var $model FAAEngineRef */

$this->breadcrumbs = array('Faaengine Refs'=>array('index'),$model->id);

$this->menu = array(array('label'=>'List FAAEngineRef','url'=>array('index')),array('label'=>'Create FAAEngineRef','url'=>array('create')),array('label'=>'Update FAAEngineRef','url'=>array('update','id'=>$model->id)),array('label'=>'Delete FAAEngineRef','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),array('label'=>'Manage FAAEngineRef','url'=>array('admin')));
?>

<h1>View FAAEngineRef #<?php echo $model->id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('id','code','mfr','model','type','horsepower','thrust')));
?>
