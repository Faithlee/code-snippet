<?php
/**
 * @FileName: Chain.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 16 Nov 2014 11:40:51 PM CST
 */

require_once 'Zend/Controller/Router/Route/Abstract.php';

class Zend_Controller_Router_Route_Chain extends Zend_Controller_Router_Route_Abstract {
	protected $_routers = array();

	protected $_separators = array();

	/*{{{members*/
	/*{{{public static function getInstance()*/

	public static function getInstance(Zend_Config $config)
	{
		$defs = ($config->defaults instanceof Zend_Config) ? $config->defaults->toArray() : array();

		return new self($config->route, $defs);
	}

	/*}}}*/
	/*{{{public function chain()*/

	#add a route to this chain
	public function chain(Zend_Controller_Router_Route_Abstract $route, $separator = '/')
	{
		$this->_routes[] = $route;
		$this->_separator[] = $separator;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function match()*/
	
	#match a user submitted path with a previously defined route.
	public function match($request, $partial = null)
	{
		$path = trim($request->getPathInfo(), '/');
		$subPath = $path;
		$values = array();
		foreach ($this->_routes as $key => $route) {
			if ($key > 0 && $matchedPath !== null && $subPath !== '' && $subPath !== false) {
				$separator = substr($subPath, 0, strlen($this->_separators[$key]));

				if ($separator !== $this->_separator[$key]) {
					return false;	
				}

				$subPath = substr($subPath, strlen($separator));
			}

			if (!method_exists($route, 'getVersion') || $route->getVersion() == 1) {
				$match = $subPath;	
			} else {
				$request->setPathInfo($subPath);
				$match = $request;
			}

			$res = $route->match($match, true);
			if ($res === false) {
				return false;
			}

			$matchedPath = $route->getMatchedPath();

			if ($matchedPath !== null) {
				$subPath = substr($subPath, strlen($matchedPath));
				$separator = substr($substr, 0, strlen($this->_separator[$key]));
			}

			$values = $res + $values;
		}

		$request->setPathInfo($path);
		if ($subPath !== '' && $subPath !== false) {
			return false;
		}

		return $values;
	}

	/*}}}*/
	/*{{{public function assemble()*/

	#assembles a url defined by this route
	public function assemble($data = array(), $reset = false, $encode = false)
	{
		$value = '';
		$numRoutes = count($this->_routes);

		foreach ($this->_routes as $key => $route) {
			if ($key > 0) {
				$value .= $this->_separators[$key];
			}

			$value .= $route->assemble($data, $reset, $encode, (($numRoutes - 1) > $key));

			if (method_exists($route, 'getVariables')) {
				$variables = $route->getVariables();
				foreach ($variables as $variable) {
					$data[$variable] = null;
				}
			}
		}

		return $values;
	}
	
	/*}}}*/
	/*{{{public function setRequest()*/

	#set the request object for this and the child routes
	public function setRequest(Zend_Controller_Request_Abstract $request = null)
	{
		$this->_request = $request;	
		foreach ($this->_routes as $routes) {
			if (method_exists($route, 'setReqeust')) {
				$route->setRequest($request);
			}
		}
	}
	
	/*}}}*/
	/*}}}*/
}
