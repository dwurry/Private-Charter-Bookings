<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('fname')); ?>:</b>
	<?php echo CHtml::encode($data->fname); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('lname')); ?>:</b>
	<?php echo CHtml::encode($data->lname); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('auth_level')); ?>:</b>
	<?php echo CHtml::encode($data->auth_level); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<?php
	/*
	 * <b><?php echo CHtml::encode($data->getAttributeLabel('company')); ?>:</b> <?php echo CHtml::encode($data->company); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('charter_num')); ?>:</b> <?php echo CHtml::encode($data->charter_num); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b> <?php echo CHtml::encode($data->street); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b> <?php echo CHtml::encode($data->city); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b> <?php echo CHtml::encode($data->state); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('zip')); ?>:</b> <?php echo CHtml::encode($data->zip); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b> <?php echo CHtml::encode($data->phone); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b> <?php echo CHtml::encode($data->operator_id); ?> <br />
	 */
	?>

</div>