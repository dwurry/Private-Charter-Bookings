<?php
/* @var $this QuoteController */
/* @var $model Quote */
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
		<?php echo $form->label($model,'dep_arp'); ?>
		<?php echo $form->textField($model,'dep_arp',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arr_arp'); ?>
		<?php echo $form->textField($model,'arr_arp',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_trav'); ?>
		<?php echo $form->textField($model,'num_trav'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dep_time'); ?>
		<?php echo $form->textField($model,'dep_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cust_id'); ?>
		<?php echo $form->textField($model,'cust_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->