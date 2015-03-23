<?php
/* @var $this CoController */
/* @var $model No!  */
/* @var $form CActiveForm */
?>

<?php

// prep input
$dist_w_buffer = $opQuote->legsDistanceRollup() + ($opQuote->legsDistanceRollup() * ($opdata->default_route_buffer / 100));

?>

<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'op-quote-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false));

$this->renderPartial('/us/_legList', array('legs'=>$legs,'headerMessage'=>'Quote Detail','displayDistance'=>true));
?>
</fieldset>

	<fieldset style="max-width: 425px;">
		<legend>Quote Parameters:</legend>
		<div class="row buttons">
				<?php echo CHtml::submitButton('Recalculate', array('name' => 'recalc')); ?>
				<?php echo CHtml::submitButton('Save', array('name' => 'save')); ?>
			</div>

			<?php echo $form->errorSummary($opQuote);?>
			<p class="note">
			Fields with <span class="required">*</span> are required.
		</p>


		<fieldset class="entry">
			<legend>Distance</legend>
			<div class="row">
				<div class="span-5">
					<?php $opQuote['total_dist'] = $opQuote->legsDistanceRollup(); ?>
					<?php echo $form->labelEx($acrefdata,'derating',array('label'=>'Sum of all leg distances:')); ?>
					<?php echo $form->textField($opQuote,'total_dist', array('disabled' => true)); ?>
					<?php echo $form->error($opQuote,'total_dist'); ?>
			    </div>

				<div class="span-5 last">
					<?php echo $form->labelEx($opdata,'default_route_buffer',array('label'=>'Route buffer percentage:')); ?>
					<?php echo $form->textField($opdata,'default_route_buffer'); ?>
					<?php echo $form->error($opdata,'default_route_buffer'); ?>
			    	</div>
			</div>

			<div class="row">
				<span><strong>Distance with buffer (calculated):</strong></span> <input
					type="text" name="distance_w_buffer"
					value="<?php echo $dist_w_buffer; ?>" readonly />
			</div>
		</fieldset>

		<fieldset class="entry">
			<legend>Time</legend>
			<div class="row">
				<div class="span-5">
					<?php echo $form->labelEx($acrefdata,'derating',array('label'=>'Aircraft derating percentage:')); ?>
					<?php echo $form->textField($acrefdata,'derating'); ?>
					<?php echo $form->error($acrefdata,'derating'); ?>
			    </div>
				<div class="span-5 last">
					<?php echo $form->labelEx($acrefdata,'speed'); ?>
					<?php echo $form->textField($acrefdata,'speed'); ?>
					<?php echo $form->error($acrefdata,'speed'); ?>
    			</div>
			</div>
			<div class="row">
				<?php $opQuote['flight_mins'] = $opQuote->legsMinRollup(); ?>
				<?php echo $form->labelEx($opQuote,'flight_mins',array('label'=>'Sum of leg flight minutes:')); ?>
				<?php echo $form->textField($opQuote,'flight_mins', array('disabled' => true)); ?>
				<?php echo $form->error($opQuote,'flight_mins'); ?>
		    </div>
		</fieldset>
		<fieldset class="entry">
			<legend>Cost</legend>
			<div class="span-5">
				<?php echo $form->labelEx($acdata,'cost_per_hour'); ?>
				<?php echo $form->textField($acdata,'cost_per_hour'); ?>
				<?php echo $form->error($acdata,'cost_per_hour'); ?>
		    </div>
			<div class="span-5 last">
		    	<?php echo $form->labelEx($opdata,'default_margin',array('label'=>'Margin percentage:')); ?>
				<?php echo $form->textField($opdata,'default_margin'); ?>
				<?php echo $form->error($opdata,'default_margin'); ?>
		    </div>
		</fieldset>
		<fieldset class="entry">
			<legend>Overnights</legend>
			<div class="span-5">
				<?php echo $form->labelEx($opQuote,'overnights'); ?>
				<?php echo $form->textField($opQuote,'overnights'); ?>
				<?php echo $form->error($opQuote,'overnights'); ?>
		    </div>

			<div class="span5 last">
				<?php echo $form->labelEx($opdata,'overnight_fee',array('label'=>'Overnight Fees (calculated):')); ?>
				<?php echo $form->textField($opdata,'overnight_fee'); ?>
				<?php echo $form->error($opdata,'overnight_fee'); ?>
		    </div>

		</fieldset>
		<div class="row buttons">
			<p>&nbsp;</p>
			<?php echo CHtml::submitButton('Recalculate', array('name' => 'recalc')); ?>
			<?php echo CHtml::submitButton('Save', array('name' => 'save')); ?>
		</div>

</div>

<div>

	<fieldset class="entry">
		<legend>Calculated Values:</legend>

		<div class="row">
				<?php $opQuote['flight_cost'] = $opQuote->legsCostRollup(); ?>
				<?php echo $form->labelEx($opQuote,'flight_cost',array('label'=>'Sum of flight leg costs:')); ?>
				<?php echo $form->textField($opQuote,'flight_cost',array('size'=>9,'maxlength'=>9, 'disabled' => true)); ?>
				<?php echo $form->error($opQuote,'flight_cost'); ?>
			</div>

	<?php if($opQuote->overnights > 0) { ?>
	<div class="row">
		<?php echo $form->labelEx($opQuote,'overnight_fees'); ?>
		<?php echo $form->textField($opQuote,'overnight_fees',array('size'=>9,'maxlength'=>9, 'disabled' => true)); ?>
		<?php echo $form->error($opQuote,'overnight_fees'); ?>
	</div>
	<?php } ?>
	
	<div class="row">
		<?php $opQuote['margin'] = $opQuote->legsMarginRollup(); ?>
		<?php echo $form->labelEx($opQuote,'margin',array('label'=>'Sum of all leg margin addons:')); ?>
		<?php echo $form->textField($opQuote,'margin',array('size'=>9,'maxlength'=>9, 'disabled' => true)); ?>
		<?php echo $form->error($opQuote,'margin'); ?>
	</div>

		<div class="row">
		<?php $opQuote['subtotal'] = $opQuote->calcSubtotal(); ?>
		<?php echo $form->labelEx($opQuote,'subtotal',array('label'=>'Subtotal:')); ?>
		<?php echo $form->textField($opQuote,'subtotal',array('size'=>9,'maxlength'=>9, 'disabled' => true)); ?>
		<?php echo $form->error($opQuote,'subtotal'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($opQuote,'fet',array('label'=>'FET:')); ?>
		<?php echo $form->textField($opQuote,'fet',array('size'=>9,'maxlength'=>9, 'disabled' => true)); ?>
		<?php echo $form->error($opQuote,'fet'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx ( $opQuote, 'total_cost', array('label' => 'Total cost:'));?>
		<?php echo $form->textField($opQuote,'total_cost',array('size'=>9,'maxlength'=>9, 'disabled' => true)); ?>
		<?php echo $form->error($opQuote,'total_cost'); ?>
	</div>

	</fieldset>

<?php $this->endWidget(); ?>

</div>
<!-- form -->