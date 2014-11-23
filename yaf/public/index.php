<?php
/**
 * @FileName: index.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 12:33:22 AM CST
 */

error_reporting(E_ALL);
ini_set('display_errors', 'On');

define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));
set_include_path(APPLICATION_PATH . '/application' . PATH_SEPARATOR . get_include_path());

$config = APPLICATION_PATH . '/conf/application.ini';

$app = new Yaf_Application($config);

$app->setAppDirectory(APPLICATION_PATH . '/applications');
#获取申明的模块名:默认是Index
var_dump($app->getModules());

#当前环境名
var_dump($app->environ());

#当前应用目录
var_dump($app->getAppDirectory());

#当前yaf_config_abstract实例
var_dump($app->getConfig());

#当前yaf_dispatcher的实例
var_dump($app->getDispatcher());



$app->bootstrap()->run();
