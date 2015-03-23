<?php
/* @var $this CoController */
/* @var $model Co */

$this->breadcrumbs = array('Cos'=>array('index'),$model->name);

$this->menu = array(array('label'=>'List Co','url'=>array('index')),array('label'=>'Create Co','url'=>array('create')),array('label'=>'Update Co','url'=>array('update','id'=>$model->id)),array('label'=>'Delete Co','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),array('label'=>'Manage Co','url'=>array('admin')));
?>

<h1>View Co #<?php echo $model->id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('id','name','street','city','state','country','zip','phone','email','year_est','fleet','full_time_pilots','part_time_pilots','certificate','where_licensed','operated_by','website','source_url')));
?>
