<?php
$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl . '/css/us.css');

echo ("<p align='left' style='font-size: 1.5em; color: #333;'>" . $headerMessage . ":</p>");
$legs = array();
foreach($bids as $item){
	if(is_a($item, 'Quote')){
		$item = OpQuote::model()->findByAttributes(array('quote_id'=>item['id'], 'status'=>OpQuoteStatus));
		$item = $item[0];
	}
	$action = CHtml::link('Accept This Quote', array('us/acceptQuote/','id'=>$item['bid_id']));
	$legs = Utility::buildFlightLegsFromBid($item['bid_id'], $legs, $action);
}
$flightLegs = Utility::buildFlightDataModel($legs);

$gridColumns = array(array('header'=>'Trip','name'=>'trip'),array('header'=>'Depart','value'=>'$data["dep_arp"]'),array('header'=>'At','name'=>'dep_time'),array('header'=>'Arrive','value'=>'$data["arr_arp"]'),array('header'=>'At','name'=>'arr_time'),array('header'=>'Travelers','name'=>'num_trav') 
// array('header'=>' ', 'name'=>'image', 'type' => 'raw', 'value'=>'CHtml::image(UploadImage::getImageUrl($data["airplane_id"], $data["n_number"].\'_1\', 300, 300), "N ".$data->n_number)'),
))
;
$groupGridColumns = $gridColumns;
$groupGridColumns[] = array(array('class'=>'ButtonColumn','name'=>'buttons','value'=>'hello'),'trip'=>'$data["trip"]','name'=>'airplane_row','value'=>'$data["airplane"]','headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style'=>'display:none'));

// $image = '".$data[\'n_number\']."_1/".$data[\'airplane_id\']."';
// $image = '<img src=\"/src/imagerepo/".$data[\'airplane_id\']."/".$data[\'n_number\']."_1/300_300/image.jpg\" alt=\"".$data[\'n_number\']."\" />';
// $image = '\'CHtml::image(UploadImage::getImageUrl(".$data[\'airplane_id\'].", ".$data[\'n_number\'].", 300, 300), ".$data[\'n_number\'].")\'';

$this->widget('ext.groupgridview.GroupGridView', array('dataProvider'=>$flightLegs,'template'=>'{items}{pager}','columns'=>$gridColumns,'mergeColumns'=>array('trip','num_trav'),// , 'image'),//, 'buttons'),
'extraRowColumns'=>'trip','extraRowPos'=>'below','extraRowExpression'=>'"<div id=\"image\">".CHtml::image(UploadImage::getImageUrl($data[\'airplane_id\'], $data[\'n_number\'].\'_1\', 200, 200), $data[\'n_number\'])."</div>' . '<div id=\"section\">' . '<p id=\"airplane\" align=\"right\">".$data[\'airplane\']."</p>' . $buyer . $breakdown . '<p align=\"right\">Total:&nbsp;&nbsp;&nbsp;&nbsp;".$data[\'charge_total\']."</p>' . '</div>' . $buttons . '"'));

?>
