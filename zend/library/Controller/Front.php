<?php
/**
 * @FileName: Front.php
 * @Desc: 单件模式
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 22 Sep 2014 10:34:09 PM CST
 */

//require_once 'Zend/Loader.php';


//require_once ''

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
		
	/*{{{public static function getInstance()*/
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

	/*}}}*/
	/*{{{public function resetInstance()*/

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

	/*}}}*/
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
			require 'Zend/Controller/Dispatcher/Standard.php';
			$this->_dispatcher = new Zend_Controller_Dispatcher_Standard();
		}

		return $this->_dispatcher;
	}
	/*}}}*/
	/*{{{public static function run()*/

	//
	public static function run($controllerDirectory)
	{
		self::getInstance()	
			->setControllerDirectory($controllerDirectory)
			->dispatch();
	}

	/*}}}*/
	/*{{{public function addControllerDirectory()*/
	
	//add a controller directory to the controller directory stack
	public function addControllerDirectory($directory, $module = null)
	{
		//todo 	派遣器设置目录
		$this->getDispatcher()->addControllerDirectory($directory, $module);
	
		return $this;
	}
	
	/*}}}*/
	/*{{{public function setControllerDirectory()*/

	//set dispatcher controller Directory 
	public function setControllerDirectory($directory, $module = null)
	{
		$this->getDispatcher()->setControllerDirectory($directory, $module);

		return $this;
	}

	/*}}}*/
	/*{{{public function getControllerDirectory()*/

	//retrieve controller Directory
	public function getControllerDirectory($name = null)
	{
		return $this->getDispatcher()->getControllerDirectory($name);
	}

	/*}}}*/
	/*{{{public function removeControllerDirectory()*/

	//retrieve a controller directory by module name 
	public function removeControllerDirectory($module)
	{
		return $this->getDispatcher()->removeControllerDirectory($module);
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

			//product：getFilename：如果是目录中无文件，则返回最后一个目录名句，有则返回文件名
			$module = $file->getFilename();

			// Don't use SCCS directories as modules @todo 只能以小写字母开头
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
		#module不传时返回默认模块，即框架初始时模块APPLICATION_PATH
		if (null == $module) {
			$request = $this->getRequest();
			if (null != $request) {
				#retrieve module @todo request与dispatch获取的结果不一样
				$module = $this->getRequest()->getModuleName();
			}

			if (empty($module)) {
				#default
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
	/*{{{public function setModuleControllerDirectoryName()*/
	
	//set the directory name within a module containing controllers
	public function setModuleControllerDirectoryName($name = 'controllers')
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
		#modify default controller index to $controller
		$dispatcher->setDefaultControllerName($controller);
		
		return $this;
	}
	
	/*}}}*/
	/*{{{public function getDefaultControllerName()*/

	#retrieve default controller name index
	public function getDefaultControllerName()
	{
		return $this->getDispatcher()->getDefaultControllerName();
	}

	/*}}}*/
	/*{{{public function setDefaultAction()*/
	
	//retrieve the default action index
	public function setDefaultAction($action)
	{
		$dispatcher = $this->getDispatcher();
		$dispatcher->setDefaultAction($action);

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getDefaultAction()*/

	#retrieve default action index
	public function getDefaultAction()
	{
		return $this->getDispatcher()->getDefaultAction();
	}

	/*}}}*/
	/*{{{public function setDefaultModule()*/

	public function setDefaultModule($module)
	{
		$dispatcher = $this->getDispatcher();
		$dispatcher->setDefaultModule($module);

		return $this;
	}

	/*}}}*/
	/*{{{public function getDefaultModule()*/

	#retrieve default module default [default => APPLICATION_PATH]
	public function getDefaultModule()
	{
		return $this->getDispatcher()->getDefaultModule();
	}
	
	/*}}}*/
	/*{{{public function setRequest()*/

	#set request class/object
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

	#retrieve request
	public function getRequest()
	{
		return $this->_request;
	}
	
	/*}}}*/
	/*{{{public function setRouter()*/

	#set router object/class
	public function setRouter($router)
	{
		if (is_string($router))	{
			if (!class_exists($router))	{
				require_once 'Zend/Loader.php';
				Zend_Loader::loadClass($router);
			}

			$router = new $router();
		}

		if (!$router instanceof Zend_Controller_Router_Interface) {
			require_once 'Zend/Controller/Exception.php';
			throw new Zend_Controller_Exception('Invalid router class');
		}

		$router->setFrontController($this);
		$this->_router = $router;
	}
	
	/*}}}*/


	/*{{{public function setModuleControllerDirectoryName()*/

	

	/*}}}*/
	/*{{{public function getModuleControllerDirectoryName()*/

	
	
	/*}}}*/

}

$front = Front::getInstance();
//$front->resetInstance();
$front->addModuleDirectory('/usr/local/dev_swan/web/dwz/application/modules');
