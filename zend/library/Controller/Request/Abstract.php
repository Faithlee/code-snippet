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
	/*{{{public function getControllerName()*/

	#retrieve the controller name
	public function getControllerName()
	{
		if (null === $this->_controller) {
			$this->_controller = $this->getParam($this->getControllerKey());
		}

		return $this->_controller;
	}
	
	/*}}}*/
	/*{{{public function setControllerName()*/
	
	#set the controller name to use
	public function setControllerName($value)
	{
		$this->_controller = $value;	
	}

	/*}}}*/
	/*{{{public function getActionName()*/

	#retrieve the action name
	public function getActionName()
	{
		if (null === $this->_action) {
			$this->_action = $this->getParam($this->getActionKey());
		}

		return $this->_action;
	}

	/*}}}*/
	/*{{{public function setActionName()*/

	#set the action name
	public function setActionName($value)
	{
		$this->_action = $value;	

		#设置参数
		if (null === $value) {
			$this->setParam($this->getActionKey(), $value);
		}

		return $this;	
	}

	/*}}}*/
	/*{{{public function getModuleKey()*/

	#retrieve the module
	public function getModuleKey()
	{
		return $this->_moduleKey;
	}

	/*}}}*/
	/*{{{public function setModuleKey()*/

	public function setModuleKey($key)
	{
		$this->_moduleKey = (string)$key;

		return $this;
	}

	/*}}}*/
	/*{{{public function getControllerKey()*/
	
	#retrieve the controller key
	public function getControllerKey()
	{
		return $this->_controllerKey;	
	}
	
	/*}}}*/
	/*{{{public function setControllerKey()*/

	#set the controller key
	public function setControllerKey($value)
	{
		$this->_controllerKey = (string)$value;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getActionKey()*/

	#get action key
	public function getActionKey()
	{
		return $this->_actionKey;	
	}

	/*}}}*/
	/*{{{public function setActionKey()*/

	#set action key
	public function setActionKey($key)
	{
		$this->_actionKey = (string) $key;

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
	/*{{{public function getUserParams()*/
	
	#retrieve only user define params
	public function getUserParams()	
	{
		return $this->_params;
	}
	
	/*}}}*/
	/*{{{public function getUserParam()*/

	public function getUserParam($key, $default = null) 
	{
		if (isset($this->_params[$key]) {
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
	/*{{{public function getParams()*/
	
	public function getParams()
	{
		return $this->_params;	}	
	
	/*}}}*/
	/*{{{public function setParams()*/
	
	public function setParams(array $array)
	{
		$this->_params = $this->_params + (array)$array;
		foreach ($this->_params as $key => $value) {
			if (null === $value) {
				unset($this);
			}
		}
	
		return $this;
	}
	
	/*}}}*/
	/*{{{public function clearParams()*/

	public function clearParams()	
	{
		$this->_params = null;	

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setDispatched()*/

	public function setDispatched()
	{
		$this->_dispatched = $flag ? true : false;

		return $this;
	}

	/*}}}*/
	/*{{{public function isDispatched()*/
	
	public function isDispatched()
	{
		return $this->_dispatched;
	}

	/*}}}*/
}
