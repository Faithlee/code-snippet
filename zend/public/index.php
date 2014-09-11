<?php
/**
 * @FileName: default.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 11 Sep 2014 01:17:53 AM CST
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
    realpath(APPLICATION_PATH . '/modules'),
    get_include_path(),
)));

include 'Zend/Loader.php';
Zend_Loader::registerAutoload();

##前端控制器使用

$front = Zend_Controller_Front::getInstance();

//抛出所有的异常，不执行默认的ErrorController控制器；
$front->throwExceptions(true);

//默认目录结构的控制器
$front->addControllerDirectory(APPLICATION_PATH . '/controllers');
//$front->setControllerDirectory(APPLICATION_PATH . '/controllers');

#1.针对引申目录结构设置控制器
//$front->addControllerDirectory(APPLICATION_PATH . '/photo', 'photo');
//$front->setControllerDirectory(array(
//	'default' => APPLICATION_PATH . '/default'
//));

#2.针对引申目录结构设置控制器
$front->addModuleDirectory(APPLICATION_PATH . '/modules');

#前端控制器也注册了视图组件，默认是开启的
$front->setparam('noViewRenderer',true);

#错误插件ErrorHandler默认注册的：
$front->setParam('noErrorHandler', true);

//程序的核心部分

$front->dispatch();

//require_once 'Zend/Application.php';

// Create application, bootstrap, and run
//$application = new Zend_Application(
//    APPLICATION_ENV,
//    APPLICATION_PATH . '/configs/application.ini'
//);
//$application->bootstrap()
//            ->run();
 
