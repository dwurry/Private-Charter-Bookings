<?php if(isset($color)){ ?>

<style>

.grid-view table.items th<?php echo '.header_'.$color["name"];?>{
	color: white;
	background: url("bg.gif") repeat-x scroll left top <?php echo $color['header']?>;
	text-align: center;
}

.grid-view table.items th<?php echo '.header_'.$color["name"];?> a {
	color: #EEE;
	font-weight: bold;
	text-decoration: none;
}

.grid-view table.items tr.even<?php echo '_'.$color["name"];?>, .grid-view table.items div.even<?php echo '_'.$color["name"];?>{
	background: <?php echo $color['even']?>;
	border-style: solid;
	border: 0;
	border-color:<?php echo $color['even']?>;
}

.grid-view table.items tr.odd<?php echo '_'.$color["name"];?>, .grid-view table.items div.odd<?php echo '_'.$color["name"];?>{
	background: <?php echo $color['odd']?>;
	border-style: solid;
	border: 0;
	border-color: <?php echo $color['odd']?>;
}
</style>
<?php 
}  // if(isset($color))
?>
<?php	

    $depColumn = '<div class=\"booking-item-departure\">
					<i class=\"fa fa-plane fa-2x\" style =\"display: inline-block; max-width:  30px; margin-right:  4px; margin-top: 3px\"></i>
					<div style =\"display: inline-block; margin-right:  10px; margin-top:  -12px;\">
						<h5>".$data["dep_time"]."</h5>
						<p style=\"margin-top: -12px;\">".$data["dep_date"]."</p>
					</div>
					<p style=\"margin-top: -12px;\">".$data["dep_arp"]."</p>
				   </div>';

    $arrColumn = '<div class=\"booking-item-departure\">
					<i class=\"fa fa-plane fa-flip-vertical fa-2x\" style =\"display: inline-block; max-width:  30px; margin-right:  4px; margin-top: 3px\"></i>
					<div style =\"display: inline-block; margin-right:  10px; margin-top:  -12px;\">
						<h5>".$data["arr_time"]."</h5>
						<p style=\"margin-top: -12px;\">".$data["arr_date"]."</p>
					</div>
					<p style=\"margin-top: -12px;\">".$data["arr_arp"]."</p>
				   </div>';
    $thirdColumn = '<div class=\"booking-item-flight-duration\">
						<i class=\"fa fa-clock-o fa-2\" style =\"display: inline-block; max-width:  30px; margin-right:  4px; margin-top: 3px\"></i>
						<h5 style =\"display: inline-block; margin-right:  10px; margin-top:  -12px;\">".$data["flight_time"]."</h5>
					</div>
					<div style=\"display: inline-block;\">
						<i class=\"fa fa-user fa-2\" style=\"display: inline-block; max-width:  30px; margin-right:  4px; margin-top: 3px\"></i>
						<h5 style =\"display: inline-block; margin-right:  10px; margin-top:  -12px;\">".$data["num_trav"]."</h5>
					</div>';
    
    
	if (isset($color)){
		$fieldsetStyle = ' style = "border-color: '.$color['header'].';"';
		$legendStyle   = ' style = "background-color: '.$color['header'].';"';
		$headerColor = array('class'=>'header_'.$color['name']);
		$oddEvenRowColor = '$data[\'css_class\'].\'_\'.\''.$color['name'].'\'';
	} else {
		$oddEvenRowColor = '(row%2 ? "odd" : "even" )';		
	}
 	echo '<fieldset'.$fieldsetStyle.'>';
// 	echo '<fieldset>';
	echo '<legend'.$legendStyle.'>&nbsp;&nbsp;&nbsp;'. $headerMessage .'&nbsp;&nbsp;&nbsp;</legend>';
	echo "<div style='display: block; width: 100%; max-height: 300px; overflow-y: auto;'>";
	
	$columns[] = array('name' => 'dep_arp','type'=>'raw', 'value' => '"'.$depColumn.'"');
	$columns[] = array('name' => 'arr_arp', 'type'=>'raw', 'value'=>'"'.$arrColumn.'"');
	$columns[] = array('name' => 'info', 'type'=>'raw', 'value'=>'"'.$thirdColumn.'"');
	$mergeColumns[] = 'num_trav';
	
	if(isset($displayDistance) && $displayDistance==true){
		$columns[] = array('header'=>false, 'name'=>'dist', 'value'=>'$data["dist"]',
						'headerHtmlOptions'=>$headerColor,);
		$index=$legs->rawData[0]['trip'];
		if(isset($index)) $sumDistance = Leg::getSumOfDistances($index);  // fix me:  Why is $index null some times?
		$displayDistance = '<div class=\"".$data[\'css_class\']."_"."'.$color['name'].'"."\" align=\"left\" style=\"padding-left:4em; font-size: 1em;\">Total Distance (NM):&nbsp&nbsp&nbsp&nbsp'.$sumDistance.'</div>';
	}
	
	if(isset($action)){
		$columns[] =
		array('class' => 'CButtonColumn', 'template' => '{view}',
				'viewButtonImageUrl' => Yii::app()->baseUrl . '/css/images/' . 'gr-view.png',
				'viewButtonUrl' => 'Yii::app()->createUrl("' . $action . '", array("id"=>$data["trip"]))',
		 		'headerHtmlOptions'=>$headerColor,);
		$mergeColumns[] = 'button';
	}
	
	$buyer = '<div class=\"".$data[\'css_class\']."_"."'.$color['name'].'"."\" align=\"left\" style=\"padding-left:4em; font-size: 1em;\">".$data[\'buyer\']."</div>';
	if(isset($legs))
		$this->widget ( 'ext.groupgridview.GroupGridView', array (
				'id' => 'quotes-grid',
				'dataProvider' => $legs,
				'hideHeader' => true,
				'enablePagination' => false,
				'columns' => $columns,
				'mergeColumns' => $mergeColumns,
				'rowCssClassExpression'=>$oddEvenRowColor,
				'extraRowColumns' => 'trip',
				'extraRowPos' => 'below',
				'extraRowExpression' => '"'.$buyer.$displayDistance.'"',
				'summaryText'=>'',
				'selectableRows' => 0,
		));
	else
		echo $emptyMessage;
	echo "</div>";  // Inner scroll div...
?>
