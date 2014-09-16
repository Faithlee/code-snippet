<?php

/**
 * study zend dispatch 
 */

ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
date_default_timezone_set('Etc/GMT-8');

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    realpath(APPLICATION_PATH . '/models'),
    get_include_path(),
)));


include 'Zend/Loader.php';
@Zend_Loader::registerAutoload();

$front = Zend_Controller_Front::getInstance();

//$front->setParam('noErrorHandler', true);

#设置前端访问控制器
$front->setControllerDirectory(array(
	'default' => APPLICATION_PATH . '/controllers',
	'photo' => APPLICATION_PATH . '/photo/controllers',
	'user' => APPLICATION_PATH . '/user/controllers'
));

//$param = $front->getParam('bootstrap');
//var_dump($param);


$front->dispatch();
?>
