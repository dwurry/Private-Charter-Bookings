<?php
/* @var $this CoController */
/* @var $model Co */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'co-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false));
?>
	<fieldset class="entry">
		<p class="note">
			Fields with <span class="required">*</span> are required.
		</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'country'); ?>
		<?php echo $form->textField($model,'country',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'country'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'zip'); ?>
		<?php echo $form->textField($model,'zip',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'zip'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'year_est'); ?>
		<?php echo $form->textField($model,'year_est'); ?>
		<?php echo $form->error($model,'year_est'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'fleet'); ?>
		<?php echo $form->textField($model,'fleet'); ?>
		<?php echo $form->error($model,'fleet'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'full_time_pilots'); ?>
		<?php echo $form->textField($model,'full_time_pilots'); ?>
		<?php echo $form->error($model,'full_time_pilots'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'part_time_pilots'); ?>
		<?php echo $form->textField($model,'part_time_pilots'); ?>
		<?php echo $form->error($model,'part_time_pilots'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'certificate'); ?>
		<?php echo $form->textField($model,'certificate',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'certificate'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'where_licensed'); ?>
		<?php echo $form->textField($model,'where_licensed',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'where_licensed'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'operated_by'); ?>
		<?php echo $form->textField($model,'operated_by',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'operated_by'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'website'); ?>
		<?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'website'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($model,'source_url'); ?>
		<?php echo $form->textField($model,'source_url',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'source_url'); ?>
	</div>

		<p>&nbsp;</p>
		<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
	</fieldset>
<?php $this->endWidget(); ?>

</div>
<!-- form -->