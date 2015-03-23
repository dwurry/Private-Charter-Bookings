<?php
/* @var $this FAAAircraftRefController */
/* @var $model FAAAircraftRef */

$this->breadcrumbs = array('Faaaircraft Refs'=>array('index'),'Manage');

$this->menu = array(array('label'=>'List FAAAircraftRef','url'=>array('index')),array('label'=>'Create FAAAircraftRef','url'=>array('create')));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#faaaircraft-ref-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Faaaircraft Refs</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>,
	<b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the
	beginning of each of your search values to specify how the comparison
	should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none">
<?php

$this->renderPartial('_search', array('model'=>$model));
?>
</div>
<!-- search-form -->

<?php

$this->widget('zii.widgets.grid.CGridView', array('id'=>'faaaircraft-ref-grid','dataProvider'=>$model->search(),'filter'=>$model,'columns'=>array('id','code','mfr','model','type_acft','type_eng',
		/*
		'ac_cat',
		'build_cert_ind',
		'no_eng',
		'no_seats',
		'ac_weight',
		'speed',
		*/
		array('class'=>'CButtonColumn'))));
?>
