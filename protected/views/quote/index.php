<?php
/* @var $this QuoteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Quotes');

$this->menu = array(array('label'=>'Create Quote','url'=>array('create')),array('label'=>'Manage Quote','url'=>array('admin')));
?>

<h1>Proposals</h1>

<?php

$this->widget('zii.widgets.CListView', array('proposals'=>$proposals,'itemView'=>'_view'));
?>

<h1>Trips</h1>

<?php

$this->widget('zii.widgets.CListView', array('trips'=>$trips,'itemView'=>'_view'));
?>

<h1>History</h1>

<?php

$this->widget('zii.widgets.CListView', array('history'=>$history,'itemView'=>'_view'));
?>
