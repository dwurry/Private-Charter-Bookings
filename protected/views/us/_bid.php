<?php
if(!isset($color)) $color = ColorUtils::BLUE_SET();

if(isset($color)){
	$fieldsetStyle = ' style = "border-color: ' . $color['header'] . ';"';
	$legendStyle = ' style = "background-color: ' . $color['header'] . ';"';
}

echo '<fieldset' . $fieldsetStyle . '>';
echo '<legend' . $fieldsetStyle . '>' . $headerMessage . '</legend>';

$legs = Utility::buildFlightLegsFromBid($bidId);
$flightLegs = Utility::buildFlightDataModel($legs);

$gridColumns = array(array('header'=>'Trip','name'=>'trip','headerHtmlOptions'=>array('class'=>'header_' . $color['name'])),array('header'=>'Depart','name'=>'dep_arp','headerHtmlOptions'=>array('class'=>'header_' . $color['name'])),array('header'=>'At','name'=>'dep_time','headerHtmlOptions'=>array('class'=>'header_' . $color['name'])),array('header'=>'Arrive','name'=>'arr_arp','headerHtmlOptions'=>array('class'=>'header_' . $color['name'])),array('header'=>'At','name'=>'arr_time','headerHtmlOptions'=>array('class'=>'header_' . $color['name'])),array('header'=>'Travelers','name'=>'num_trav','headerHtmlOptions'=>array('class'=>'header_' . $color['name'])));

$this->widget('ext.groupgridview.GroupGridView', array('dataProvider'=>$flightLegs,'columns'=>$gridColumns,'mergeColumns'=>array('trip','num_trav'),'summaryText'=>'','extraRowColumns'=>'trip','extraRowPos'=>'below','rowCssClassExpression'=>'$data[\'css_class\'].\'_\'.\'' . $color['name'] . '\'','extraRowExpression'=>'"<div class=\"".$data[\'css_class\']."_"."' . $color['name'] . '"."\" >' . '<div id=\"image\">".CHtml::image(UploadImage::getImageUrl($data[\'aircraft_id\'], $data[\'n_number\'].\'_1\', 200, 200), $data[\'n_number\'])."</div>' . '<div id=\"section\">' . '<p id=\"airplane\" align=\"right\">".$data[\'airplane\']."</p>' . $buyer . $breakdown . '<p style=\"line-height: 110%; font-weight: bold;\" align=\"right\">Total:&nbsp;&nbsp;&nbsp;&nbsp;".$data[\'charge_total\']."</p>' . '</div>' . $buttons . '</div>"'));
echo "</fieldset>";
?>