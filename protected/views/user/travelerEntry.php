<?php
?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Create Customer</h4>
		</div>
		<div class="modal-body">

			<div class="form">

<?php
$form = $this->beginWidget('CActiveForm', array('id'=>'traveler-form','enableAjaxValidation'=>false));
?>

	<p class="note">
					Fields with <span class="required">*</span> are required.
				</p>

	<?php echo $form->errorSummary($traveler); ?>

	<input type="hidden" name="returnFormPath"
					value="<?php echo $returnFormId ?>" />

				<div class="row">
		<?php echo $form->labelEx($traveler,'fname'); ?>
		<?php echo $form->textField($traveler,'fname',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($traveler,'fname'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($traveler,'lname'); ?>
		<?php echo $form->textField($traveler,'lname',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($traveler,'lname'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($traveler,'email'); ?>
		<?php echo $form->textField($traveler,'email',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($traveler,'email'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($traveler,'company'); ?>
		<?php echo $form->textField($traveler,'company',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($traveler,'company'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($traveler,'street'); ?>
		<?php echo $form->textField($traveler,'street',array('size'=>30,'maxlength'=>100)); ?>
		<?php echo $form->error($traveler,'street'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($traveler,'city'); ?>
		<?php echo $form->textField($traveler,'city',array('size'=>30,'maxlength'=>50)); ?>
		<?php echo $form->error($traveler,'city'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($traveler,'state'); ?>
		<?php echo $form->textField($traveler,'state',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($traveler,'state'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($traveler,'zip'); ?>
		<?php echo $form->textField($traveler,'zip',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($traveler,'zip'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($traveler,'phone'); ?>
		<?php echo $form->textField($traveler,'phone',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($traveler,'phone'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($traveler,'weight'); ?>
		<?php echo $form->textField($traveler,'weight',array('size'=>30,'maxlength'=>6)); ?>
		<?php echo $form->error($traveler,'weight'); ?>
	</div>

				<div class="row buttons"> 
		<?php
		$buttonAction = $traveler->isNewRecord?'Create':'Save';
		echo CHtml::submitButton($buttonAction, array('name'=>$buttonAction));
		?>
	</div>

<?php $this->endWidget(); ?>

</div>
			<!-- form -->