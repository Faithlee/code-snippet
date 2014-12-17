<?php
/**
 * @FileName: index.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 12:33:22 AM CST
 */

error_reporting(E_ALL);
ini_set('display_errors', 'On');

//全局路径
define('PUBLIC_SWAN', '/usr/local/dev_swan/web/swan/');

define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../'));
define('APPLICATION_LIB', APPLICATION_PATH . '/application/library');

set_include_path(
	APPLICATION_PATH . '/application' . PATH_SEPARATOR . 
	PUBLIC_SWAN . PATH_SEPARATOR .
	get_include_path()
);

//注册全局类/本地类
$loader = Yaf_Loader::getInstance(APPLICATION_LIB, PUBLIC_SWAN);
$loader->registerLocalNamespace('Template');

$config = APPLICATION_PATH . '/conf/application.ini';
$app = new Yaf_Application($config);
$app->bootstrap()->run();
