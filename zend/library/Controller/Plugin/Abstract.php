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
	/*{{{public function setResponse()*/

	#set response object
	public function setResponse(Zend_Controller_Response_Abstract $response)
	{
		$this->_response = $response;

		return $this;
	}
	
	/*}}}*/

	//todo router dispatch

}
