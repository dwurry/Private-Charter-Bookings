<div class="modal-header">
	<h4 class="modal-title">View User</h4>
</div>
<div class="modal-body">
	<fieldset>
		<legend>User View</legend>
<?php
$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('fname','lname','username','email','company','charter_num','street','city','state','zip','phone')));
?>
</fieldset>