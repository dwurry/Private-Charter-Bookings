<?php
/* @var $this FAAEngineRefController */
/* @var $model FAAEngineRef */
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
		<?php echo $form->textField($model,'code',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mfr'); ?>
		<?php echo $form->textField($model,'mfr',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'model'); ?>
		<?php echo $form->textField($model,'model',array('size'=>13,'maxlength'=>13)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horsepower'); ?>
		<?php echo $form->textField($model,'horsepower'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thrust'); ?>
		<?php echo $form->textField($model,'thrust'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->