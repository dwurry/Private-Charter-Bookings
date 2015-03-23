<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Admin');
?>

<h1>Administration</h1>

<p><?php echo CHtml::link('Manage Users',array('user/index')); ?></p>
<p><?php echo CHtml::link('Manage Operators',array('operator/index')); ?></p>
<p><?php echo CHtml::link('Manage Operator Aircraft',array('operatorAircraft/index')); ?></p>
<p><?php echo CHtml::link('Manage Operator Data',array('operatorData/index')); ?></p>
<p><?php echo CHtml::link('Manage Airports',array('airport/index')); ?></p>
<p><?php echo CHtml::link('Manage Quotes',array('quote/index')); ?></p>
<p><?php echo CHtml::link('Manage eMail Templates',array('templates/index')); ?></p>
<p><?php echo CHtml::link('View Activity Log',array('admin/logInfo')); ?></p>
<p><?php echo CHtml::link('View Stats',array('admin/stats')); ?></p>