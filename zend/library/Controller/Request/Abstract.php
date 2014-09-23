<?php
/**
 * @FileName: Abstract.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 23 Sep 2014 11:42:40 PM CST
 */

abstract class Zend_Controller_Request_Abstract {
	/**
	 * _dispatched 
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $_dispatched = false;


	protected $_module;

	protected $_moduleKey = 'module';

	protected $_controller;

	protected $_controllerKey = 'controller';


	protected $_action;

	protected $_actionKey = 'action';


	protected $_params = array();

	/*{{{public function getModuleName()*/
	
	public function getModuleName()
	{
		if (null == $this->_module)	{
			$this->_module = $this->getParam($this->getModuleKey());
		}

		return $this->_module;
	}

	/*}}}*/
	/*{{{public function setModuleName()*/

	public function setModuleName($value)
	{
		$this->_module = $value;

		return $this;
	}
	
	/*}}}*/
	


	/*{{{public function getParam()*/

	//get an action paramter
	public function getParam($key, $default = null)
	{
		$key = (string)	$key;
		if (isset($this->_params[$key])) {
			return $this->_params[$key];
		}

		return $default;
	}
	
	/*}}}*/
	/*{{{public function setParam()*/

	#set an action parameter
	public function setParam($key, $value)
	{
		$key = (string) $key;

		if (null === $value && isset($this->_params[$key])) {
			unset($this->_params[$key]);
		} else if (null !== $value) {
			$this->_params[$key] = $value;
		}

		return $this;
	}
	
	/*}}}*/
}
