<?php
/* @var $this FAAAircraftMasterController */
/* @var $data FAAAircraftMaster */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('n_number')); ?>:</b>
	<?php echo CHtml::encode($data->n_number); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('serial_number')); ?>:</b>
	<?php echo CHtml::encode($data->serial_number); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('mfr_mdl_code')); ?>:</b>
	<?php echo CHtml::encode($data->mfr_mdl_code); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('eng_mfr_mdl')); ?>:</b>
	<?php echo CHtml::encode($data->eng_mfr_mdl); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('year_mfr')); ?>:</b>
	<?php echo CHtml::encode($data->year_mfr); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('type_registrant')); ?>:</b>
	<?php echo CHtml::encode($data->type_registrant); ?>
	<br />

	<?php
	/*
	 * <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b> <?php echo CHtml::encode($data->name); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b> <?php echo CHtml::encode($data->street); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('street2')); ?>:</b> <?php echo CHtml::encode($data->street2); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b> <?php echo CHtml::encode($data->city); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b> <?php echo CHtml::encode($data->state); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('zip_code')); ?>:</b> <?php echo CHtml::encode($data->zip_code); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('region')); ?>:</b> <?php echo CHtml::encode($data->region); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('county')); ?>:</b> <?php echo CHtml::encode($data->county); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b> <?php echo CHtml::encode($data->country); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('last_action_date')); ?>:</b> <?php echo CHtml::encode($data->last_action_date); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('cert_issue_date')); ?>:</b> <?php echo CHtml::encode($data->cert_issue_date); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('certification')); ?>:</b> <?php echo CHtml::encode($data->certification); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('type_aircraft')); ?>:</b> <?php echo CHtml::encode($data->type_aircraft); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('type_engine')); ?>:</b> <?php echo CHtml::encode($data->type_engine); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('status_code')); ?>:</b> <?php echo CHtml::encode($data->status_code); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('mode_s_code')); ?>:</b> <?php echo CHtml::encode($data->mode_s_code); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('fract_owner')); ?>:</b> <?php echo CHtml::encode($data->fract_owner); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('air_worth_date')); ?>:</b> <?php echo CHtml::encode($data->air_worth_date); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('other_names_1')); ?>:</b> <?php echo CHtml::encode($data->other_names_1); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('other_names_2')); ?>:</b> <?php echo CHtml::encode($data->other_names_2); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('other_names_3')); ?>:</b> <?php echo CHtml::encode($data->other_names_3); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('other_names_4')); ?>:</b> <?php echo CHtml::encode($data->other_names_4); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('other_names_5')); ?>:</b> <?php echo CHtml::encode($data->other_names_5); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('expiration_date')); ?>:</b> <?php echo CHtml::encode($data->expiration_date); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('unique_id')); ?>:</b> <?php echo CHtml::encode($data->unique_id); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('kit_mfr')); ?>:</b> <?php echo CHtml::encode($data->kit_mfr); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('kit_model')); ?>:</b> <?php echo CHtml::encode($data->kit_model); ?> <br /> <b><?php echo CHtml::encode($data->getAttributeLabel('mode_s_code_hex')); ?>:</b> <?php echo CHtml::encode($data->mode_s_code_hex); ?> <br />
	 */
	?>

</div>