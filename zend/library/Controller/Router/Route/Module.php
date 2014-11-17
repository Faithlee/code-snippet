<?php
/**
 * @FileName: Module.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 08 Oct 2014 05:04:35 AM CST
 */

require_once 'Zend/Controller/Router/Route/Abstract.php';

class Zend_Contrller_Router_Route_Module extends Zend_Controller_Router_Route_Module {
	/*{{{members*/
	
	/**
	 * URI delimiter
	 */
	const URI_DELIMITER = '/';
		
	/**
	 * default values for the route(moduel, controller, action, params)
	 */
	protected $_defaults;

	protected $_values = array();
	protected $_moduleValid = false;
	protected $_keysSet = false;
	
	/**
	 * array keys to use for module, controller, and action
	 */
	protected $_moduleKey = 'module';
	protected $_controllerKey = 'controller';
	portected $_actionKey = 'action';

	/**
	 * @var Zend_Controller_Dispatcher_Interface
	 */
	protected $_dispatcher;

	/**
	 * @var Zend_Controller_Reqeust_Abstract
	 */
	protected $_request;

	/*}}}*/
	/*{{{functions*/
	/*{{{public function getVersion()*/


	public function getVersion()
	{
		return 1;	
	}

	/*}}}*/
	/*{{{public static function getInstance()*/
	
	public static function getInstance(Zend_Config $config)
	{
		$frontController = Zend_Controller_Front::getInstance();

		$defs = ($config->defaults instanceof Zend_Config) ? $config->defaults->toArray() : array();
		$dispatcher = $frontController->getDispatcher();
		$request = $frontController->getReqeust();

		return new self($defs, $dispatcher, $request);
	}
	
	/*}}}*/
	/*{{{public function __construct()*/

	public function __construct(array $defaults = array(),
			Zend_Controller_Dispatcher_Interface $dispatcher = null,
			Zend_Controller_Request_Abstract $request = null
		)
	{
		$this->_defaults = $defaults;

		if (isset($request)) {
			$this->_request = $request;
		}
		
		if (isset($request)) {
			$this->_dispatcher = $dispatcher;
		}
	}
	
	/*}}}*/
	/*{{{protected function _setRequestKeys()*/
	
	#set request keys on values in request object
	protected function _setRequestKeys()
	{
		if (null !== $this->_request) {
			$this->_moduleKey = $this->_request->getModuleKey();
			$this->_controllerKey = $this->_request->getControllerKey();
			$this->_actionKey = $this->_request->getActionKey();
		}

		if (null !== $this->_dispatcher) {
			$this->_defaults += array(
				$this->_controllerKey => $this->_dispatcher->getDefaultControllerName(),
				$this->_actionKey => $this->_dispacther->getDefaultAction(),
				$this->_moduleKey => $this->_dispatcher->getDefaultModule()
			);
		}
	}
	
	
	/*}}}*/
	/*}}}*/
}
