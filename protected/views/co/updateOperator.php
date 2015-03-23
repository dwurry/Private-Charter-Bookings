<?php
/* @var $this CoController */
/* @var $model Co */

?>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Update Operator Record</h4>
		</div>
		<div class="modal-body">

<?php
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

<?php $this->renderPartial('_formOperator', array('model'=>$model)); ?>

</div>
		<!-- modal-body -->