<?php
/* @var $this FAAAircraftRefController */
/* @var $model FAAAircraftRef */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'faaaircraft-ref-form',
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
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mfr'); ?>
		<?php echo $form->textField($model,'mfr',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'mfr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_acft'); ?>
		<?php echo $form->textField($model,'type_acft'); ?>
		<?php echo $form->error($model,'type_acft'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type_eng'); ?>
		<?php echo $form->textField($model,'type_eng'); ?>
		<?php echo $form->error($model,'type_eng'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ac_cat'); ?>
		<?php echo $form->textField($model,'ac_cat'); ?>
		<?php echo $form->error($model,'ac_cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'build_cert_ind'); ?>
		<?php echo $form->textField($model,'build_cert_ind'); ?>
		<?php echo $form->error($model,'build_cert_ind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_eng'); ?>
		<?php echo $form->textField($model,'no_eng'); ?>
		<?php echo $form->error($model,'no_eng'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'no_seats'); ?>
		<?php echo $form->textField($model,'no_seats'); ?>
		<?php echo $form->error($model,'no_seats'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ac_weight'); ?>
		<?php echo $form->textField($model,'ac_weight',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'ac_weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'speed'); ?>
		<?php echo $form->textField($model,'speed'); ?>
		<?php echo $form->error($model,'speed'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->