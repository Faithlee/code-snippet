<?php
/**
 * @FileName: Standard.php
 * @Desc: Zend Controller Dispatcher
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 24 Sep 2014 11:33:05 PM CST
 */

require_once 'Zend/Loader.php';

require_once 'Zend/Controller/Dispatcher/Abstract.php';

class Zend_Controller_Dispatcher_Standard extends Zend_Controllers_Dispatcher_Abstract {
	
	//current dispatchable directory
	protected $_curDirectory;	

	//current module(formatted)
	protected $_curModule;

	//controller directory
	protected $_controllerDirectory = array();

	/*{{{public function __construct()*/

	public function __construct(array $params = array())
	{
		parent::_construct($params);

		$this->_curModule = $this->_getDefaultModule();
	}

	/*}}}*/
	/*{{{public function addControllerDirectory()*/

	//add a single path to the Controller directory stack
	public function addControllerDirectory($path, $module = null)
	{
		if (null === $module) {
			$module = $this->_defaultModule;
		}

		$module = (string) $module;
		#不明白路径结束/\
		$path = rtrim((string)$path, '/\\');

		$this->_controllerDirectory[$module] = $path;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setControllerDirectory()*/
	
	//set Controller directory
	public function setControllerDirectory($directory, $module = null)
	{
		//重新置空
		$this->_controllerDirectory = array();
		
		if (is_string($directory)) {
			$this->addControllerDirectory($directory, $module);
		} else if (is_array($directory)) {
			foreach ($directory as $module => $path) {
				$this->addControllerDirectory($path, $module);
			}

		} else {
			require_once 'Zend/Controller/Exception.php';

			throw new Zend_Controller_Exception('Controller directory name must be string or array!');
		}
		
		return $this;
	}

	/*}}}*/
	/*{{{public function getControllerDirectory()*/

	//get all controller or single controller directory
	public function getControllerDirectory($module = null)
	{
		if (null === $module) {
			return $this->_controllerDirectory;
		}

		$module = (string)$module;
		if (array_key_exists($module, $this->_controllerDirectory)) {
			return $this->_controllerDirectory[$module];
		}

		return null;
	}

	/*}}}*/
	/*{{{public function removeControllerDirectory()*/

	//remove a controller directory by module name
	public function removeControllerDirectory($module)
	{
		$module = (string) $module;
		if (array_key_exists($module, $this->_controllerDirectory))	{
			unset($this->_controllerDirectory[$module]);

			return true;
		}

		return false;
	}

	/*}}}*/
}
