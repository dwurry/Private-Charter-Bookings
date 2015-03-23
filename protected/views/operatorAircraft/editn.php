<?php
/* @var $this OperatorAircraftController */
/* @var $model OperatorAircraft */
?>
<div class="modal-header">
	<h4 class="modal-title">Update OperatorAircraft <?php echo $model->id; ?></h4>
</div>
<div class="modal-body">

<?php
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}

$this->renderPartial('_formeditn', array('model'=>$model,'modelref'=>$modelref,'modeleng'=>$modeleng,'image'=>$image));
?>
</div>
<!-- modal-body -->