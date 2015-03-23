<?php
/* @var $this OperatorAircraftEngrefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Operator Aircraft Engrefs');

$this->menu = array(array('label'=>'Create OperatorAircraftEngref','url'=>array('create')),array('label'=>'Manage OperatorAircraftEngref','url'=>array('admin')));
?>

<h1>Operator Aircraft Engrefs</h1>

<?php

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>
