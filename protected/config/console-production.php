<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Console Application',

	// preloading 'log' component
	'preload'=>array('log'),
	
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		/*'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		*/
		// uncomment the following to use a MySQL database
		// DEV
		'db'=>array(
			'connectionString' => 'mysql:host=lyfftdbinst.cxtxls5hkp0j.us-west-1.rds.amazonaws.com;dbname=lyfftdb',
			'emulatePrepare' => true,
			'username' => 'lyfft_dbu',
			'password' => 'adfEgty64!hw35#Gbu54&s3eRga',
			'charset' => 'utf8',
		),
		// PROD
		/*'db'=>array(
			'connectionString' => 'mysql:host=lyfftdbinst.cxtxls5hkp0j.us-west-1.rds.amazonaws.com;dbname=lyfftdb',
			'emulatePrepare' => true,
			'username' => 'lyfft_dbu',
			'password' => 'adfEgty64!hw35#Gbu54&s3eRga',
			'charset' => 'utf8',
		),*/
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);