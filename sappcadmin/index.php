<?php
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('Europe/Prague');

// Define path to application directory
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../11application'));

// Define application environment
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(realpath(APPLICATION_PATH . '/../11library'),)));

/** Zend_Application */
require_once 'Zend/Application.php';
require_once 'Zend/Db.php';

// Create application, bootstrap, and run
$application = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
$application->bootstrap()->run();