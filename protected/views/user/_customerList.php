<?php

if(isset($color)){
	$fieldsetStyle = ' style = "border-color: ' . $color['header'] . ';"';
	$legendStyle = ' style = "background-color: ' . $color['header'] . ';"';
	$colorExt = '_'.$color['name'];
}
echo '<fieldset'.$fieldsetStyle.'>';
echo '<legend'.$legendStyle.'>&nbsp;&nbsp;&nbsp;'. $headerMessage .'&nbsp;&nbsp;&nbsp;</legend>';
echo "<div style='display: block; width: 100%; max-height: 300px; overflow-y: auto;'>";
$columns = array(// array('header'=>'ID', 'name'=>'id'),
			array('header'=>'First Name','name'=>'fname','headerHtmlOptions'=>array('class'=>'header_' . $color['name'])),
			array('header'=>'Last Name','name'=>'lname', 'headerHtmlOptions'=>array('class'=>'header_' . $color['name'])),
			array('header'=>'Email','name'=>'email', 'headerHtmlOptions'=>array('class'=>'header_' . $color['name'])),
			array('header'=>'Phone','name'=>'phone', 'headerHtmlOptions'=>array('class'=>'header_' . $color['name'])));

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
	$baseButtonPairs['headerHtmlOptions'] = array('class'=>'header_' . $color['name']);
	$buttonGridColumnArray = array_merge($baseButtonPairs, $imageUrl, $buttonUrl);
	
	$columns[] = $buttonGridColumnArray;
}

if(isset($customers)) $this->widget('ext.groupgridview.GroupGridView', 
		array('id'=>'quotes-grid',
				'dataProvider'=>$customers,
				'enablePagination'=>false,
				'columns'=>$columns,
				'summaryText'=>'',
				'rowCssClassExpression'=>'($row%2 ? "even" : "odd").$colorExt',
		));
else echo $emptyMessage;

if(isset($buttonText) && $buttonText == 'Add Customer' || $buttonText == 'New Customer'){
	$form = $this->beginWidget('CActiveForm', array('id'=>'customerList','enableAjaxValidation'=>false));
	echo '<div class="row buttons">';
	echo '<p> </p>';
	echo CHtml::submitButton($buttonText, array('name'=>'newCustomer'));
	echo '</div>';
	echo '<p> </p>';
	$this->endWidget();
} else {
	if (isset($passengerObj) && is_a($passengerObj, 'CActiveRecord')){
		if (!isset($passengerObj['passengerEmail'])){
			$passengerObj['passengerEmail'] = '';
		}
		$list = CHtml::listData(CrmLink::getCustomers(), 'email', function ($item){
			return CHtml::encode($item['fname'] . ' ' . $item['lname'] . ' : ' . $item['email']);
		});
		$form = $this->beginWidget('CActiveForm', array('id'=>'customerList','enableAjaxValidation'=>false));
		echo '<div class="row">';
		echo $form->labelEx($passengerObj, 'passengerEmail', array('label'=>'Passenger'));
		echo CHtml::submitButton('Add Traveler', array('name'=>'addPassenger'));
		echo $form->dropDownList($passengerObj, 'passengerEmail', $list);
		echo $form->error($passengerObj, 'passengerEmail');
		echo '</div>';
		echo '<input type="hidden" name="quote_id" value="'.$passengerObj->quote_id.'" />';		
		$this->endWidget();
	}
}
echo '</div>'; // Inner scroll div...
echo '</fieldset>';
?>
