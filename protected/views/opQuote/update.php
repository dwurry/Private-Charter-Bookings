<?php
$this->breadcrumbs = array('Op Quote Details'=>array('index'),$model->id=>array('view','id'=>$model->id),'Update');

$this->menu = array(array('label'=>'List OpQuote','url'=>array('index')),array('label'=>'Create OpQuote','url'=>array('create')),array('label'=>'View OpQuote','url'=>array('view','id'=>$model->id)),array('label'=>'Manage OpQuote','url'=>array('admin')));
?>

<h1>Update OpQuote <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>