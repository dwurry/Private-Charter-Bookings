<?php
echo '<div class="form">';

$form = $this->beginWidget('CActiveForm', array('id'=>'password-reset','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true)));

echo '<fieldset class="entry">';
echo "<legend>Modify Password</legend>";

echo $form->errorSummary($password);
?>

<div class="row">
		<?php echo $form->labelEx($password,'oldPassword'); ?>
		<?php echo $form->passwordField($password,'oldPassword'); ?>
		<?php echo $form->error($password,'oldPassword'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($password,'newPassword'); ?>
		<?php echo $form->passwordField($password,'newPassword'); ?>
		<?php echo $form->error($password,'newPassword'); ?>
	</div>

<div class="row">
		<?php echo $form->labelEx($password,'verifyPassword'); ?>
		<?php echo $form->passwordField($password,'verifyPassword'); ?>
		<?php echo $form->error($password,'verifyPassword'); ?>
	</div>


<div class="row buttons">
		<?php echo CHtml::submitButton('Change Password', array('name' => 'password')); ?>
	</div>
<?php echo"</fieldset>";?>
	
<?php

$this->endWidget();

echo '</div>'; // <!-- form -->
?>