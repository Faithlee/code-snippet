<?php
/**
 * @FileName: Abstract.php
 * @Desc: plugin:{object:request/response/router/dispatch}
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 28 Sep 2014 11:43:54 PM CST
 */

abstract class Zend_Controller_Plugin_Abstract {
	/*{{{menbers*/
	
	#Zend_controller_request_abstract
	protected $_request;

	#zend_controller_response_abstract
	protected $_response;

	/*}}}*/
	/*{{{public function setRequest()*/

	public function setRequest(Zend_Controler_Request_Abstract $request)
	{
		$this->_request = $request;

		return $this;
	}

	/*}}}*/
	/*{{{public function getRequest()*/

	#get request object 
	public function getRequest()
	{
		return $this->_request;	
	}

	/*}}}*/
	/*{{{public function setResponse()*/

	#set response object
	public function setResponse(Zend_Controller_Response_Abstract $response)
	{
		$this->_response = $response;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getResponse()*/

	#get response object
	public function getResponse()
	{
		return $this->_response;	
	}

	/*}}}*/
	/*{{{public function routeStartup()*/

	#called before Zend_Controller
	public function routeStartup(Zend_Controller_Request_Abstract $request)
	{}
	
	/*}}}*/
	/*{{{public function routeStartup()*/

	public function routeStartup(Zend_Controller_Request_Abstract $request)
	{}
	
	/*}}}*/
	/*{{{public function routeShutdown()*/

	#called after zend_controller_front exits from the router
	public function routeShutdown(Zen_Controller_Request_Abstract $request)
	{}

	/*}}}*/
	/*{{{public function dispatchLoopStartup()*/

	#called before zend_controller_front enters its dispatch loop
	public function dispatchLoopStartup()
	{}

	/*}}}*/
	/*{{{public function preDispatch()*/

	#called before an action is dispatched by zend_controller_dispatcher
	public function preDispatch()
	{}

	/*}}}*/
	/*{{{public function postDispatch()*/

	#called before zend_controller_front exits its dispatch loop
	public function postDispatch(Zend_Controller_Request_Abstract $request)
	{}

	/*}}}*/
	/*{{{public function dispatchLoopShutdown()*/

	#called before zend_controller_front exits its dispatch loop
	public function dispatchLoopShutdown()
	{}

	/*}}}*/
}
