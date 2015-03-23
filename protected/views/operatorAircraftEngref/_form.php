<?php
/* @var $this OperatorAircraftEngrefController */
/* @var $model OperatorAircraftEngref */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'operator-aircraft-engref-form',
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
		<?php echo $form->textField($model,'code',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mfr'); ?>
		<?php echo $form->textField($model,'mfr',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'mfr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>13,'maxlength'=>13)); ?>
		<?php echo $form->error($model,'model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'horsepower'); ?>
		<?php echo $form->textField($model,'horsepower'); ?>
		<?php echo $form->error($model,'horsepower'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'thrust'); ?>
		<?php echo $form->textField($model,'thrust'); ?>
		<?php echo $form->error($model,'thrust'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operator_aircraft_id'); ?>
		<?php echo $form->textField($model,'operator_aircraft_id'); ?>
		<?php echo $form->error($model,'operator_aircraft_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->