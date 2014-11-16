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
	}

	/*}}}*/
	/*{{{public function assemble()*/

	public function assemble()
	{
	
	}
	
	/*}}}*/
	/*{{{public function setRequest()*/

	public function setRequest()
	{
	
	}
	
	/*}}}*/
	/*}}}*/
}
