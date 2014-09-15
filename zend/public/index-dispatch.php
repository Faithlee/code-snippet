<?php

/**
 * study zend dispatch 
 */

error_reporting(E_ALL ^ E_NOTICE);
ini_set('display_errors', 1);
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
//$front->setControllerDirectory(array(
//	'default' => APPLICATION_PATH . '/controllers',
//));

#设置前端访问控制器
$front->setControllerDirectory(APPLICATION_PATH . '/controllers');

#获取前端控制器
$res = $front->getControllerDirectory();
//print_r($res);


//设置全局访问变量，但不明白如何调用
#$front->setParam('myGlobal', 'globalVar');

####使用前端控制器获取请求对象(无法获取，不明白原因，可以通过控制器$this->getRequest()获取)
//$request = $front->getRequest();
//var_dump($request);

$front->dispatch();

/** Zend_Application */
//require_once 'Zend/Application.php';

// Create application, bootstrap, and run
//$application = new Zend_Application(
//    APPLICATION_ENV,
//    APPLICATION_PATH . '/configs/application.ini'
//);
//$application->bootstrap()
//            ->run();
            
?>
