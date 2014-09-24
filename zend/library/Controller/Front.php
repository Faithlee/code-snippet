<?php
/**
 * @FileName: Front.php
 * @Desc: 单件模式
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 22 Sep 2014 10:34:09 PM CST
 */

class Front {
	protected $_baseUrl = null;

	protected $_controllerDir = null;

	protected $_dispatcher = null;

	protected static $_instance = null;

	protected $_invokeParams = array();

	protected $_moduleControllerDirectoryName = 'controllers';

	protected $_plugins = null;

	protected $_request = null;

	protected $_response = null;

	protected $_router = null;

	protected $_throwExceptions = false;


	protected function __contruct()
	{
		$this->_plugins = '';
	}

	private function __clone()	
	{
	
	}
		
	/**
	 * getInstance 单件模式
	 * 
	 * @static
	 * @access public
	 * @return void
	 */
	public static function getInstance()
	{
		if (null === self::$_instance) {
			self::$_instance = new self();
		}
		
		return self::$_instance;	
	}
	
	public function resetInstance()	
	{
		$reflection = new ReflectionObject($this);
		//返回反射属性对象
		$property = $reflection->getProperties();
		
		foreach ($property as $pro) {
			//返回属性名称，即对象的成员属性名称
			$name = $pro->getName();

			switch ($name) {
				case '_instance' :
					break;
				case '_controllerDir':
				case '_invokeParams':
					$this->{$name} = array();
					break;
				case '_plugins':
					$this->{$name} = '';
					break;
				case '_throwException':
					$this->{$name} = null;
					break;
				default:
					$this->{$name} = null;
					break;
			}
		}
		
		//print_r($property);
		Zend_Controller_Action_HelperBroker::resetHelpers();
	}

	/*{{{public function getDispatcher()*/
	/**
	 * getDispatcher 获取标准分发器
	 * 
	 * @access public
	 * @return void
	 */
	public function getDispatcher()
	{
		if (!$this->_dispatcher instanceof Zend_Controller_Dispatcher_Interface) {
			require 'Dispatcher/Standard.php';
			$this->_dispatcher = new Zend_Controller_Dispatcher_Standard();
		}

		return $this->_dispatcher;
	}
	/*}}}*/
	/*{{{public static function run()*/
	public static function run()
	{
	
	}
	/*}}}*/
	/*{{{public function addControllerDirectory()*/

	public function addControllerDirectory($directory, $module = null)
	{
		//todo 	派遣器设置目录
	}
	
	/*}}}*/
	/*{{{public function setControllerDirectory()*/

	//todo 
	public function setControllerDirectory($directory, $module = null)
	{
		
	}

	/*}}}*/
	/*{{{public function getControllerDirectory()*/

	//todo
	public function getControllerDirectory($name = null)
	{
			
	}

	/*}}}*/
	/*{{{public function removeControllerDirectory()*/

	//todo 
	public function removeControllerDirectory()
	{
	
	}

	/*}}}*/
	/*{{{public function addModuleDirectory()*/
	
	/**
	 * $path = APPLICATION_PATH . '/modules'
	 */
	public function addModuleDirectory($path)
	{
		try {
			$dir = new DirectoryIterator($path);
		} catch (Exception $e) {
			require_once 'Zend/Controller/Exception.php';
			throw new Zend_Controller_Exception("Directory $path not readable", 0, $e);
		}

		foreach ($dir as $file)	{
			if ($file->isDot() || !$file->isDir()) {
				continue;
			}

			//product
			$module = $file->getFilename();

			// Don't use SCCS directories as modules @todo 不明白
			if (preg_match('/^[^a-z]/i', $module) || ('CVS' == $module)) {
				continue;
			}

			$moduleDir = $file->getPathname() . DIRECTORY_SEPARATOR . $this->getMoDuleControllerDirectoryName();
			$this->addControllerDirectory($moduleDir, $module);
		}
		
		return $this;
	}

	/*}}}*/
	/*{{{public function getModuleDirectory()*/

	public function getModuleDirectory($module = null)	
	{
		if (null == $module) {
			$request = $this->getRequest();
			if (null != $request) {
				$module = $this->getRequest()->getModuleName();
			}
			if (empty($module)) {
				$module = $this->getDispatcher()->getDefaultModule();
			}
		}

		$controllerDir = $this->getControllerDirectory($module);
		if ((null === $controllerDir) || !is_string($controllerDir)) {
			return null;
		}

		return dirname($controllerDir);
	}

	/*}}}*/
	/*{{{public function setModuleControllerDirectory()*/
	
	//set the directory name within a module containing controllers
	public function setModuleControllerDirectory($name = 'controllers')
	{
		$this->_moduleControllerDirectoryName = (string) $name;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getModuleControllerDirectoryName()*/

	//get the directory name within a module containing controllers
	public function getModuleControllerDirectoryName()
	{
		return $this->_moduleControllerDirectoryName;	
	}
	
	/*}}}*/
	/*{{{public function setDefaultControllerName()*/
	
	//set default controller
	public function setDefaultControllerName($controller)
	{
		$dispatcher = $this->getDispatcher();

		
	}
	
	/*}}}*/

	/*{{{public function setRequest()*/

	public function setRequest($request) 
	{
		if (is_string($request)) {
			if (!class_exists($request)) {
				require_once 'Zend/Loader.php';
				Zend_Loader::loadClass($request);
			}

			$request = new $request();
		}

		if ($request instanceof Zend_Controller_Request_Abstract) {
			require_once 'Zend/Controller/Exception.php';
			throw new Zend_Controller_Exception('Invalid request class');
		}

		$this->_request = $request;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getRequest()*/

	public function getRequest()
	{
		return $this->_request;
	}
	
	/*}}}*/


	/*{{{public function setModuleControllerDirectoryName()*/

	public function setModuleControllerDirectoryName($name = 'controllers')
	{
		$this->_moduleControllerDirectoryName = (string)$name;
	}

	/*}}}*/
	/*{{{public function getModuleControllerDirectoryName()*/

	public function getModuleControllerDirectoryName()
	{
		return $this->_moduleControllerDirectoryName;
	}
	
	/*}}}*/

}

$front = Front::getInstance();
$front->resetInstance();
