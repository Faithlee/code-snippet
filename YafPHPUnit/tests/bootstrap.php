<?php
/**
 * 定义全局变量
 */

error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);

//指定测试路径
define("PHPUNIT_PATH", realpath(dirname(__FILE__)));

//指定应用路径 
define("APPLICATION_PATH", PHPUNIT_PATH . '/..');

//其它变量

//$application = new \Yaf\Application(APPLICATION_PATH . '/conf/application.ini');

//$application->bootstrap()->run();
