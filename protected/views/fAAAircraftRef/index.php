<?php
/* @var $this FAAAircraftRefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Faaaircraft Refs');

$this->menu = array(array('label'=>'Create FAAAircraftRef','url'=>array('create')),array('label'=>'Manage FAAAircraftRef','url'=>array('admin')));
?>

<h1>Faaaircraft Refs</h1>

<?php

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>
