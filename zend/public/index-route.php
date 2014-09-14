<?php

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

//$front->setParam('noErrorHandler', true);
//$front->setControllerDirectory(	array(
//	'photo' => APPLICATION_PATH . '/photo/controllers',
//));

#方法1:从前端控制器获取
$router = $front->getRouter();
#方法2:实例化路由协议
//$router = new Zend_Controller_Router_Rewrite();

#1.设置路由协议（标识符:|*：当只有:时，无法继续传递其它参数，在路径中添加*后可以有传入参数）
$route = new Zend_Controller_Router_Route(
	'name/:username/*', #设置匹配的路径
	array(
		'controller' => 'log', #对应logController
		'action' => 'table',	#对应action
		'username' => '二狗'	#设置默认名称
));

#使用路由器装载路由协议
$router->addRoute('myRouter', $route);

//二、正则创建新路由(可以再装载一个)
$route1 = new Zend_Controller_Router_Route(
	'name/:username',
	array(
		'controller' => 'log',
		'action' => 'table'
	),
	array(
		#'username' => '[a-zA-Z_-0-9]+' #通过正则配置协议
		'username' => '\d+'	#只接收数值
	)
);

$router->addRoute('logPreg', $route1);

#三、标准路由协议
$routeStatic = new Zend_Controller_Router_Route_Static(
	'food/bread',
	array(
		'controller' => 'route',
		'action' => 'static'
	)
);

$router->addRoute('statictest', $routeStatic);


#四、正则路由协议
$routePreg = new Zend_Controller_Router_Route_Regex(
	'product/([a-zA-Z-_0-9]+)',
	array(
		'controller' => 'route',
		'action' => 'preg'
	),

	#处理变量1,为其定义变量名,加入第三个参数
	array(
		1 => 'param'
	),
	//重写路由协议(反向重写， 参考sprintf)
	'product/%s'
);

$router->addRoute('routePreg', $routePreg);

#五、正则路由配置实例（将旧URL跳转到新的URL）
//old url http://storefront/products.php/category/{categoryID}/product/{productID}
//new url http://storefront/product/{categoryName}/{productID}-{productIdent}.html

//old url路由
$preg1 = new Zend_Controller_Router_Route_Regex(
	'product.php/category/(\d+)/product/(\d+)',
	array(
		'controller' => 'route',
		'action' => 'oldproduct'
	),
	array(
		1 => 'catId',
		2 => 'proId'
	)
);

$router->addRoute('preg1', $preg1);


$preg2 = new Zend_Controller_Router_Route_Regex(
	'product/([a-zA-Z0-9_-]+)/(\d+)-([a-zA-Z0-9_-]+).html',
	array(
		'controller' => 'route',
		'action' => 'newproduct',
	),	
	array(
		1 => 'categoryIdent',
		2 => 'proId',
		3 => 'productIdent'
	),
	#重写路由协议
	'product/%s/%d-%s.html'
);

$router->addRoute('preg2', $preg2);

#六、主机域名路由协议(一个主域名，多个子域名)
$hostRoute = new Zend_Controller_Router_Route_Hostname(
	':username.domain.com',
	array(
		'controller' => 'route',
		'action' => 'account'
	),
	array(
		'username' => '(?!.*www)[a-zA-Z0-9_-]'
	)
);
$router->addRoute('myAccount', $hostRoute);




########当前对模块设置路由协议还未实现
//$route = new Zend_Controller_Router_Route(
//	'image/:ident',
//	array(
//		'controller' => 'photo_album',
//		'action' => 'front',
//	)
//);
//$router->addRoute('myphoto', $route);

//$front->dispatch();

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
