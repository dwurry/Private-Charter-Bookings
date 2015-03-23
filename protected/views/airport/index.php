<?php
/* @var $this AirportController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Airports');

$this->menu = array(array('label'=>'Create Airport','url'=>array('create')),array('label'=>'Manage Airport','url'=>array('admin')));
?>

<h1>Airports</h1>

<?php

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>
