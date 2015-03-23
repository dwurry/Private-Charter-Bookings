<?php
/* @var $this FAAAircraftRefController */
/* @var $data FAAAircraftRef */
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
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('type_acft')); ?>:</b>
	<?php echo CHtml::encode($data->type_acft); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('type_eng')); ?>:</b>
	<?php echo CHtml::encode($data->type_eng); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('ac_cat')); ?>:</b>
	<?php echo CHtml::encode($data->ac_cat); ?>
	<br />

	<?php
	/*
	 * <b><?php echo CHtml::encode($data->getAttributeLabel('build_cert_ind')); ?>:</b> <?php echo CHtml::encode($data->build_cert_ind); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('no_eng')); ?>:</b> <?php echo CHtml::encode($data->no_eng); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('no_seats')); ?>:</b> <?php echo CHtml::encode($data->no_seats); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('ac_weight')); ?>:</b> <?php echo CHtml::encode($data->ac_weight); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('speed')); ?>:</b> <?php echo CHtml::encode($data->speed); ?> <br />
	 */
	?>

</div>