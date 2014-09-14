<?php
/**
 * 通过配置文件管理路由协议 
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
    realpath(APPLICATION_PATH . '/models'),
    get_include_path(),
)));


include 'Zend/Loader.php';
@Zend_Loader::registerAutoload();

$front = Zend_Controller_Front::getInstance();

//实例化路由协议(r暂时不明白ewrite无法加载路由协议原因)
//$router = new Zend_Controller_Router_Rewrite();
$router = $front->getRouter();

#加载路由协议
$config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/router.ini', 'production');

#路由器加配置文件
$router->addConfig($config, 'routes');



/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();
            
?>
