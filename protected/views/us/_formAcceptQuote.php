<?php
$form = $this->beginWidget('CActiveForm', array('id'=>'accept-quote-form','action'=>Yii::app()->createUrl('/us/acceptQuote/' . $bidId),'enableAjaxValidation'=>false));

?>
<fieldset>
	<legend>Contract Approval:</legend>

	<?php echo $form->errorSummary($brDetail); ?>
	
	<?php
	echo $form->textArea($brDetail, 'contract', array('disabled'=>'disabled'));
	?>
	<div class="row" style="display: block;">
	<?php
	echo "<div style='display: inline; float:  left;'>";
	echo $form->checkBox($brDetail, 'agree'); // ."&nbsp;&nbsp";
	echo $form->label($brDetail, 'agree') . "&nbsp;&nbsp";
	echo $form->error($brDetail, 'agree');
	echo "</div>";
	?>
	</div>
	<?php
	$costs = Utility::buildCostArrayFromBidId($bidId);
	?>
<?php

	echo "<div class='row buttons'>";
	echo "<p style='line-height: 50%';>&nbsp;</p>";
	$form = $this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/us/acceptQuote/' . $bidId . '?', array('type'=>Utility::BRAINTREE))));
	echo CHtml::submitButton('Pay ' . $costs['charge_total'] . ' by credit card', array('name'=>'submitPayment','style'=>'float: left; color: green;'));
	$this->endWidget();
	echo "<p>&nbsp;</p>";
	echo "</div>";
	?>
	
</fieldset>

<?php $this->endWidget(); ?>
</div>
<!-- form -->
