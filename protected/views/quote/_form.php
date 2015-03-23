<?php
/* @var $this QuoteController */
/* @var $model Quote */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'quote-form',
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
		<?php echo $form->labelEx($model,'dep_arp'); ?>
		<?php echo $form->textField($model,'dep_arp',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'dep_arp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'arr_arp'); ?>
		<?php echo $form->textField($model,'arr_arp',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'arr_arp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_trav'); ?>
		<?php echo $form->textField($model,'num_trav'); ?>
		<?php echo $form->error($model,'num_trav'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dep_time'); ?>
		<?php echo $form->textField($model,'dep_time'); ?>
		<?php echo $form->error($model,'dep_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cust_id'); ?>
		<?php echo $form->textField($model,'cust_id'); ?>
		<?php echo $form->error($model,'cust_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->