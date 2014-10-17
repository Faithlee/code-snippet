<?php
/**
 * @FileName: UserPlugin.php
 * @Desc: 自定义实现一个插件
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 11:48:46 PM CST
 */


class UserPlugin extends Yaf_Plugin_Abstract {
	#插件可以定义6个hook，分别是routerStartup、routerShutdown、dispatchLoopStartup、preDispatche、postDispatche、dispatchLoopShutdown，按照顺序被执行
	/*{{{public function routeStartup()*/

	#路由开始
	public function routerStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
	{
		echo '1. Plugin routeStartup was called!<br/>';
	}

	/*}}}*/
	/*{{{public function routeShutdown()*/

	public function routerShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $respose)
	{
		echo '2. Plugin routeShutdown was called!<br/>';
	}
	
	/*}}}*/
	/*{{{public function dispatchLoopStartup()*/

	public function dispatchLoopStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
	{
		echo '3. Plugin dispatchLoopStartup was called!<br/>';		
	}
	
	/*}}}*/
	/*{{{public function preDispatch()*/

	public function preDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
	{
		echo '4. Plugin preDispatch was called!<br/>';
	}
	
	/*}}}*/
	/*{{{public function postDispatch()*/

	public function postDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
	{
		echo '5. Plugin postDispatch was called!<br/>';
	}
	
	/*}}}*/
	/*{{{public function function dispatchLoopShutdown()*/

	public function dispatchLoopShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
	{
		echo '6. Plugin dispatchLoopShutdown was called!<br/>';
	}
	
	/*}}}*/
}
