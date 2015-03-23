<?php
/* @var $this UserController */
/* @var $model User */
?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Update User Record</h4>
		</div>
		<div class="modal-body">

<?php
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>


<?php $this->renderPartial('_formUser', array('model'=>$model)); ?>

</div>
		<!-- modal-body -->