<?php
/* @var $this FAAAircraftMasterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Faaaircraft Masters');

$this->menu = array(array('label'=>'Create FAAAircraftMaster','url'=>array('create')),array('label'=>'Manage FAAAircraftMaster','url'=>array('admin')));
?>

<h1>Faaaircraft Masters</h1>

<?php

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>
