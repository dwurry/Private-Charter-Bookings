<?php
/* @var $this CoController */
/* @var $model Co */
?>
<div class="modal-header">
	<h4 class="modal-title">Review Quotes -- Choose Aircraft and Finalize
		Operator Pricing</h4>
</div>
<div class="modal-body">

<?php
$this->renderPartial('/us/_legList', array('legs'=>$legs,'headerMessage'=>'Quote Detail','displayDistance'=>true,'color'=>ColorUtils::BLUE_SET()));
echo "<div style='display: block; width: -webkit-max-content;'>";
echo "<div class='row'>";
echo "<span>Your Default Margin:&nbsp;&nbsp;&nbsp;&nbsp;</span>";
echo "<span style='float: right;'>" . ($op['default_margin'] * 100) . "%</span>";
echo "</div>";
echo "<div class='row'>";
echo "<span>Your Default Route Buffer:&nbsp;&nbsp;&nbsp;&nbsp;</span>";
echo "<span style='float: right;'>" . ($op['default_route_buffer'] * 100) . "%<br /> </span>";
echo "</div>";
echo "<div class='row'>";
echo "<span>Your Overnight Fee:&nbsp;&nbsp;&nbsp;&nbsp;</span>";
echo "<span style='float: right;'>" . $op['overnight_fee'] . "</span>";
echo "</div>";
echo "</div>";

echo "</fieldset>";

$aircraftList = new CArrayDataProvider($model, array('pagination'=>false));
$this->renderPartial('_aircraft', array('aircraftList'=>$aircraftList,'headerMessage'=>'Eligible Aircraft','quote'=>$quote));

echo "<div class='row buttons'>";
echo "<p>&nbsp;</p>";
$form = $this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/co/coReviewBids/' . $quote['id'])));
echo CHtml::submitButton('Submit Aircraft to Customer (This action is not-undoable)', array('name'=>'submitBids','style'=>'float: left; color: green;'));
$this->endWidget();
echo "<p>&nbsp;</p>";
echo "<div/>";

echo "</fieldset>";
?>
