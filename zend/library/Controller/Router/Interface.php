<?php
/**
 * @FileName: Interface.php
 * @Desc: router interface
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 28 Sep 2014 12:21:24 AM CST
 */

interface Zend_Controller_Router_Interface {
	/*{{{public function route()*/
	
	#process a request and set its controller and action
	public function route(Zend_Controller_Request_Abstract $dispatcher);
	
	/*}}}*/
	/*{{{public function assemble()*/
	
	//todo 
	public function assemble($userParams, $name = null, $reset = false, $encode = true);
	
	/*}}}*/
	/*{{{public function getFrontController()*/

	#retrieve Front Controller
	public function getFrontController();
	
	/*}}}*/
	/*{{{public function setFrontController()*/

	public function setFrontController(Zend_Controller_Front $controller);

	/*}}}*/
	/*{{{public function setParam()*/

	public function setParam($name, $value);
	
	/*}}}*/
	/*{{{public function setParams()*/

	#set an array of a paramters to pass to helper object 
	public function setParams(array $params);
	
	/*}}}*/
	/*{{{public function getParam()*/

	public function getParam($name);
	
	/*}}}*/
	/*{{{public function getParams()*/
	
	#retrieve the parameters  to helper object constructors
	public function getParams();

	/*}}}*/
	/*{{{public function clearParams()*/
	
	#clear the controller parameter stack
	public function clearParams($name = null);

	/*}}}*/
}
