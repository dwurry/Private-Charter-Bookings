<?php
/* @var $this OperatorAircraftController */
/* @var $model OperatorAircraft */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#operator-aircraft-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title">Manage Operator Aircrafts</h4>
	</div>
	<div class="modal-body">

<?php
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}
?>

<p>
			You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>,
			<b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the
			beginning of each of your search values to specify how the comparison
			should be done.
		</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
<?php

$this->renderPartial('_searchfindn', array('model'=>$model));
?>
</div>
		<!-- search-form -->

<?php

$this->widget('zii.widgets.grid.CGridView', array('id'=>'operator-aircraft-grid','dataProvider'=>$model->search(),'filter'=>$model,'columns'=>array(
		// 'id',
		'n_number',
		/*
		'serial_number',
		'mfr_mdl_code',
		'eng_mfr_mdl',
		'year_mfr',
		'type_registrant',
		'name',
		'street',
		'street2',
		'city',
		'state',
		'zip_code',
		'region',
		'county',
		'country',
		'last_action_date',
		'cert_issue_date',
		'certification',
		'type_aircraft',
		'type_engine',
		'status_code',
		'mode_s_code',
		'fract_owner',
		'air_worth_date',
		'other_names_1',
		'other_names_2',
		'other_names_3',
		'other_names_4',
		'other_names_5',
		'expiration_date',
		'unique_id',
		'kit_mfr',
		'kit_model',
		'mode_s_code_hex',
		'operator_id',
		*/
        array('class'=>'CButtonColumn','template'=>'{view}','buttons'=>array('view'=>array('label'=>'View Aircraft','url'=>'Yii::app()->createUrl("operatorAircraft/addn", array("id"=>$data->id))'))))));
?>
</div>
	<!-- modal-body -->