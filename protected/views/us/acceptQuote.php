<?php
/* @var $this UsController */
?>
<div class="modal-header">
	<h4 class="modal-title">Book the flight: Accept Contract (1 of 3)</h4>
</div>
<div class="modal-body">
<?php
$this->renderPartial('_bid', array('bidId'=>$bidId,'headerMessage'=>'Accept contract to begin booking process','emptyMessage'=>'','buttons'=>'', 'color'=>ColorUtils::BLUE_SET()));

$this->renderPartial('/user/_customerList', array('customers'=>$travelers,
		'headerMessage'=>'Passenger Manifest', 'buttonText'=>'Add Passenger', 'passengerObj'=>$brDetail, 'color'=>ColorUtils::BLUE_SET()));

$this->renderPartial('../us/_formAcceptQuote', array('bidId'=>$bidId,'brDetail'=>$brDetail));
?>
</div>
<!-- modal-body -->

