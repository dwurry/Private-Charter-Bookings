<?php
/* @var $this OperatorAircraftController */
/* @var $model OperatorAircraft */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php

$form = $this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl($this->route),'method'=>'get'));
?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_number'); ?>
		<?php echo $form->textField($model,'n_number',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_number'); ?>
		<?php echo $form->textField($model,'serial_number',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mfr_mdl_code'); ?>
		<?php echo $form->textField($model,'mfr_mdl_code',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eng_mfr_mdl'); ?>
		<?php echo $form->textField($model,'eng_mfr_mdl',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'year_mfr'); ?>
		<?php echo $form->textField($model,'year_mfr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_registrant'); ?>
		<?php echo $form->textField($model,'type_registrant'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>33,'maxlength'=>33)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'street2'); ?>
		<?php echo $form->textField($model,'street2',array('size'=>33,'maxlength'=>33)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'region'); ?>
		<?php echo $form->textField($model,'region',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'county'); ?>
		<?php echo $form->textField($model,'county',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_action_date'); ?>
		<?php echo $form->textField($model,'last_action_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cert_issue_date'); ?>
		<?php echo $form->textField($model,'cert_issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'certification'); ?>
		<?php echo $form->textField($model,'certification',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_aircraft'); ?>
		<?php echo $form->textField($model,'type_aircraft'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_engine'); ?>
		<?php echo $form->textField($model,'type_engine'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_code'); ?>
		<?php echo $form->textField($model,'status_code',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mode_s_code'); ?>
		<?php echo $form->textField($model,'mode_s_code',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fract_owner'); ?>
		<?php echo $form->textField($model,'fract_owner',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'air_worth_date'); ?>
		<?php echo $form->textField($model,'air_worth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_names_1'); ?>
		<?php echo $form->textField($model,'other_names_1',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_names_2'); ?>
		<?php echo $form->textField($model,'other_names_2',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_names_3'); ?>
		<?php echo $form->textField($model,'other_names_3',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_names_4'); ?>
		<?php echo $form->textField($model,'other_names_4',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'other_names_5'); ?>
		<?php echo $form->textField($model,'other_names_5',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expiration_date'); ?>
		<?php echo $form->textField($model,'expiration_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unique_id'); ?>
		<?php echo $form->textField($model,'unique_id',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kit_mfr'); ?>
		<?php echo $form->textField($model,'kit_mfr',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'kit_model'); ?>
		<?php echo $form->textField($model,'kit_model',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mode_s_code_hex'); ?>
		<?php echo $form->textField($model,'mode_s_code_hex',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->