<?php

// AUTHORIZATION BASED ON NUMBER
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('findn', 'addn', 'viewbyn', 'editn'),
				'expression'=>'$user->level >= 50'
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index', 'admin','delete','create','view'),
				'expression'=>'$user->level >= 100'
			),

// GET LOGGED IN USERS ID
$userobj = User::model()->findByPk(Yii::app()->user->getId());

// THEN GET DATA FROM THAT
$opid = $userobj->operator_id;

// SET SUCCESS FLASH IN CONTROLLER
Yii::app()->user->setFlash('success', "Update Successful");

// SHOW FLASH IN VIEW
foreach(Yii::app()->user->getFlashes() as $key=>$message){
	echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
}

// CHECK USER LEVEL IN CONTROLLER
if(Yii::app()->user->level >= 100){
	$adminCheck = "You are an admin.";
}else{
	$adminCheck = "Not an admin.";
}

// INCLUDE OPERATOR SIDE NAV IN VIEW
$this->renderPartial('/co/sideNavInc');

// GET USER ID
Yii::app()->user->getId() (built in function)
or
Yii::app()->user->id (gets from setState when logged in)

// CHANGE FORM LABEL


echo $form->labelEx($model, 'dep_time', array('label'=>'Departure Time (yyyy-mm-dd hh:mm:ss)'));

// ECHO FROM CONTROLLER
header('Content-type: text/plain');
print_r($var);
exit();

// CUSTOM FORM FIELDS
*** See OperatorAircraftController->actionAddN

// INSERT JS
Yii::app()->clientScript->registerScript('script', <<<JS
    javascript code goes here
JS
, CClientScript::POS_READY);