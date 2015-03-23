<?php
/* @var $this CoController */
/* @var $dataProvider CActiveDataProvider */
?>
<div class="modal-header">
	<h4 class="modal-title">Aircraft List</h4>
</div>
<div class="modal-body">
<?php
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}

$this->renderPartial('_aircraft', array('aircraftList'=>$aircraftList,'headerMessage'=>'Your Aircraft'));
?>
</div>
<!-- modal-body  -->


