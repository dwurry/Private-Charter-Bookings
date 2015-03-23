<?php
/* @var $this FAAEngineRefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Faaengine Refs');

$this->menu = array(array('label'=>'Create FAAEngineRef','url'=>array('create')),array('label'=>'Manage FAAEngineRef','url'=>array('admin')));
?>

<h1>Faaengine Refs</h1>

<?php

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>
