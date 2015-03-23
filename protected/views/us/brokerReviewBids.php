<?php
/* @var $this UsController */
/* @var $model -- named appropriately for the object! */
?>
<div class="modal-header">
	<h4 class="modal-title">Review Quotes and Choose Aircraft and Finalize
		Broker Pricing</h4>
</div>
<div class="modal-body">

<?php 
// migrate to message bell
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

<?php
$this->renderPartial('/us/_legList', array('legs'=>$legs,'headerMessage'=>'Trip to Review','displayDistance'=>true));
echo "<p>Your Default Margin: " . ($broker['percent_commision']) . "%<br />";
echo "Your Default Added Fee: $" . ($broker['added_fee']) . "<br />";
echo "</fieldset>";

$buttons = '<div id=\"rowfoot\">'. 
// 			 <a class=\"edit\"   edit=\"Edit\"    href=\"../brokerEditBid/".$data[\'trip\']."\">  <img src=\"'.Yii::app()->baseUrl.'/css/images/gr-update.png'.'\" alt=\"Edit\" /></a> 
// 			 <a class=\"delete\" title=\"Delete\" href=\"../brokerRemoveBid/".$data[\'trip\']."\"><img src=\"'.Yii::app()->baseUrl.'/css/images/gr-delete.png'.'\" alt=\"Delete\" /></a>
		  '</div>';

$actionEdit = 'Yii::app()->createUrl("/us/brokerEditBid/".$data[\'trip\'])';
$actionDelete = 'Yii::app()->createUrl("/us/brokerRemoveBid/".$data[\'trip\'])';

echo "<div class='row buttons'>";
echo "<p style='line-height: 50%';>&nbsp;</p>";
$form = $this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/us/brokerReviewBids/' . $quote['id'])));
echo CHtml::submitButton('Submit Bids (This action is not-undoable)', array('name'=>'submitBids','style'=>'float: left; color: green;'));
$this->endWidget();
echo "<p>&nbsp;</p>";
echo "</div>";

$this->renderPartial('_bidListSeller', array('bids'=>$bids,'headerMessage'=>'Submit bids for your customers to choose from','emptyMessage'=>'','buttons'=>$buttons,'actionEdit'=>$actionEdit,'actionDelete'=>$actionDelete));

echo "<div class='row buttons'>";
echo "<p style='line-height: 50%';>&nbsp;</p>";
$form = $this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/us/brokerReviewBids/' . $quote['id'])));
echo CHtml::submitButton('Submit Bids (This action is not-undoable)', array('name'=>'submitBids','style'=>'float: left; color: green;'));
$this->endWidget();
echo "<p>&nbsp;</p>";
echo "</div>";

?>
