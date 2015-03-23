<?php
/* @var $this FAAAircraftRefController */
/* @var $model FAAAircraftRef */
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
		<?php echo $form->label($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mfr'); ?>
		<?php echo $form->textField($model,'mfr',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_acft'); ?>
		<?php echo $form->textField($model,'type_acft'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_eng'); ?>
		<?php echo $form->textField($model,'type_eng'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ac_cat'); ?>
		<?php echo $form->textField($model,'ac_cat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'build_cert_ind'); ?>
		<?php echo $form->textField($model,'build_cert_ind'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_eng'); ?>
		<?php echo $form->textField($model,'no_eng'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_seats'); ?>
		<?php echo $form->textField($model,'no_seats'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ac_weight'); ?>
		<?php echo $form->textField($model,'ac_weight',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'speed'); ?>
		<?php echo $form->textField($model,'speed'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->