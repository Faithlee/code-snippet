<?php
/**
 * @FileName: Plugins.php
 * @Desc: 自定义实现一个插件
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 11:48:46 PM CST
 */


class Plugins extends Yaf_Plugin_Abstract {
	#插件可以定义7个hook，分别是routeStartup、routeShutdown、dispatchStartup、preDispatche、postDispatche、dispatchShutdown
	/*{{{public function routeStartup()*/

	#路由开始
	public function routeStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
	{
			
	}

	/*}}}*/
	/*{{{public function routeShutdown()*/

	public function routeShutdown(Yaf_Request_Abstract $request, Yaf_Response_Abstract $respose)
	{
	
	}
	
	/*}}}*/
	/*{{{public function dispatchStartup()*/

	public function dispatchStartup(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
	{
	
	}
	
	/*}}}*/
	/*{{{public function preDispatch()*/

	public function preDispatch(Yaf_Request_Abstract $request, Yaf_Response_Abstract $response)
	{
	
	}
	
	/*}}}*/
}
