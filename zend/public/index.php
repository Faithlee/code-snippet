<?php
//error_reporting(E_ALL ^ E_NOTICE);
//ini_set('display_errors', 1);
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

include 'Zend/Loader.php';
Zend_Loader::registerAutoload();

##前端控制器使用
$front = Zend_Controller_Front::getInstance();

//抛出所有的异常，不执行默认的ErrorController控制器；
$front->throwExceptions(true);
$front->setControllerDirectory(APPLICATION_PATH . '/controllers');

##根据模块进行控制器布局
$front->addModuleDirectory(APPLICATION_PATH . '/modules');


#前端控制器也注册了视图组件，默认是开启的
$front->setparam('noViewRenderer',true);

#错误插件ErrorHandler默认注册的：
$front->setParam('noErrorHandler', true);

//程序的核心部分
$front->dispatch();


/** Zend_Application */
//require_once 'Zend/Application.php';
//
//// Create application, bootstrap, and run
//$application = new Zend_Application(
//    APPLICATION_ENV,
//    APPLICATION_PATH . '/configs/application.ini'
//);
//$application->bootstrap()
//            ->run();
