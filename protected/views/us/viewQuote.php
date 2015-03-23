<?php
/* @var $this UsController */
?>
<div class="modal-header">
	<h4 class="modal-title">The Quote</h4>
</div>
<div class="modal-body">

<?php
// migrate to message bell
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}

// Set form coloring based on user/status of quote
if($quote->status != Quote::STATUS_US_ACCEPT && $quote->status != Quote::STATUS_US_PAID_FINAL){
	if(Yii::app()->user->getId() == $quote->cust_id){
		$color = ColorUtils::BLUE_SET();
		$actionEdit = 'Yii::app()->createUrl("/us/acceptQuote/".$data[\'trip\'])';
	}else{
		$color = ColorUtils::RED_SET();
	}
}else if($quote->isCurrent() == true){
	$color = ColorUtils::ORANGE_SET();
}else if($quote->isBooked() == true){
	$color = ColorUtils::GREEN_SET();
}else if($quote->isHistory() == true){
	$color = ColorUtils::PURPLE_SET();
}

$this->renderPartial('/us/_legList', array('legs'=>$legs,'headerMessage'=>'Quote','displayDistance'=>true,'color'=>$color));
echo '</fieldset>';
echo '<p>&nbsp;</p>';
$this->renderPartial('_bidList', array('bids'=>$bids,'headerMessage'=>'Bids','emptyMessage'=>'','buttons'=>$buttons,'actionEdit'=>$actionEdit,'color'=>$color));
echo '<p>&nbsp;</p>';
//$actionDelete = 'Yii::app()->createUrl("/user/deleteCrmLink/".$data[\'crm_id\'])';
//$actionEdit = 'Yii::app()->createUrl("/user/travelerEntry/".$data[\'id\'])';
$actionView = 'Yii::app()->createUrl("/user/travelerEntry/".$data[\'id\'])';

if (isset($passengers)){  //Note:  The passengerObj being passed in must be a model with "public $passengerEmail;" defined.
	$this->renderPartial('/user/_customerList', array('customers'=>$passengers,
			'headerMessage'=>'Passenger Manifest', 'buttonText'=>'', 'passengerObj'=>'', 'color'=>$color, 'actionView'=>$actionView));
}


echo "</div>"; // modal-body
?>