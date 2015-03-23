<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('quote_id')); ?>:</b>
	<?php echo CHtml::encode($data->quote_id); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('operator_id')); ?>:</b>
	<?php echo CHtml::encode($data->operator_id); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('aircraft_id')); ?>:</b>
	<?php echo CHtml::encode($data->aircraft_id); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('one_way_mins')); ?>:</b>
	<?php echo CHtml::encode($data->one_way_mins); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('roundtrip')); ?>:</b>
	<?php echo CHtml::encode($data->roundtrip); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('overnights')); ?>:</b>
	<?php echo CHtml::encode($data->overnights); ?>
	<br />

	<?php
	/*
	 * <b><?php echo CHtml::encode($data->getAttributeLabel('flight_cost')); ?>:</b> <?php echo CHtml::encode($data->flight_cost); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('overnight_fees')); ?>:</b> <?php echo CHtml::encode($data->overnight_fees); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('roundtrip_cost')); ?>:</b> <?php echo CHtml::encode($data->roundtrip_cost); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('total_cost')); ?>:</b> <?php echo CHtml::encode($data->total_cost); ?> <br />
	 */
	?>

</div>