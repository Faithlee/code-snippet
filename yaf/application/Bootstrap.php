<?php
/**
 * @FileName: Bootstrap.php
 * @Desc: bootstrap引导程序，提供了一个全局配置入口
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 12:30:43 AM CST
 */

class Bootstrap extends Yaf_Bootstrap_Abstract {
	/*{{{public function _initConfig()*/

	#注册配置文件
	public function _initConfig()
	{
		$config = Yaf_Application::app()->getConfig();

		Yaf_Registry::set('config', $config);
	}

	/*}}}*/
	/*{{{public function _initRouteStatic()*/
	
	#默认路由协议
	public function _initRouteStatic(Yaf_Dispatcher $dispatcher)
	{
		echo '默认路由协议:' . __METHOD__ . '<br/>';
	}
	
	/*}}}*/
	/*{{{public function _initRouteSimple()*/

	public function _initRouteSimple(Yaf_Dispatcher $dispatcher)
	{
		#基于query string的请求，其中m默认时可以省略: /index.php?m=index&c=request&a=http
		$router = $dispatcher->getRouter();

		$route = new Yaf_Route_Simple('m', 'c', 'a');
		$router->addRoute('simple', $route);
	}
	
	/*}}}*/
	/*{{{public function _initRouteSupervar()*/
	
	#通过query_string获取路由信息，如/index.php?r=/index/request/http/name/lilei/age/23
	public function _initRouteSupervar(Yaf_Dispatcher $dispatcher)
	{
		$route = new Yaf_Route_Supervar('r');
		$router = $dispatcher->getRouter();
		
		$router->addRoute('supervar', $route);
	}
	
	/*}}}*/
	/*{{{public function _initRouteRewrite()*/

	#标识：':'、'*'
	public function _initRouteRewrite(Yaf_Dispatcher $dispatcher)
	{
		$router = $dispatcher->getRouter();
		
		/*
		#协议:products/:ident,如/products/apple
		$route = new Yaf_Route_Rewrite(
			'products/:ident', 
			array(
				'controller' => 'router',
				'action' => 'rewrite'
			)
		);
		*/
		#协议:products/:ident/*, 如:
		$route = new Yaf_Route_Rewrite(
			'products/:ident/*',
			array(
				'controller' => 'router',
				'action' => 'rewrite'
			)
		);

		$router->addRoute('rewrite', $route);
	}
	
	/*}}}*/
	/*{{{public function _initRouteRegex()*/

	public function _initRouteRegex(Yaf_Dispatcher $dispatcher)
	{
		echo "加载路由协议:" . __METHOD__ . "<br/>";
		$router = $dispatcher->getRouter();

		#获取配置信息
		#$config = Yaf_Registry::get('config');
		
		#$router->addConfig($config->routes);

		#print_r($router->getCurrentRoute());

		$route = new Yaf_Route_Regex(
			'#product/([a-zA-Z-_0-9]+)#',
			array(
				'controller' => 'router',
				'action' => 'regex',
			),
			array( 1 => 'var')
		);

		$router->addRoute('regex', $route);
	
	}
	
	/*}}}*/
	/*{{{public function _initRouteConfig()*/

	#通过配置文件设置路由
	public function _initRouteConfig(Yaf_Dispatcher $dispatcher)
	{
		$config = Yaf_Registry::get('config');

		$router = $dispatcher->getRouter();
		
		#使用时开启配置的注释
		#$router->addConfig($config->routes);
	}
	
	/*}}}*/
	/*{{{public function _initPlugin()*/
	
	#注册一个插件
	public function _initPlugin(Yaf_Dispatcher $dispatcher)
	{
		echo '1. initPlugin was called! All route and dispatch plugins begin to be called! <br/>';

		$plugin = new UserPlugin();
		$dispatcher->registerPlugin($plugin);

		echo 'initPlugin was called end!<br/>';
		echo '========================<br/>';
	}
	
	/*}}}*/
	/*{{{public function _initDefaultName()*/

	public function _initDefaultName(Yaf_Dispatcher $dispatcher)
	{
		$dispatcher->setDefaultModule('Index')->setDefaultController('Index')->setDefaultAction('Index');
	}
	
	/*}}}*/
	/*{{{public function _initView()*/

	public function _initView(Yaf_Dispatcher $dispatcher)
	{
		#引用自身类
		#$test = new Foo_Bar();
		#print_r($test->getData());
		$view = new Template();
		$dispatcher->setView($view);
		//print_r($view);die;
	}

	/*}}}*/
	/*{{{public function _initDb()*/

	#DB库配置
	public function _initDb(Yaf_Dispatcher $dispatcher)
	{
		$config = Yaf_Registry::get('config');
		$adapter = $config->resource->db;
		$db = Zend_Db::factory($adapter);
		Zend_Db_Table::setDefaultAdapter($db);
	}
	
	/*}}}*/
}
