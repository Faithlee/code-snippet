<?php
/**
 * @FileName: Broker.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 29 Sep 2014 11:22:11 PM CST
 */

require_once 'Zend/Controller/Plugin/Broker.php';

class Zend_Controller_Plugin_Broker extends Zend_Controller_Plugin_Abstract {
	
	//array of instance of objects extending Zend_Controller_Plugin_Abstract
	protected $_plugins = array();

	/*{{{public function registerPlugin()*/

	#register a plugin
	public function registerPlugin(Zend_Controller_Plugin_Abstract $plugin, $stackIndex = null)
	{
		if (false !== array_search($plugin, $this->_plugins, true))	 {
			require_once 'Zend/Controller/Exception.php';
			throw new Zend_Controller_Exception('Plugin already exists!');
		}

		$stackIndex = (int)$stackIndex;
		if ($stackIndex) {
			if (isset($this->_plugins[$stackIndex])) {
				require_once 'Zend/Controller/Exception.php';
				throw new Zend_Controller_Exception('Plugin with stackIndex "' . $stackIndex . '" already registered!');
			}
			$this->_plugins[$stackIndex] = $plugin;
		} else {
			$stackIndex = count($this->_plugins);
			while (isset($this->_plugins[$stackIndex])) {
				$stackIndex++;
			}

			$this->_plugins[$stackIndex] = $plugin;
		}

		$request = $this->getRequest();
		if ($request) {
			$this->_plugins[$stackIndex]->setRequest($request);
		}

		$response = $this->getResponse();
		if ($response) {
			$this->_plugins[$stackIndex]->setResponse($response);
		}

		ksort($this->_plugins);

		return $this;
	}
	
	/*}}}*/
	/*{{{public function unregisterPlugin()*/
	
	#unregister a plugin
	public function unregisterPlugin($plugin)
	{
		if ($plugin instanceof Zend_Controller_Plugin_Abstract)	{
			$key = array_search($plugin, $this->_plugins, true);
			if (false === $key) {
				require_once 'Zend/Controller/Exception.php';
				throw new Zend_Controller_Exception('Plugin never registered!');
			}

			unset($this->_plugins[$key]);
		} else if (is_string($plugin)) {
			foreach ($this->_plugin as $key => $_plugin) {
				$type = get_class($_plugin);
				if ($type == $plugin) {
					unset($this->_plugin[$key]);
				}
			}
		}

		return $this;	
	}
	
	/*}}}*/
	/*{{{public function hasPlugin()*/

	#is a plugin of a particular class registered
	public function hasPlugin($class)
	{
		foreach ($this->_plugins as $key => $plugin) {
			$type = get_class($plugin);
			if ($type == $class) {
				return true;
			}
		}

		return false;
	}
	
	/*}}}*/
	/*{{{public function getPlugin()*/

	#retrieve a plugin or plugins by class
	#可能注册多个相同的插件，但返回的是第一个注册
	public function getPlugin($class)
	{
		$found = array();
		foreach ($this->_plugins as $key => $plugin) {
			$type = get_class($plugin);
			if ($type == $class) {
				$found[] = $plugin;
			}
		}

		switch (count($found)) {
			case 0:
				return false;
			case 1:
				return $found[0];
			default: 
				return $found;
		}
	}
	
	/*}}}*/
	/*{{{public function getPlugins()*/
	
	#return all plugins
	public function getPlugins()
	{
		return $this->_plugins;	
	}
	
	/*}}}*/
	/*{{{public function setRequest()*/

	#set request object and register with each plugin
	public function setRequest(Zend_Controller_Request_Abstract $request)
	{
		$this->_request = $requst;
		foreach ($this->_plugins as $plugin) {
			$plugin->setRequest($request)
		}

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
	/*{{{public function setResponse()*/

	#set response object
	public function setResponse(Zend_Controller_Response_Abstract $response)
	{
		$this->_response = $response;	
		foreach ($this->_plugins as $plugin) {
			$plugin->setResponse($response);
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getResponse()*/

	#retrieve the response object
	public function getResponse()
	{
		return $this->_response;	
	}
	
	/*}}}*/
	/*{{{public function routeStartup()*/
	
	#call before Zend_Controller_Front begins evaluating the request against its routes
	public function routeStartup(Zend_Controller_Request_Abstract $request)
	{
		foreach ($this->_plugins as $plugin) {
			try {
				$plugin->routeStartup($request);
			} catch (Exception $e) {
				if (Zend_Controller_Front::getInstance()->throwExceptions()) {
					throw $e;
				} else {
					$this->getResponse()->setException($e);
				}
			}
		}
	}
	
	/*}}}*/
	/*{{{public function routeShutdown()*/

	#called before Zend_Controller_Front exists its iterations over the route set
	public function routeShutdown(Zend_Controller_Request_Abstract $request)
	{
		foreach ($this->_plugins as $plugin) {
			try {
				$plugin->routeShutdown($request);
			} catch (Exception $e) {
				if (Zend_Controller_Front::getInstance()->throwExceptions()) {
					throw $e;	
				} else {
					$this->getResponse()->setException($e);
				}
			}
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function dispatchLoopStartup()*/

	#Called before Zend_Controller_Front enters its dispatch loop
	public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
	{
		foreach ($this->_plugins as $plugin) {
			try {
				$plugin->dispatchLoopStartup($request);
			} catch (Exception $e) {
				if (Zend_Controller_Front::getInstance()->throwExceptions()) {
					throw $e;
				} else {
					$this->getResponse()->setException($e);
				}
			}
		}
	}
	
	/*}}}*/
	/*{{{public function preDispatch()*/
	
	#called before an action is dispatched by Zend_Controller_Dispatcher
	public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
		foreach ($this->_plugins as $plugin) {
			try {
				$plugin->preDispatch($request);
			} catch (Exception $e) {
				if (Zend_Controller_Front::getInstance()->throwExceptions()) {
					throw $e;
				} else {
					$this->getResponse()->setException($e);
				}
			}
		}
	}
	
	/*}}}*/
	/*{{{public function postDispatch()*/

	#called after an action is dispatched by Zend_Controller_Dispatcher
	public function postDispatch(Zend_Controller_Request_Abstract $request)
	{
		foreach ($this->_plugins as $plugin) {
			try {
				$plugin->postDipatch($request);
			} catch (Exception $e) {
				if (Zend_Controller_Front::getInstance()->throwExceptions()) {
					throw $e;
				} else {
					$this->getResponse()->setException($e);
				}
			}
		}
	}
	
	/*}}}*/
	/*{{{public function dispatchLoopShutdown()*/

	#called before Zend_Controller_Front exits its dispatch loop
	public function dispatchLoopShutdown()
	{
		foreach ($this->_plugins as $plugin) {
			try {
				$plugin->dispatchLoopShutdown();
			} catch (Exception $e) {
				if (Zend_Controller_Front::getInstance()->throwExceptions()) {
					throw $e;
				} else {
					$this->getResponse()->setException($e);
				}
			}
		}
	}
	
	/*}}}*/
}
