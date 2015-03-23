<?php
/* @var $this OperatorAircraftEngrefController */
/* @var $data OperatorAircraftEngref */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('mfr')); ?>:</b>
	<?php echo CHtml::encode($data->mfr); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('model')); ?>:</b>
	<?php echo CHtml::encode($data->model); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('horsepower')); ?>:</b>
	<?php echo CHtml::encode($data->horsepower); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('thrust')); ?>:</b>
	<?php echo CHtml::encode($data->thrust); ?>
	<br />

	<?php
	/*
	 * <b><?php echo CHtml::encode($data->getAttributeLabel('operator_aircraft_id')); ?>:</b> <?php echo CHtml::encode($data->operator_aircraft_id); ?> <br />
	 */
	?>

</div>