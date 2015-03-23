<?php

/*
 * Utilities
 */
class UtilController extends Controller{
	
	/*
	 * util/run
	 */
	public function actionRun(){
		$email = "noone@nowhere.com";
		$activationcode = sha1(mt_rand(10000, 99999) . time() . $email);
		echo $activationcode;
	}
	public function actionV(){
		print_r($_GET);
	}
}
