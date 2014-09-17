<?php
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

include APPLICATION_PATH . '/Bootstrap.php';

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

//默认bootstrap引导程序启动
//$application->bootstrap()
//            ->run();

###原生方式设置引导程序
$bootstrap = new Bootstrap($application);
$bootstrap->bootstrap();

###下面的步骤相当于run()
$front = Zend_Controller_Front::getInstance();

$front->setParam('noViewRenderer', true);

$front->setControllerDirectory(APPLICATION_PATH . '/controllers');

$front->setParam('bootstrap', $bootstrap);

$front->dispatch();

?>
