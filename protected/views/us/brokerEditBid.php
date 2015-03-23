<div class="modal-header">
	<h4 class="modal-title">Choose Aircraft and Finalize Broker Pricing</h4>
</div>
<div class="modal-body">

<?php 
// Move to bell
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}

$form = $this->beginWidget('CActiveForm', array('id'=>'accept-quote-form','action'=>'../../us/brokerEditBid/' . $bid['id'],'enableAjaxValidation'=>false));

echo '<fieldset class="entry">';
echo '<legend>Enter values to modify bids</legend>';
echo '<div class="row">';
echo $form->labelEx($brDetail, 'fixed_fee', array('label'=>'Fixed Fee:'));
echo $form->textField($brDetail, 'fixed_fee');
echo $form->error($brDetail, 'fixed_fee');
echo "</div>";
echo '<div class="row">';
echo $form->labelEx($brDetail, 'percent', array('label'=>'Commission:'));
echo $form->textField($brDetail, 'percent');
echo $form->error($brDetail, 'percent');
echo "</div>";
echo '<div class="row">';
echo '<p style="line-height:  5%;">&nbsp;</p>';
echo CHtml::submitButton('Recalculate', array('name'=>'recalc'));
echo CHtml::submitButton('Save', array('name'=>'save'));
echo "</div>";
echo "</fieldset>";

echo "<fieldset>";
echo "<legend>The proposal to the customer</legend>";

$this->renderPartial('_bidSeller', array('bidId'=>$bid['id'],'headerMessage'=>'','emptyMessage'=>'','buttons'=>''));

echo '<h3>Customer Contract for this bid.</h3>' . '<p>Verify before submitting.</p>';

// echo $form->textArea($brDetail,'contract',array('rows' => 15, 'cols' => 95, 'disabled'=>'disabled'));
echo $form->textArea($brDetail, 'contract', array('rows'=>15,'cols'=>95));
echo '<p style="line-height:  5%;">&nbsp;</p>';
echo CHtml::submitButton('Save', array('name'=>'save'));
echo "</fieldset>";

$this->endWidget();
echo "</div>"; // modal body
?>
