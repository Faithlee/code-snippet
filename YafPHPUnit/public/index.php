<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//指向public的上一级
define("APPLICATION_PATH", realpath(dirname(__FILE__) . '/../'));

$app = new \Yaf\Application(APPLICATION_PATH . "/conf/application.ini");

#$module = $app->getModules();
#print_r($module);

$app->bootstrap()->run();
