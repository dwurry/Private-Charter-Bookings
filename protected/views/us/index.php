<?php
/* @var $this UsController */
/* @var $dataProvider CActiveDataProvider */
?>

<div class="modal-header">
	<h4 class="modal-title">My Dashboard</h4>
</div>
<div class="modal-body">

<?php
// migrate to "Messages" - bell in header
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '" style="color: red; font-size = 1.5em">' . $message . "</div>\n";
}

echo "<div style='display: inline; width: 100%;'>";
	echo "<div class='row'>";
		echo "<div style='display: block; width: 50%; float: left;'>";
			echo "<div style='margin: 0 2px 0 0;'>";
				$this->renderPartial('_legList', array('legs'=>$activeReviewLegs,'headerMessage'=>'Review Quotes','emptyMessage'=>'There are no more flight bookings to review','action'=>$action,'color'=>ColorUtils::BLUE_SET()));
				echo "</fieldset>";
			echo "</div>";
		echo "</div><div style='display: block; width: 50%; float: right;'>";
			echo "<div style='margin: 0 2px 0 0;'>";
				$this->renderPartial('_legList', array('legs'=>$reviewLegs,'headerMessage'=>'In Process Quotes','emptyMessage'=>'There are no more flight bookings being reviewed at this time','action'=>'us/viewQuote','color'=>ColorUtils::RED_SET()));
				echo "</fieldset>";
		echo "</div>";
	echo "</div>";
echo "</div>";
echo '<p></p>';

echo "<div class='row'>";
	$this->renderPartial('_legList', array('legs'=>$active,'headerMessage'=>'Current Flights','emptyMessage'=>'There are no flights occuring right now','action'=>'us/viewQuote','color'=>ColorUtils::ORANGE_SET()));
	echo "</fieldset>";
echo "</div>";
echo '<p></p>';

echo "<div style='display: inline; width: 100%;'>";
	echo "<div class='row'>";
		echo "<div style='display: block; width: 50%; float: left;'>";
			echo "<div style='margin: 0 2px 0 0;'>";
				$this->renderPartial('_legList', array('legs'=>$pending,'headerMessage'=>'Booked Flights','emptyMessage'=>'There are no pending flights at this time','action'=>'us/viewQuote','color'=>ColorUtils::GREEN_SET()));
				echo "</fieldset>";
			echo "</div>";
		echo "</div><div style='display: block; width: 50%; float: right;'>";
			echo "<div style='margin: 0 2px 0 0;'>";
				$this->renderPartial('_legList', array('legs'=>$history,'headerMessage'=>'Completed Flights','emptyMessage'=>'There are no past bookings at this time','action'=>'us/viewQuote','color'=>ColorUtils::PURPLE_SET()));
				echo "</fieldset>";
		echo "</div>";
	echo "</div>";
echo "</div>";
echo '<p></p>';
?>
