<?php
$this->breadcrumbs = array('Op Quote'=>array('index'),'Create');

$this->menu = array(array('label'=>'List OpQuote','url'=>array('index')),array('label'=>'Manage OpQuote','url'=>array('admin')));
?>

<h1>Create OpQuote</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>