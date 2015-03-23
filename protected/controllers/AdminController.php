<?php
class AdminController extends Controller{
	/**
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	
	/**
	 *
	 * @return array action filters
	 */
	public function filters(){
		return array('accessControl',		// perform access control for CRUD operations
		'postOnly + delete')		// we only allow deletion via POST request
		;
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 *
	 * @return array access control rules
	 */
	public function accessRules(){
		if(Yii::app()->user->isGuest) $this->redirect(Yii::app()->createUrl('site/login'));
		
		return array(array('allow',		// allow admin user to perform 'admin' and 'delete' actions
		'actions'=>array('index','create','update','admin','delete','logInfo','stats'),'expression'=>'$user->level >= ' . User::USER_ADMIN),array('deny',		// deny all users
		'users'=>array('*')));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex(){
		$this->render('index');
	}
	
	/**
	 * Show log file.
	 */
	public function actionLogInfo(){
		$this->render('logInfo');
	}
	
	/**
	 * Show log file.
	 */
	public function actionStats(){
		$counts = array();
		
		// get claimed operators, count
		$counts["Operators"] = Operator::model()->count('claimed=:claimed', array(':claimed'=>"1"));
		// get quotes, count
		$counts["Quotes"] = Quote::model()->count();
		// get matched aircraft, total count, 0-4 counts
		$counts["CQDAll"] = OpQuote::model()->count();
		$counts["CQD0"] = OpQuote::model()->count('status=:status', array(':status'=>"0"));
		$counts["CQD1"] = OpQuote::model()->count('status=:status', array(':status'=>"1"));
		$counts["CQD2"] = OpQuote::model()->count('status=:status', array(':status'=>"2"));
		$counts["CQD3"] = OpQuote::model()->count('status=:status', array(':status'=>"3"));
		$counts["CQD4"] = OpQuote::model()->count('status=:status', array(':status'=>"4"));
		// get users, total count, each type
		$counts["UsersAll"] = User::model()->count();
		$counts["Users0"] = User::model()->count('auth_level=:auth_level', array(':auth_level'=>"0"));
		$counts["Users10"] = User::model()->count('auth_level=:auth_level', array(':auth_level'=>"10"));
		$counts["Users50"] = User::model()->count('auth_level=:auth_level', array(':auth_level'=>"50"));
		$counts["Users100"] = User::model()->count('auth_level=:auth_level', array(':auth_level'=>"100"));
		
		$this->render('stats', array('counts'=>$counts));
	}
}
