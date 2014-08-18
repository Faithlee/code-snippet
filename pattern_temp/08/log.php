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
$logger->info('Informational message');

//$newWriter = new Zend_Log_Writer_Stream('php://output');
//$loggerNew = new Zend_Log($newWriter);

/**
 * 测试从数组构造对象
 */

//writer 参数测试
$writerConfig = array(
	//writer参数
	'writerName' => 'Zend_Log_Writer_Stream',
	'writerNamespace' => '',
	'writerParams' => array(
		'stream' => 'log',
		'mode' => 'a',
		//'url' => ''
	),

	//filter参数格式
	'filterName' => 'Priority',
	'filterNamespace' => 'Zend_Log_Filter',

	//formatter参数格式
	'formatterName' => 'Simple',
	'formatterNamespace' => 'Zend_Log_Formatter',
);
$defaultNamespace = 'Zend_Log_Writer';
//$writeRes = $logger->_constructFromConfig('writer', $writerConfig, $defaultNamespace);
$writeRes = $logger->_constructWriterFromConfig($writerConfig);

//var_dump($writeRes);
$logger->addWriter($writeRes);


//filter参数测试
$filterConfig = array(
	'filterName' => 'Zend_Log_Filter_Priority',
	'filterNamespace' => '',
	'filterParams' => array(
		//'priority' => 1,
		//'operator' => '<='
	),
);
$defaultNamespace = 'Zend_Log_Filter';
$filterRes = $logger->_constructFromConfig('filter', $filterConfig, $defaultNamespace);
//var_dump($filterRes);


//formatter参数测试
$formatterConfig = array(
	'formatterName'	=> 'Simple',#有命名空间后可以省略全路径
	'formatterNamespace' => 'Zend_Log_Formatter',
	'formatterParams' => array(
				
	),
);
$defaultNamespace = 'Zend_Log_Formatter';
$formatterRes = $logger->_constructFromConfig('formatter', $formatterConfig, $defaultNamespace);
//var_dump($formatterRes);

