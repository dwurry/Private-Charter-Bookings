<?php
if(!isset($color)) $color = ColorUtils::BLUE_SET();

if(is_object($aircraftList)):
	
	echo "<p>&nbsp;</p>";
	echo "<fieldset>";
	echo "<legend>" . $headerMessage . ":</legend>";
	
	if(isset($aircraftList->rawData[0]['mfr'])){
		echo "<div class='row buttons'>";
		echo "<p>&nbsp;</p>";
		$form = $this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl('/co/coReviewBids/' . $quote['id'])));
		echo CHtml::submitButton('Submit Aircraft to Customer (This action is not-undoable)', array('name'=>'submitBids','style'=>'float: left; color: green;'));
		$this->endWidget();
		echo "<p>&nbsp;</p>";
		echo "<div/>";
	}
	
	// NOTE: There are two queries feeding this form and their columns are either named differently
	// or they are not present in one query or the other. Thus we put together colums with
	// if statements.
// 	if(!isset($aircraftList->rawData[0]['flight_mins'])){ 	// just showing aircraft data -- view aircraft setup
// 		$columns[] = array('class'=>'CButtonColumn','template'=>'{view}','buttons'=>array('view'=>array('label'=>'View Aircraft','url'=>'Yii::app()->createUrl("operatorAircraft/editn", array("id"=>$data["id"]))')),'headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
// 	}else{ 	// showing quote data -- edit and remove bids
		$columns[] = array('class'=>'CButtonColumn','template'=>'{update}{delete}',
						   'buttons'=>array('update'=>array('label'=>'Edit Quote Data',
															'url'=>'Yii::app()->createUrl("/co/editQuote/", array("id"=>$data["bid_id"]))'),
											'delete'=>array('label'=>'Remove Aircraft from Consideration',
															'url'=>'Yii::app()->createUrl("/co/removeFromQuote/", array("id"=>$data["bid_id"]))')),
						   'headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
// 	}
	$columns[] = array('header'=>'N #','name'=>'n_number','value'=>'$data["n_number"]','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	$columns[] = array('header'=>'Serial #','name'=>'serial_number','value'=>'$data["serial_number"]','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	
	if(isset($aircraftList->rawData[0]['mfr'])) $columns[] = array('header'=>'Mfr','name'=>'mfr','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	else $columns[] = array('header'=>'Mfr','name'=>'operator_aircraft_ref.mfr','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['model'])) $columns[] = array('header'=>'Model','name'=>'model','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	else $columns[] = array('header'=>'Model','name'=>'operator_aircraft_ref.model','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['home_airport'])) $columns[] = array('header'=>'Home','name'=>'home_airport','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['cost_per_hour'])) $columns[] = array('header'=>'Cost/Hour','name'=>'cost_per_hour','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['range'])) $columns[] = array('header'=>'Range','name'=>'range','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['speed'])) $columns[] = array('header'=>'Speed','name'=>'speed','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['no_seats'])) $columns[] = array('header'=>'Seats','name'=>'no_seats','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	
	if(isset($aircraftList->rawData[0]['flight_mins'])) $columns[] = array('header'=>'Flight Minutes','name'=>'flight_mins','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['flight_cost'])) $columns[] = array('header'=>'Flight Costs','name'=>'flight_cost','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['overnights'])) $columns[] = array('header'=>'Nights','name'=>'overnights','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['overnight_fees'])) $columns[] = array('header'=>'Overnight Costs','name'=>'overnight_fees','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['fet'])) $columns[] = array('header'=>'Fed Excize Tax','name'=>'fet','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	if(isset($aircraftList->rawData[0]['total_cost'])) $columns[] = array('header'=>'Total /w Margin & Fees','name'=>'total_cost','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	
	$columns[] = array('header'=>'     ','type'=>'raw','name'=>'image','value'=>'CHtml::image(UploadImage::getImageUrl($data["id"], $data["n_number"].\'_1\', 300, 300), "N ".$data["n_number"])','headerHtmlOptions'=>array('class'=>'header_' . $color['name']));
	
	$this->widget('zii.widgets.grid.CGridView', array('id'=>'ac-grid','dataProvider'=>$aircraftList,'enablePagination'=>false,'columns'=>$columns,'summaryText'=>'','selectableRows'=>0,'rowCssClassExpression'=>'($row%2 ? "even" : "odd").\'_\'.\'' . $color['name'] . '\''));


else:
	?>
<h3>No Aircraft Availble</h3>
<?php endif; ?>
