
<div class="modal-header">
	<h4 class="modal-title">Edit Quote</h4>
</div>
<div class="modal-body">

<?php
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

<?php

$this->renderPartial('_formEditQuote', array('opQuote'=>$opQuote,'quote'=>$quote,'opdata'=>$opdata,'acrefdata'=>$acrefdata,'acdata'=>$acdata,'legs'=>$legs));
?>
</div>
<!-- modal-body -->