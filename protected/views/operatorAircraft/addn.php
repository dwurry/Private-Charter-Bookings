<?php
/* @var $this OperatorAircraftController */
/* @var $model OperatorAircraft */
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Add Aircraft</h4>
		</div>
		<div class="modal-body">

<?php
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

<?php $this->renderPartial('_formaddn', array('model'=>$model,'modelref'=>$modelref,'modeleng'=>$modeleng)); ?>

</div>
		<!-- modal-body -->