<?php
echo '<div class="form">';

$form = $this->beginWidget('CActiveForm', array('id'=>'broker-settings-modify','enableClientValidation'=>true,'clientOptions'=>array('validateOnSubmit'=>true)));

echo '<fieldset class="entry">';
echo "<legend>Modify Brokerage Settings</legend>";

echo $form->errorSummary($broker);
?>
<div class="entry">
	<div class="row">
			<?php echo $form->labelEx($broker,'added_fee'); ?>
			<?php echo $form->textField($broker,'added_fee'); ?>
			<?php echo $form->error($broker,'added_fee'); ?>
		</div>

	<div class="row">
			<?php echo $form->labelEx($broker,'percent_commision'); ?>
			<?php echo $form->textField($broker,'percent_commision'); ?>
			<?php echo $form->error($broker,'percent_commision'); ?>
		</div>
</div>
<?php
echo '<h3>This is the contract as it will appear for this bid.</h3>' . '<p>Create a text version of the contract with substitutions incased in percents like this:
	 		%subsitution%.</p>' . '<p>supported substitution fields are: </p>' . '<p>%buyer_full_name%  	- first and last name of the buyer </p>' . '<p>%buyer_name_and_co%	- buyer\'s full name folowed by \' of \' and their company name</p>' . '<p>%buyer_company% 		- buyer\'s company name</p>' . '<p>%buyer_address%		- address of buyer as listed in their USER account</p>' . '<p></p>' . '<p>%broker_full_name%	- first and last name of broker.</p>' . '<p>%broker_name_and_co% - broker\'s full name followed by \' of \' and their company name</p>' . '<p>%broker_company%		- broker\'s company name</p>' . '<p>%broker_address%		- address of broker as listed in their USER account</p>' . '<p></p>' . '<p>%operator_company%	- Operator\'s company name</p>' . '<p>%operator_address%	- address of Operator as listed in their USER account</p>';

echo $form->textArea($broker, 'contract', array('rows'=>15,'cols'=>95));
echo '<p></p>';

echo '<div class="row buttons">';
echo CHtml::submitButton('Change Fees and Contract', array('name'=>'contract'));
echo '</div>';
echo '</fieldset>';

$this->endWidget();

echo '</div>'; // <!-- form -->
?>