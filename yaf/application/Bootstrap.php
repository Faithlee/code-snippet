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
		//echo '默认路由协议:' . __METHOD__ . '<br/>';
		//对于请求/app/foo/bar/dummy/1:
		//base_uri为app，最后的被路由解析为request_uri：foo/bar/dummy/1
		
		#基于query string的请求:index.php?c=request&a=http
		$router = $dispatcher->getRouter();
		$route = new Yaf_Route_Simple('m', 'c', 'a');
		$router->addRoute('simple', $route);
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
				'controller' => 'index',
				'action' => 'demo',
			),
			array(
				1 => 'var'
			)
		);

		$router->addRoute('test', $route);
	
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
	}

	/*}}}*/
}
