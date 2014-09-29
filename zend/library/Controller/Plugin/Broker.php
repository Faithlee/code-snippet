<?php
/**
 * @FileName: Broker.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 29 Sep 2014 11:22:11 PM CST
 */

require_once 'Zend/Controller/Plugin/Broker.php';

class Zend_Controller_Plugin_Broker extends Zend_Controller_Plugin_Abstract {
	
	//array of instance of objects extending Zend_Controller_Plugin_Abstract
	protected $_plugins = array();

	/*{{{public function registerPlugin()*/

	#register a plugin
	public function registerPlugin(Zend_Controller_Plugin_Abstract $plugin, $stackIndex = null)
	{
	
	}
	
	/*}}}*/
	/*{{{public function unregisterPlugin()*/
	
	#unregister a plugin
	public function unregisterPlugin($plugin)
	{
		
	}
	
	/*}}}*/
	/*{{{public function hasPlugin()*/

	#is a plugin of a particular class registered
	public function hasPlugin($class)
	{
	
	}
	
	/*}}}*/
	/*{{{public function getPlugin()*/

	#retrieve a plugin or plugins by class
	public function getPlugin($class)
	{
			
	}
	
	/*}}}*/
	/*{{{public function getPlugins()*/

	public function getPlugins()
	{
		return $this->_plugins;	
	}
	
	/*}}}*/
	/*{{{public function setRequest()*/

	public function setRequest(Zend_Controller_Request_Abstract $request)
	{
				
	}
	
	/*}}}*/
	/*{{{public function getRequest()*/

	#retrieve request
	public function getRequest()
	{
		return $this->_request;
	}

	/*}}}*/
	/*{{{public function setResponse()*/

	#set response object
	public function setResponse(Zend_Controller_Response_Abstract $response)
	{
			
	}
	
	/*}}}*/
	/*{{{public function getResponse()*/

	#retrieve the response object
	public function getResponse()
	{
	
	}
	
	/*}}}*/
	/*{{{public function routeStartup()*/
	
	#call before Zend_Controller_Front begins evaluating the request against its routes
	public function routeStartup(Zend_Controller_Request_Abstract $request)
	{
			
	}
	
	/*}}}*/
	/*{{{public function routeShutdown()*/

	#called before Zend_Controller_Front exists its iterations over the route set
	public function routeShutdown()
	{
	
	}
	
	/*}}}*/
	/*{{{public function dispatchLoopStartup()*/

	#Called before Zend_Controller_Front enters its dispatch loop
	public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
	{
	
	}
	
	
	/*}}}*/
	/*{{{public function preDispatch()*/
	
	#called before an action is dispatched by Zend_Controller_Dispatcher
	public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
	
	}
	
	/*}}}*/
	/*{{{public function postDispatch()*/

	#called after an action is dispatched by Zend_Controller_Dispatcher
	public function postDispatch(Zend_Controller_Request_Abstract $request)
	{
	
	}

	
	/*}}}*/
	/*{{{public function dispatchLoopShutdown()*/

	#called before Zend_Controller_Front exits its dispatch loop
	public function dispatchLoopShutdown()
	{
			
	}
	
	/*}}}*/
}
