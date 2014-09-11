<?php
/**
 * @FileName: logParam.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 21 Aug 2014 11:47:37 PM CST
 */

set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__) . '/Zend');
date_default_timezone_set('Asia/shanghai');
require 'Log.php';

$logger = new Zend_Log();

/**
 * 测试从数组构造对象
 */

//writer 参数测试
$writerConfig = array(
	//writer参数
	'writerName' => 'Zend_Log_Writer_Stream',
	'writerNamespace' => '',
	'writerParams' => array(
		'stream' => 'logTest1',
		'mode' => 'a',
		//'url' => ''
	),

	//filter参数格式
	'filterName' => 'Priority', #指定namespace后可以省略全路径
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
$logger->notice('test function and param');

die;
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

