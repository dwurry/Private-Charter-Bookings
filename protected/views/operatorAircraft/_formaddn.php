<?php
/* @var $this OperatorAircraftController */
/* @var $model OperatorAircraft */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'operator-aircraft-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false));
?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'n_number'); ?>
		<?php echo $form->textField($model,'n_number',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'n_number'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Home Airport', 'home_airport'); ?>
		<?php echo CHtml::textField('home_airport'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Cost Per Hour', 'cost_per_hour'); ?>
		<?php echo CHtml::textField('cost_per_hour'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Range', 'range'); ?>
		<?php echo CHtml::textField('range'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'no_seats'); ?>
		<?php echo $form->textField($modelref,'no_seats'); ?>
		<?php echo $form->error($modelref,'no_seats'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'speed'); ?>
		<?php echo $form->textField($modelref,'speed'); ?>
		<?php echo $form->error($modelref,'speed'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Derating (75% = .75)', 'derating'); ?>
		<?php echo CHtml::textField('derating'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serial_number'); ?>
		<?php echo $form->textField($model,'serial_number',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'serial_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mfr_mdl_code'); ?>
		<?php echo $form->textField($model,'mfr_mdl_code',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'mfr_mdl_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eng_mfr_mdl'); ?>
		<?php echo $form->textField($model,'eng_mfr_mdl',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'eng_mfr_mdl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year_mfr'); ?>
		<?php echo $form->textField($model,'year_mfr'); ?>
		<?php echo $form->error($model,'year_mfr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_registrant'); ?>
		<?php echo $form->textField($model,'type_registrant'); ?>
		<?php echo $form->error($model,'type_registrant'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>33,'maxlength'=>33)); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street2'); ?>
		<?php echo $form->textField($model,'street2',array('size'=>33,'maxlength'=>33)); ?>
		<?php echo $form->error($model,'street2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->textField($model,'region',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'county'); ?>
		<?php echo $form->textField($model,'county',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'county'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_action_date'); ?>
		<?php echo $form->textField($model,'last_action_date'); ?>
		<?php echo $form->error($model,'last_action_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cert_issue_date'); ?>
		<?php echo $form->textField($model,'cert_issue_date'); ?>
		<?php echo $form->error($model,'cert_issue_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'certification'); ?>
		<?php echo $form->textField($model,'certification',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'certification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_aircraft'); ?>
		<?php echo $form->textField($model,'type_aircraft'); ?>
		<?php echo $form->error($model,'type_aircraft'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_engine'); ?>
		<?php echo $form->textField($model,'type_engine'); ?>
		<?php echo $form->error($model,'type_engine'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_code'); ?>
		<?php echo $form->textField($model,'status_code',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'status_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mode_s_code'); ?>
		<?php echo $form->textField($model,'mode_s_code',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'mode_s_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fract_owner'); ?>
		<?php echo $form->textField($model,'fract_owner',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'fract_owner'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'air_worth_date'); ?>
		<?php echo $form->textField($model,'air_worth_date'); ?>
		<?php echo $form->error($model,'air_worth_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_names_1'); ?>
		<?php echo $form->textField($model,'other_names_1',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'other_names_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_names_2'); ?>
		<?php echo $form->textField($model,'other_names_2',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'other_names_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_names_3'); ?>
		<?php echo $form->textField($model,'other_names_3',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'other_names_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_names_4'); ?>
		<?php echo $form->textField($model,'other_names_4',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'other_names_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'other_names_5'); ?>
		<?php echo $form->textField($model,'other_names_5',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'other_names_5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'expiration_date'); ?>
		<?php echo $form->textField($model,'expiration_date'); ?>
		<?php echo $form->error($model,'expiration_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unique_id'); ?>
		<?php echo $form->textField($model,'unique_id',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'unique_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kit_mfr'); ?>
		<?php echo $form->textField($model,'kit_mfr',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'kit_mfr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'kit_model'); ?>
		<?php echo $form->textField($model,'kit_model',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'kit_model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mode_s_code_hex'); ?>
		<?php echo $form->textField($model,'mode_s_code_hex',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'mode_s_code_hex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'code'); ?>
		<?php echo $form->textField($modelref,'code',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($modelref,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'mfr'); ?>
		<?php echo $form->textField($modelref,'mfr',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($modelref,'mfr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'model'); ?>
		<?php echo $form->textField($modelref,'model',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($modelref,'model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'type_acft'); ?>
		<?php echo $form->textField($modelref,'type_acft'); ?>
		<?php echo $form->error($modelref,'type_acft'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'type_eng'); ?>
		<?php echo $form->textField($modelref,'type_eng'); ?>
		<?php echo $form->error($modelref,'type_eng'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'ac_cat'); ?>
		<?php echo $form->textField($modelref,'ac_cat'); ?>
		<?php echo $form->error($modelref,'ac_cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'build_cert_ind'); ?>
		<?php echo $form->textField($modelref,'build_cert_ind'); ?>
		<?php echo $form->error($modelref,'build_cert_ind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'no_eng'); ?>
		<?php echo $form->textField($modelref,'no_eng'); ?>
		<?php echo $form->error($modelref,'no_eng'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelref,'ac_weight'); ?>
		<?php echo $form->textField($modelref,'ac_weight',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($modelref,'ac_weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modeleng,'e_code'); ?>
		<?php echo $form->textField($modeleng,'e_code',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($modeleng,'e_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modeleng,'e_mfr'); ?>
		<?php echo $form->textField($modeleng,'e_mfr',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($modeleng,'e_mfr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modeleng,'e_model'); ?>
		<?php echo $form->textField($modeleng,'e_model',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($modeleng,'e_model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modeleng,'type'); ?>
		<?php echo $form->textField($modeleng,'type'); ?>
		<?php echo $form->error($modeleng,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modeleng,'horsepower'); ?>
		<?php echo $form->textField($modeleng,'horsepower'); ?>
		<?php echo $form->error($modeleng,'horsepower'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modeleng,'thrust'); ?>
		<?php echo $form->textField($modeleng,'thrust'); ?>
		<?php echo $form->error($modeleng,'thrust'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Add'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->