<?php
/* @var $this OperatorDataController */
/* @var $model OperatorData */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'operator-data-form',
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
		<?php echo $form->labelEx($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id'); ?>
		<?php echo $form->error($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_margin'); ?>
		<?php echo $form->textField($model,'default_margin',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'default_margin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_route_buffer'); ?>
		<?php echo $form->textField($model,'default_route_buffer',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'default_route_buffer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'overnight_fee'); ?>
		<?php echo $form->textField($model,'overnight_fee',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'overnight_fee'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->