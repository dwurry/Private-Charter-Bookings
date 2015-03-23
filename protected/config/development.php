<?php

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Private Air Book',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
// 		'bootstrap.*',
//         'bootstrap.components.*',
//         'bootstrap.behaviors.*',
//         'bootstrap.helpers.*',
//         'bootstrap.widgets.*'			
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class' => array('boostrap.gii'),
			'password'=>'giipw',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
		'cal' => array('debug' => true),), // For first run only!

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		'boostrap' => array(
            'class'=> 'boostrap.components.BsApi'
        ),

		
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/		
		
		// uncomment the following to use a MySQL database
		
		// DEV
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=lyfft_db',
			'emulatePrepare' => true,
			'username' => 'lyfft_dbu',
			'password' => 'adfEgty64!hw35#Gbu54&s3eRga',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'info',
                    'logFile'=>'info.log',
                    'maxLogFiles'=>10
                ),
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'trace',
                    'logFile'=>'trace.log',
                    'maxLogFiles'=>10
                ),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
		'utility'=>array('class'=>'Utility'),
		'clientScript' => array('scriptMap' => array('jquery.js' => false, )),
	),
	
	'aliases' => array(
        'bootstrap' => 'ext.bootstrap'
    ),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'msigler9@gmail.com',
		'braintreeapi'=>array(
                    'environment'   => 'sandbox',
                    'merchant_id'    => 'rhbp25kgxkcnhpmm',
                    'public_key'     => '24x38b2zbs9ys4y9',
                    'private_key'    => 'c87894424439f0e9cfd9af7ebe79e123',
    				'clientside_key'=> 'MIIBCgKCAQEA5QXweejFhr56Q67bhvHfd3yQHRkEovb5wMbutXD87w2QTwrlnV9suAU5lqQ8/nU3GC0B4zbmlg5QmSD6o5wD5kwN11eBuYE9yAo4llWpRBVVPpELPb8Mp6DxMQDdgEiX+W9nbRWOSkXTbg6/xtxzxxGtrDN4U/OjWpv3BxsITSvuV3OmNB9BrcsLajvUn8r3pCX6xCqAKt1uCljJbyGXXwpvaCuHM7yOlpfv6PpgtJuwL0I8u0wS5OynN5lBMiwwdmvFaa/YjGpk9NabmrvOHd/YijsnA1dnjLg4/rlG7O9MW0ZDo6kDKjzbxyhRp5jHG0jRmoqmtddpR3EaaY/8dQIDAQAB'
                   ),
// 		/**
// 		* PHP requires that you set a default time zone.  However, the time zone used changes.  On development this has to be GMT.
// 		* On production it has to be UMT.  This setting controlls that.  It is called from within the app like this:
// 		* Yii::app()->params['timezone'].  
// 		* 
// 		* Setting the correct timezone looks like this:  
// 		* date_default_timezone_set(Yii::app()->params['timezone']);
// 		* This string is set to 'GMT' for development and 'UTC' on production.
// 		*/           
		'timezone'=>'GMT',
    ),
);