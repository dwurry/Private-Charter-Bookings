<?php
/* @var $this UsController */
/* @var $quote Quote */
/* @var $form CActiveForm */
?>

<div class="form">

<?php

$form = $this->beginWidget('CActiveForm', array('id'=>'quote-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false));

?>
	<fieldset>
		<legend>Enter flight leg</legend>
		<div class="row">
			<p>
				Fields with <span class="required">*</span> are required.
			</p>
		</div>
		<div class="flash-error">
	<?php echo $form->errorSummary($leg);?>
	</div>

		<div class="row">
		<?php echo CHtml::label('Departing Airport Code --OR-- Traveler\'s Address', 'dep_address'); ?>
		<?php echo $form->textField($leg,'dep_address'); ?>
		<?php echo $form->error($leg,'dep_address'); ?>
	</div>

		<div class="row">
		<?php echo CHtml::label('Destination Airport --OR-- Address', 'arr_address'); ?>
		<?php echo $form->textField($leg,'arr_address'); ?>
		<?php echo $form->error($leg,'arr_address'); ?>
		</div>

		<div class="row">
		<?php echo $form->labelEx($leg,'num_trav'); ?>
		<?php echo $form->textField($leg,'num_trav'); ?>
		<?php echo $form->error($leg,'num_trav'); ?>
	</div>

		<div class="row">
		<?php echo CHtml::activeLabelEx($leg,'dep_time'); ?>
	    <?php
					
$this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array('model'=>$leg,					// Model object
					'attribute'=>'dep_time',					// attribute name
					'mode'=>'datetime',					// use "time","date" or "datetime" (default)
					'language'=>'','options'=>array('regional'=>'','timeFormat'=>'hh:mm','dateFormat'=>'yy-mm-dd'))					// jquery plugin options
					);
					?>  
		<?php echo $form->error($leg,'dep_time'); ?>
	</div>
		<div class="row">
		<?php
		if(!$addedLegDisplay){
			echo $form->labelEx($leg, 'retTime', array('label'=>'Return Time (if roundtrip)'));
			$this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array('model'=>$leg,			// Model object
			'attribute'=>'retTime',			// attribute name
			'mode'=>'datetime',			// use "time","date" or "datetime" (default)
			'language'=>'','options'=>array('regional'=>'','timeFormat'=>'hh:mm','dateFormat'=>'yy-mm-dd')));
			echo $form->error($leg, 'retTime');
		}
		?>
	</div>
		<input type="hidden" name="quote_id"
			value="<?php echo $leg->quote_id ?>" />
	
	<?php
	if(Yii::app()->user->level >= User::USER_BR && !$addedLegDisplay){
		$list = CHtml::listData(CrmLink::getCustomers(), 'email', function ($item){
			return CHtml::encode($item['fname'] . ' ' . $item['lname'] . ' : ' . $item['email']);
		});
		echo '<div class="row">';
		echo $form->labelEx($leg, 'customerEmail', array('label'=>'Purchaser (email)'));
		echo $form->dropDownList($leg, 'customerEmail', $list);
		echo $form->error($leg, 'customerEmail');
		echo '</div>';
	}
	?>
	
	<div class="row buttons">
			<p></p>
		<?php echo CHtml::submitButton('Add Leg', array('name' => 'addLeg')); ?>
		<?php echo CHtml::submitButton('Submit for Bidding', array('name' => 'submit'));?>
		</div>
		<p></p>
	</fieldset>
	
<?php $this->endWidget ();?>

</div>
<!-- form -->