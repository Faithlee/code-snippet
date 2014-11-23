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
$app->bootstrap()->run();
