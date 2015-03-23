<!-- 
 @var $this CoController
 -->

<div class="modal-header">
	<h4 class="modal-title">My Dashboard</h4>
</div>
<div class="modal-body">

<?php
// migrate to "Messages" - bell in header
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

<?php
echo "<div style='display: inline; width: 100%;'>";
	echo "<div class='row'>";
		echo "<div style='display: block; width: 50%; float: left;'>";
			echo "<div style='margin: 0 2px 0 0;'>";
				$this->renderPartial('/us/_legList', array('legs'=>$opReviewLegs,'action'=>$reviewButton,'headerMessage'=>'New Quotes','color'=>ColorUtils::BLUE_SET()));
				echo "</fieldset>";
			echo "</div>";
		echo "</div><div style='display: block; width: 50%; float: right;'>";
			echo "<div style='margin: 0 2px 0 0;'>";
				$this->renderPartial('/us/_legList', array('legs'=>$reviewLegs,'headerMessage'=>'Approved Quotes','action'=>'us/viewQuote','color'=>ColorUtils::RED_SET()));
				echo "</fieldset>";
		echo "</div>";
	echo "</div>";
echo "</div>";
echo '<p></p>';

echo "<div style='display: inline; width: 100%;'>";
	echo "<div class='row'>";
		$this->renderPartial('/us/_legList', array('legs'=>$active,'headerMessage'=>'Current Flights','emptyMessage'=>'There are no flights occuring right now','action'=>'us/viewQuote','color'=>ColorUtils::ORANGE_SET()));
		echo "</fieldset>";
	echo "</div>";
echo "</div>";
echo '<p></p>';

echo "<div style='display: inline; width: 100%;'>";
	echo "<div class='row'>";
		echo "<div style='display: block; width: 50%; float: left;'>";
			echo "<div style='margin: 0 2px 0 0;'>";
				$this->renderPartial('/us/_legList', array('legs'=>$pending,'headerMessage'=>'Booked Flights','emptyMessage'=>'There are no pending flights at this time','action'=>'us/viewQuote','action'=>'us/viewQuote','color'=>ColorUtils::GREEN_SET()));
				echo "</fieldset>";
			echo "</div>";
		echo "</div><div style='display: block; width: 50%; float: right;'>";
			echo "<div style='margin: 0 2px 0 0;'>";
				$this->renderPartial('/us/_legList', array('legs'=>$history,'headerMessage'=>'Completed Flights','emptyMessage'=>'There are no past bookings at this time','action'=>'us/viewQuote','color'=>ColorUtils::PURPLE_SET()));
				echo "</fieldset>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
echo "</div>";
echo '<p></p>';
?>