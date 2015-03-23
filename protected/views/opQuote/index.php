<?php
$this->breadcrumbs = array('Op Quote Details');

$this->menu = array(array('label'=>'Create OpQuote','url'=>array('create')),array('label'=>'Manage OpQuote','url'=>array('admin')));
?>

<h1>Op Quote Details</h1>

<?php

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>
