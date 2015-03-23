<?php
if(!isset($color)) $color = ColorUtils::BLUE_SET();

/**
 * _bidList defines the following parameters which can be passed in.
 * Pass in a parameter and it shows up.
 *
 * $bids		: A list of bids for which the legs are displayed here
 *
 * $actionView : URL segment to view for a view button in each row
 * $actionEdit : URL segment to edit for an edit button in each row
 * $actionDelete: URL segment to delete for a delete button in each row
 *
 * $airplaneImage: Put an image of the airplane in every row.
 *
 * $actionButton1: URL segment for a button at the top and bottom of the list
 * $actionButton2: URL segment for a button at the top and bottom of the list
 *
 * $costing		: Array of costing information for the total line.
 * $airplane	: Airplane text in the total section of the list.
 * $buyer		: Put the buyer info in the total segment of each row
 * $distance	: Put the distance info in the total segment of each row
 * $headerMessage: Message to go in as the legend for the table.
 */

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl . '/css/us.css');
if(isset($color)){
	$fieldsetStyle = ' style = "border-color: ' . $color['header'] . ';"';
	$legendStyle = ' style = "background-color: ' . $color['header'] . ';"';
}
echo '<fieldset' . $fieldsetStyle . '>';
echo '<legend' . $legendStyle . '>&nbsp;&nbsp;&nbsp;'. $headerMessage .'&nbsp;&nbsp;&nbsp;</legend>';

$legs = array();
foreach($bids as $item){
	if(is_a($item, 'Quote')){
		$item = OpQuote::model()->findByAttributes(array($item->id, OpQuote::STATUS_US_ACCEPT));
		$item = $item[0];
	}
	$action = CHtml::link('Accept This Quote', array('us/acceptQuote/','id'=>$item['id']));
	
	$legs = Utility::buildFlightLegsFromBid($item['id'], $legs, $action);
}
$flightLegs = Utility::buildFlightDataModel($legs);

$extraRowColumns = (isset($legs[0]['aircraft_id']))?'aircraft_id':'trip';

if(isset($actionEdit) || isset($actionView) || isset($actionDelete)){
	if(isset($actionEdit)) $actions['update'] = $actionEdit;
	if(isset($actionView)) $actions['view'] = $actionView;
	if(isset($actionDelete)) $actions['delete'] = $actionDelete;
	$i = 0;
	foreach($actions as $key=>$value){
		if($i == 0) $templateStr = '{' . $key . '}';
		else $templateStr = $templateStr . '{' . $key . '}';
		$imageUrl[$key . 'ButtonImageUrl'] = Yii::app()->baseUrl . '/css/images/gr-' . $key . '.png';
		$buttonUrl[$key . 'ButtonUrl'] = $value;
		$i++;
	}
	$baseButtonPairs['class'] = 'CButtonColumn';
	$baseButtonPairs['name'] = 'buttons';
	$baseButtonPairs['template'] = $templateStr;
	$buttonGridColumnArray = array_merge($baseButtonPairs, $imageUrl, $buttonUrl);
	
	$gridColumns[] = $buttonGridColumnArray;
	$mergeColumns[] = 'buttons'; // note CButtonColumn was modified so that it has the name "button" making this possible.
}

$gridColumns[] = array('header'=>'Trip','name'=>'trip','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
$gridColumns[] = array('header'=>'Depart','value'=>'$data["dep_arp"]','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
$gridColumns[] = array('header'=>'At','name'=>'dep_time','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
$gridColumns[] = array('header'=>'Arrive','value'=>'$data["arr_arp"]','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
$gridColumns[] = array('header'=>'At','name'=>'arr_time','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
$gridColumns[] = array('header'=>'Travelers','name'=>'num_trav','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));

$mergeColumns[] = 'trip';
$mergeColumns[] = 'num_trav';
$airplaneImage = 

$this->widget('ext.groupgridview.GroupGridView', 
				array('dataProvider'=>$flightLegs,
					'template'=>'{items}{pager}',
					'columns'=>$gridColumns,
					'mergeColumns'=>$mergeColumns,// array('trip','num_trav'), // , 'image'),//, 'buttons'),
					'rowCssClassExpression'=>'$data[\'css_class\'].\'_\'.\'' . $color['name'] . '\'',
					'extraRowColumns'=>$extraRowColumns,
					'extraRowPos'=>'below',
					'extraRowExpression'=>'"<div class=\"".$data[\'css_class\']."_"."' . $color['name'] . '"."\" style=\"overflow: hidden;\"  >' . 
								'<div id=\"image\">".CHtml::image(UploadImage::getImageUrl($data[\'aircraft_id\'], $data[\'n_number\'].\'_1\', 200, 200), $data[\'n_number\'])."</div>' . 
								'<div id=\"section\">' . '<p id=\"airplane\" align=\"right\">".$data[\'airplane\']."</p>' . 
									$buyer . $breakdown . 
								'<p style=\"line-height: 110%; font-weight: bold;\" align=\"right\">Total:&nbsp;&nbsp;&nbsp;&nbsp;".$data[\'charge_total\']."</p>' . '</div>' . 
									$buttons.
								'</div>"'));

echo "</fieldset>";
?>
