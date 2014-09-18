<?php
/**
 * 基于三类目录前端控制器的运程流程
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);
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
    realpath(APPLICATION_PATH . '/models'),
    get_include_path(),
)));


include 'Zend/Loader.php';
@Zend_Loader::registerAutoload();

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

$front = Zend_Controller_Front::getInstance();

###基于传统目录 application/xxx 管理方式
$front->setControllerDirectory(array(
	'default' => APPLICATION_PATH . '/controllers',		#设置默认控制器路径
	'photo' => APPLICATION_PATH . '/photo/controllers', #设置传统控制器路径
	'user' => APPLICATION_PATH . '/user/controllers'	#设置传统控制器路径
));

###基于modules目录结构 application/modules/xxx 管理方式
$front->addModuleDirectory(APPLICATION_PATH . '/modules');

$front->setParam('noErrorHandler', true);

//确定用法
$front->setBaseUrl('/dwz/public');

$front->dispatch();

?>
