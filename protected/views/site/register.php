<?php
/* @var $this SiteController */
/* @var $user ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Register';
$this->breadcrumbs = array('Register');
?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title"> Register to use <?php echo Yii::app ()->name; ?></h4>
		</div>
		<div class="modal-body">

			<div class="form">

<?php if(Yii::app()->user->hasFlash('register')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('register'); ?>
</div>

<?php else: ?>

<?php if(Yii::app()->user->hasFlash('error')) { ?>
<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('error'); ?>
</div>
<?php } ?>

<div class="form">

<?php
	
	$form = $this->beginWidget('CActiveForm', array('id'=>'register-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true)));
	?>

	<fieldset>
						<legend>Confidential Registration Information</legend>
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
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username'); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

						<div class="row">
		<?php echo $form->labelEx($user,'email'); ?>
		<?php echo $form->textField($user,'email'); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

						<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password'); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>

						<div class="row">
		<?php echo $form->labelEx($user,'password_repeat'); ?>
		<?php echo $form->passwordField($user,'password_repeat'); ?>
		<?php echo $form->error($user,'password_repeat'); ?>
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
		<?php echo CHtml::submitButton('Register', array('name'=>'RegisterComplete')); ?>
	</div>
					</fieldset>
<?php $this->endWidget(); ?>

</div>
				<!-- form -->
			</div>
			<!-- modal -->

<?php endif; ?>