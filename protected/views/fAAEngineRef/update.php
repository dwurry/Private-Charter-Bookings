<?php
/* @var $this FAAEngineRefController */
/* @var $model FAAEngineRef */

$this->breadcrumbs = array('Faaengine Refs'=>array('index'),$model->id=>array('view','id'=>$model->id),'Update');

$this->menu = array(array('label'=>'List FAAEngineRef','url'=>array('index')),array('label'=>'Create FAAEngineRef','url'=>array('create')),array('label'=>'View FAAEngineRef','url'=>array('view','id'=>$model->id)),array('label'=>'Manage FAAEngineRef','url'=>array('admin')));
?>

<h1>Update FAAEngineRef <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>