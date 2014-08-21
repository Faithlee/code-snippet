<?php
/**
 * @FileName: log.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 23 Jul 2014 12:07:23 AM CST
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL);
date_default_timezone_set('Asia/shanghai');
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/Zend');
//echo get_include_path();die;

require 'Log.php';
require 'Log/Writer/Stream.php';

$logger = new Zend_Log();
$writer = new Zend_Log_Writer_Stream('php://output');
//var_dump($writer);

$logger->addWriter($writer);

//$logger->log('Informational message', Zend_Log::INFO);

//INFO
$logger->info('Informational message');

//NOTICE
$logger->notice('Here is A Notice');

//firebug
//require 'Log/Writer/Firebug.php';
//$writer = new Zend_Log_Writer_Firebug();

//写入日志到文件
$logFile = date('Y') . '.log';
$writer = new Zend_Log_Writer_Stream($logFile);
$logger = new Zend_Log($writer);
//$logger->info('Information message');

//踩熄writer
require 'Log/Writer/Null.php';
$newWriter = new Zend_Log_Writer_Null();
$loggerNew = new Zend_Log($newWriter);
$loggerNew->log('test null', Zend_Log::NOTICE);

//测试mock
require 'Log/Writer/Mock.php';
$mock = new Zend_Log_Writer_Mock();
$loggerMock = new Zend_Log($mock);
$loggerMock->warn('Warning Message');
print_r($mock->events[0]);

//组合writers
$writer1 = new Zend_Log_Writer_Stream('log1');
$writer2 = new Zend_Log_Writer_Stream('log2');

$loggers = new Zend_Log();
$loggers->addWriter($writer1);
$loggers->addWriter($writer2);
$loggers->info('compose writer message');



