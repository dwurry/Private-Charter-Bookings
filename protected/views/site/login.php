<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title"><?php echo Yii::app ()->name . ' - Login'; ?></h4>
		</div>
		<div class="modal-body">

			<div class="form">
<?php
$form = $this->beginWidget('CActiveForm', array('id'=>'login-form','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true)));

echo "<fieldset>";
echo "<legend>Login or Register</legend>";

echo $form->errorSummary($loginForm);
?>
	<p>Please fill out the following form with your login credentials:</p>

				<p class="note">
					Fields with <span class="required">*</span> are required.
				</p>

				<div class="row">
		<?php echo $form->labelEx($loginForm,'username'); ?>
		<?php echo $form->textField($loginForm,'username'); ?>
		<?php echo $form->error($loginForm,'username'); ?>
	</div>

				<div class="row">
		<?php echo $form->labelEx($loginForm,'password'); ?>
		<?php echo $form->passwordField($loginForm,'password'); ?>
		<?php echo $form->error($loginForm,'password'); ?>
		<p class="hint"></p>
				</div>

				<div class="row rememberMe">
	<?php
	echo "<div style='display: inline; float:  left;'>";
	echo $form->checkBox($loginForm, 'rememberMe');
	echo $form->label($loginForm, 'rememberMe') . '&nbsp;&nbsp;&nbsp;&nbsp;';
	echo $form->error($loginForm, 'rememberMe');
	echo "</div>";
	?>
	</div>

				<div class="row buttons">
		<?php echo CHtml::submitButton('Login', array('name'=>'Login')); ?>
		<?php echo CHtml::submitButton('Register', array('name'=>'Register')); ?>
		</div>

<?php $this->endWidget(); ?>
</div>
			<!-- form -->