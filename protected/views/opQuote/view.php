<?php

$this->breadcrumbs = array('Op Quote Details'=>array('index'),$model->id);

$this->menu = array(array('label'=>'List OpQuote','url'=>array('index')),array('label'=>'Create OpQuote','url'=>array('create')),array('label'=>'Update OpQuote','url'=>array('update','id'=>$model->id)),array('label'=>'Delete OpQuote','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),array('label'=>'Manage OpQuote','url'=>array('admin')));
?>

<h1>View OpQuote #<?php echo $model->id; ?></h1>

<?php

$this->widget('zii.widgets.CDetailView', array('data'=>$model,'attributes'=>array('id','quote_id','operator_id','aircraft_id','one_way_mins','roundtrip','overnights','flight_cost','overnight_fees','roundtrip_cost','total_cost')));
?>
