<?php
/* @var $this QuoteController */
/* @var $data Quote */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('dep_arp')); ?>:</b>
	<?php echo CHtml::encode($data->dep_arp); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('arr_arp')); ?>:</b>
	<?php echo CHtml::encode($data->arr_arp); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('num_trav')); ?>:</b>
	<?php echo CHtml::encode($data->num_trav); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('dep_time')); ?>:</b>
	<?php echo CHtml::encode($data->dep_time); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('cust_id')); ?>:</b>
	<?php echo CHtml::encode($data->cust_id); ?>
	<br />
</div>