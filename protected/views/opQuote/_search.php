<div class="wide form">

<?php

$form = $this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl($this->route),'method'=>'get'));
?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quote_id'); ?>
		<?php echo $form->textField($model,'quote_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'operator_id'); ?>
		<?php echo $form->textField($model,'operator_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aircraft_id'); ?>
		<?php echo $form->textField($model,'aircraft_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'one_way_mins'); ?>
		<?php echo $form->textField($model,'one_way_mins'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roundtrip'); ?>
		<?php echo $form->textField($model,'roundtrip'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'overnights'); ?>
		<?php echo $form->textField($model,'overnights'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flight_cost'); ?>
		<?php echo $form->textField($model,'flight_cost',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'overnight_fees'); ?>
		<?php echo $form->textField($model,'overnight_fees',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'roundtrip_cost'); ?>
		<?php echo $form->textField($model,'roundtrip_cost',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_cost'); ?>
		<?php echo $form->textField($model,'total_cost',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
<!-- search-form -->