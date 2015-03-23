<?php
if(is_object($quotes)):
	
	echo ("<div align='left' style='font-size: 1.5em; color: #333;'>" . $headerMessage . ":</div>");
	
	$columns = array(array('header'=>'Depart','name'=>'dep_arp','value'=>'($data->dep_arp == "") ? "near " . $data->dep_address : $data->dep_arp'),array('header'=>'At','name'=>'dep_time','value'=>'trim($data->dep_time)'),array('header'=>'Arrive','name'=>'arr_arp','value'=>'($data->arr_arp == "") ? "near " . $data->arr_address : $data->arr_arp'),array('header'=>'Travelers','name'=>'num_trav','value'=>'$data->num_trav'),array('class'=>'CButtonColumn','template'=>'{view}','viewButtonUrl'=>'Yii::app()->createUrl("' . $action . '", array("id"=>$data["id"]))'));
	
	$buyer = ''; // <div align=\"left\" style=\"padding-left:4em; font-size: 1em; background-color: #E5F1F4; color: #333;\">".$data[\'buyer\']."</div>';
	
	$this->widget('ext.groupgridview.GroupGridView', array('id'=>'quotes-grid','dataProvider'=>$quotes,'enablePagination'=>false,'columns'=>$columns,'extraRowColumns'=>'dep_arp','extraRowPos'=>'below','extraRowExpression'=>'"' . $buyer . '"'));


else:
	
	if(is_object($quotes)) echo "<h3>" . $emptyMessage . "</h3>";


endif;
?>
