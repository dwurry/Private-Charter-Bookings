<?php
/* @var $this OperatorController */
/* @var $data Operator */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b>
	<?php echo CHtml::encode($data->street); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b>
	<?php echo CHtml::encode($data->zip); ?>
	<br />

	<?php
	/*
	 * <b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b> <?php echo CHtml::encode($data->phone); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b> <?php echo CHtml::encode($data->email); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('year_est')); ?>:</b> <?php echo CHtml::encode($data->year_est); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('fleet')); ?>:</b> <?php echo CHtml::encode($data->fleet); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('full_time_pilots')); ?>:</b> <?php echo CHtml::encode($data->full_time_pilots); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('part_time_pilots')); ?>:</b> <?php echo CHtml::encode($data->part_time_pilots); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('certificate')); ?>:</b> <?php echo CHtml::encode($data->certificate); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('where_licensed')); ?>:</b> <?php echo CHtml::encode($data->where_licensed); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('operated_by')); ?>:</b> <?php echo CHtml::encode($data->operated_by); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b> <?php echo CHtml::encode($data->website); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('source_url')); ?>:</b> <?php echo CHtml::encode($data->source_url); ?> <br />
	 */
	?>

</div>