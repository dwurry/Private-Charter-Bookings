
<div class="form">
	<?php
	$this->renderPartial('/us/_bid', array('bidId'=>$flightData['bid_id'],'headerMessage'=>'Pay for charter','emptyMessage'=>'','buttons'=>''));
	
	$action = ($flightData['payAttempt'] === 1)?'../braintree/' . $flightData['quote_id']:'braintree/' . $flightData['quote_id'];
	$form = $this->beginWidget('CActiveForm', array('id'=>'braintree-creditcard-form','action'=>'../braintree/' . $flightData['bid_id'],'enableAjaxValidation'=>false));
	
	echo '<fieldset class="entry">';
	$this->widget('ext.BraintreeApi.widgets.CCForm', array('form'=>$form,'model'=>$payment,'fields'=>array('creditCard'=>array('number','cvv','month','year','name'),'customer'=>array('firstName','lastName','company','phone','fax','website','email'))));
	?>
	<input type="submit" value="Submit" />
	<?php
	echo "</fieldset>";
	$this->endWidget();
	?>
</div>