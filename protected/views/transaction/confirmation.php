<div class="modal-header">
	<h4 class="modal-title">Book the flight: Confirmation (2 of 3)</h4>
</div>
<div class="modal-body">
	<div class="form">
	<?php
	$form = $this->beginWidget('CActiveForm', array('id'=>'braintree-creditcard-form','action'=>'../../us','enableAjaxValidation'=>false));
	
	$this->renderPartial('/us/_bid', array('bidId'=>$transaction->bid_id,'headerMessage'=>'Charter Payment Complete - The Following Fight is Scheduled','emptyMessage'=>'','buttons'=>''));
	
	?>
	<?php
	?>
	<input type="submit" value="OK" />
	<?php
	$this->endWidget();
	?>
</div>