<?php
/* @var $this OperatorDataController */
/* @var $data OperatorData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->operator_id), array('view', 'id'=>$data->operator_id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('default_margin')); ?>:</b>
	<?php echo CHtml::encode($data->default_margin); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('default_route_buffer')); ?>:</b>
	<?php echo CHtml::encode($data->default_route_buffer); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('overnight_fee')); ?>:</b>
	<?php echo CHtml::encode($data->overnight_fee); ?>
	<br />


</div>