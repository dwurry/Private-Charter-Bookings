<?php
/* @var $this QuoteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array('Quotes');

$this->menu = array(array('label'=>'Create Quote','url'=>array('create')),array('label'=>'Manage Quote','url'=>array('admin')),array('label'=>'Process Quotes','url'=>array('process')));
?>

<h1>Quotes</h1>

<?php
echo "<b><p>pre</p>";
ProcessCommand::run();
echo "<p>post</p> </b>";

$this->widget('zii.widgets.CListView', array('dataProvider'=>$dataProvider,'itemView'=>'_view'));
?>