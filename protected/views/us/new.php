<php /* @var $thisUsController */
/* @var $quoteQuote */
?>

<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true"></button>
			<!--aria-hidden?-->
			<h4 class="modal-title">New Quote</h4>
		</div>
		<div class="modal-body">

<?php
$this->renderPartial('_formNew', array('quote'=>$quote,'leg'=>$leg,'addedLegDisplay'=>$addedLegDisplay));

if(isset($legs)){
	echo '<p>&nbsp;</p>';
	$this->renderPartial('_legList', array('legs'=>$legs,'headerMessage'=>'Trip Flight Segments (legs)'));
}
if(isset($leg->quote_id)){
	$form = $this->beginWidget('CActiveForm', array('id'=>'quote-form','enableAjaxValidation'=>false));
	// Note! The $leg->quote_id has to be in this form so we can tell what bid we're submitting/canceling.
	echo '<input type="hidden" name="quote_id" value="' . $leg->quote_id . '" />';
	
	echo '<div class="row buttons">';
	echo CHtml::submitButton('Submit for Bidding', array('name'=>'submit'));
	echo CHtml::submitButton('Cancel Bid--erase data', array('name'=>'cancel'));
	echo '</div>';
	$this->endWidget();
	echo '</fieldset>';
}

if(isset($travelers)){
	echo '<p>&nbsp;</p>';
	$actionDelete = 'Yii::app()->createUrl("/user/deleteCrmLink/".$data[\'crm_id\'])';
	$actionEdit = 'Yii::app()->createUrl("/user/travelerEntry/".$data[\'id\'])';
	$actionView = 'Yii::app()->createUrl("/user/travelerEntry/".$data[\'id\'])';
	
	$this->renderPartial('/user/_customerList', array('customers'=>$travelers,
													'headerMessage'=>'Passenger Manifest', 
													'passengerObj'=>$leg, 
													'buttonText'=>'Add Passenger',
													'actionDelete'=>$actionDelete, 'actionEdit'=>$actionEdit, 'actionView'=>$actionView,));
}
?>
	</div><!-- body -->
	</div><!-- content -->
</div><!-- modal dialog -->