<?php
/* @var $this OperatorDataController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Operator Datas');

$this->menu = array(array('label'=>'Create OperatorData','url'=>array('create')),array('label'=>'Manage OperatorData','url'=>array('admin')));
?>

<h1>Operator Datas</h1>

<?php

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>
