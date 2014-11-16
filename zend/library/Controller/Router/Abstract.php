<?php
/**
 * @FileName: Abstract.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 28 Sep 2014 12:37:16 AM CST
 */

require_once 'Zend/Controller/Router/Interface.php';

abstract class Zend_Controller_Router_Abstract implements Zend_Controller_Router_Interface {
	/*{{{members*/

	//front controller instance
	protected $_frontController;	

	//array of invocation parameters to use for instantiating
	prtected $_invokeParams = array();

	/*}}}*/
	/*{{{ functions*/
	/*{{{public function __construct()*/

	public function __construct(array $params = array())
	{
		$this->setParams($params);
	}

	/*}}}*/
	/*{{{public function setParam()*/

	#add or modify a parameter to use when instantiating an action controller
	public function setParam($name, $value) 
	{
		$name = (string) $name;
		$this->_invokeParams[$name]	= $value;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setParams()*/

	#set parameters to pass to action controller controllers
	public function setParams(array $params)
	{
		$this->_invokeParams = array_merge($this->_invokeParams, $params);

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getParam()*/

	public function getParam($name)
	{
		if (isset($this->_invokeParams[$name]))	{
			return $this->_invokeParams[$name];
		}

		return null;
	}
	
	/*}}}*/
	/*{{{public function getParams()*/

	#retrieve all parameters
	public function getParams()
	{
		return $this->_invokeParams;
	}
	
	/*}}}*/
	/*{{{public function clearParams()*/

	public function clearParams($name = null)
	{
		if (null === $name)	{
			$this->_invokeParams = array();
		} else if (is_string($name) && isset($this->_invokeParams[$name])) {
			unset($this->_invokeParams[$name]);
		} else if (is_array($name)){
			foreach ($name as $key) {
				if (is_string($key) && isset($this->_invokeParams[$key])) {
					unset($this->_invokeParams[$key]);
				}
			}
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getFrontController()*/

	//retrieve front controller
	public function getFrontController()
	{
		if (null != $this->_frontController) {
			return $this->_frontController;
		}

		require_once 'Zend/Controller/Front.php';
		$this->_frontController = new Zend_Controller_Front::getInstance();

		return $this->_frontController;
	}
	
	/*}}}*/
	/*{{{public function setFrontController()*/

	//set front controller
	public function setFrontController(Zend_Controller_Front $controller)	
	{
		$this->_frontController = $controller;	

		return $this;
	}
	
	/*}}}*/
	/*}}}*/
}
