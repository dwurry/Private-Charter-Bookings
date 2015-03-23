<div class="form">

<?php
$form = $this->beginWidget('CActiveForm', array('id'=>'register-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true)));
?>

	<fieldset class="entry">
		<legend>Contact Information</legend>
		<p class="note">
			Fields with <span class="required">*</span> are required.
		</p>

	<?php echo $form->errorSummary($user); ?>

	<div class="row">
		<?php echo $form->labelEx($user,'fname'); ?>
		<?php echo $form->textField($user,'fname'); ?>
		<?php echo $form->error($user,'fname'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($user,'lname'); ?>
		<?php echo $form->textField($user,'lname'); ?>
		<?php echo $form->error($user,'lname'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($user,'email'); ?>
		<?php echo $form->textField($user,'email'); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($user,'company'); ?>
		<?php echo $form->textField($user,'company'); ?>
		<?php echo $form->error($user,'company'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($user,'street'); ?>
		<?php echo $form->textField($user,'street'); ?>
		<?php echo $form->error($user,'street'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($user,'city'); ?>
		<?php echo $form->textField($user,'city'); ?>
		<?php echo $form->error($user,'city'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($user,'state'); ?>
		<?php echo $form->textField($user,'state'); ?>
		<?php echo $form->error($user,'state'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($user,'zip'); ?>
		<?php echo $form->textField($user,'zip'); ?>
		<?php echo $form->error($user,'zip'); ?>
	</div>

		<div class="row">
		<?php echo $form->labelEx($user,'phone'); ?>
		<?php echo $form->textField($user,'phone'); ?>
		<?php echo $form->error($user,'phone'); ?>
	</div>

		<div class="row buttons">
		<?php echo CHtml::submitButton('Save Contact Info', array('name' => 'contract')); ?>
	</div>
	</fieldset>
<?php $this->endWidget(); ?>

</div>
<!-- form -->
