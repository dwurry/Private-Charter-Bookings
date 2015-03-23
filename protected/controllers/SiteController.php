<?php
class SiteController extends Controller{
	/**
	 * Declares class-based actions.
	 */
	public function actions(){
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array('class'=>'CCaptchaAction','backColor'=>0xFFFFFF),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'page'=>array('class'=>'CViewAction'));
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex(){
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		
		// Verify login.
		// if loged in:
		$this->redirect(Yii::app()->createUrl('/us/index'));
		// else redirect to login
		$this->render('index');
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError(){
		if($error = Yii::app()->errorHandler->error){
			if(Yii::app()->request->isAjaxRequest) echo $error['message'];
			else $this->render('error', $error);
		}
	}
	
	/**
	 * Displays the contact page
	 */
	public function actionContact(){
		$model = new ContactForm();
		if(isset($_POST['ContactForm'])){
			$model->attributes = $_POST['ContactForm'];
			if($model->validate()){
				$name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
				$subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
				$headers = "From: $name <{$model->email}>\r\n" . "Reply-To: {$model->email}\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/plain; charset=UTF-8";
				
				mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
				Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact', array('model'=>$model));
	}
	
	/**
	 * Displays the register page
	 */
	public function actionRegister(){
		$user = new User();
		if(isset($_POST['User'])){
			$user->setAttributes($_POST['User']);
			
			// check passwords
			if($user->password != $user->password_repeat){
				$user->addError('password', 'Passwords must match.');
				$user->addError('password_repeat', 'Passwords must match.');
				Yii::app()->user->setFlash('error', 'Passwords must match.');
				return $this->render('register', array('user'=>$user));
			}
			
			// check operator number
			if($user->charter_num){
				// entered an operator number, find it
				if($operator = Operator::user()->findByAttributes(array('certificate'=>$user->charter_num))){
					// found operator number, associate it
					$user->operator_id = $operator->id;
				}
			}
			
			// generate activation code
			$user->activation_code = sha1(mt_rand(10000, 99999) . time() . $user->email);
			$user->auth_level = User::USER_US;
			
			// insert into DB
			if($user->save()){
				$to = $user->email;
				$subject = "Welcome To Lyfft!";
				$message = "Thank you for joining Lyfft.  Click the link below (or copy and paste it into your browser) to activate your account:\n\nhttp://www.lyfft.com/site/v?a=" . $user->activation_code;
				$from = "FROM: noreply@lyfft.com";
				
				mail($to, $subject, $message, $from);
				
				Yii::app()->user->setFlash('login', 'Thank you for registering!  Check your email for a verification message.');
				return $this->redirect('login', array('loginForm'=>new LoginForm()));
			}
		}
		return $this->render('register', array('user'=>$user));
	}
	
	/**
	 * Email validation landing
	 */
	public function actionV(){
		$key = Yii::app()->request->getQuery('a');
		if(isset($key)){
			// find match
			if($user = User::model()->findByAttributes(array('activation_code'=>$key))){
				$user->status = 1;
				$user->auth_level = 10;
				$user->save();
				Yii::app()->user->setFlash('success', "Email validated.  Please login above.");
				// $this->render('password',array('model'=>$user));
			}else{
				Yii::app()->user->setFlash('error', "Invalid code.");
			}
		}
		$this->render('index');
	}
	
	/**
	 * Displays the login page
	 */
	public function actionLogin(){
		$loginForm = new LoginForm();
		if(isset($loginForm->username) || $loginForm->username == 'Admin'){
			$loginForm->username = '';
			$loginForm->password = '';
		}
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form'){
			echo CActiveForm::validate($loginForm);
			Yii::app()->end();
		}
		
		// collect user input data
		if(isset($_POST['Login'])){
			$loginForm->attributes = $_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($loginForm->validate() && $loginForm->login()) 			//
			$this->redirect(Yii::app()->user->returnUrl);
		}
		if(isset($_POST['Register'])){return $this->redirect($this->createUrl('register'));}
		if(isset($_POST['RegisterComplete'])){
			$_POST['RegisterComplete'] = ''; // otherwise we loop eternally.
			$this->actionRegister();
		}
		// display the login form
		$this->render('login', array('loginForm'=>$loginForm));
	}
	
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout(){
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}