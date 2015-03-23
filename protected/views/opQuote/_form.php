<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'op-quote-form',
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
		<?php echo $form->labelEx($model,'quote_id'); ?>
		<?php echo $form->textField($model,'quote_id'); ?>
		<?php echo $form->error($model,'quote_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id'); ?>
		<?php echo $form->error($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aircraft_id'); ?>
		<?php echo $form->textField($model,'aircraft_id'); ?>
		<?php echo $form->error($model,'aircraft_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'one_way_mins'); ?>
		<?php echo $form->textField($model,'one_way_mins'); ?>
		<?php echo $form->error($model,'one_way_mins'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roundtrip'); ?>
		<?php echo $form->textField($model,'roundtrip'); ?>
		<?php echo $form->error($model,'roundtrip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'overnights'); ?>
		<?php echo $form->textField($model,'overnights'); ?>
		<?php echo $form->error($model,'overnights'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flight_cost'); ?>
		<?php echo $form->textField($model,'flight_cost',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'flight_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'overnight_fees'); ?>
		<?php echo $form->textField($model,'overnight_fees',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'overnight_fees'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roundtrip_cost'); ?>
		<?php echo $form->textField($model,'roundtrip_cost',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'roundtrip_cost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_cost'); ?>
		<?php echo $form->textField($model,'total_cost',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'total_cost'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- form -->