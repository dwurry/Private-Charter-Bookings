<div class="modal-header">
	<h4 class="modal-title"></h4>
</div>
<div class="modal-body">
<?php
$actionDelete = 'Yii::app()->createUrl("/user/deleteCrmLink/".$data[\'crm_id\'])';
$actionEdit = 'Yii::app()->createUrl("/user/travelerEntry/".$data[\'id\'])';
$actionView = 'Yii::app()->createUrl("/user/travelerEntry/".$data[\'id\'])';

$this->renderPartial('../user/_customerList', array('customers'=>$customers,
													'headerMessage'=>'Customers',
													'emptyMessage'=>'No Customers Associated with this account',
													'buttonText'=>'New Customer',
													'actionDelete'=>$actionDelete, 'actionEdit'=>$actionEdit, 'actionView'=>$actionView,));

?>
</div>
<!-- modal-body -->

