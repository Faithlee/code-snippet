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

	/*{{{public function __construct()*/

	public function __construct(array $params = array())
	{
		$this->setParams($params);
	}

	/*}}}*/
	//todo router process and route
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

}





