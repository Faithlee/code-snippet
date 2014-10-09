<?php
/**
 * @FileName: Rewrite.php
 * @Desc: router rewrite
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 28 Sep 2014 10:20:36 PM CST
 */

require_once 'Zend/Controller/Router/Abstract.php';

#路由协议
require_once 'Zend/Controller/Router/Route.php';

class Zend_Controller_Router_Rewrite extends Zend_Controller_Router_Route {
	/*{{{members*/

	//use default routes
	prtected $_useDefaultRoutes = true;

	//array of routes to match against
	protected $_routes = array();

	//current matched route
	protected $_currentRoute = null;

	//global parameters given to all routes
	protected $_globalParams = array();

	//separator to use with chain names;
	protected $_chainNameSeparator = '-';

	//
	protected $_useCurrentParamsAsGlobal = false;

	/*}}}*/
	/*{{{functions*/
	/*{{{public function addDefaultRoutes()*/

	#add default router
	public function addDefaultRoutes()
	{
		if (!$this->hasRoute('default')) {
			$dispatcher = $this->getFrontController()->getDispatcher();
			$request = $this->getFrontController()->getRequest();

			require_once 'Zend/Controller/Router/Route/Module.php';
			$comat = new Zend_Controller_Router_Route_Module(array(), $dispatcher, $request);
			
			$this->_routes = array('default' => $compat) + $this->_routes;
		}
	}
	
	/*}}}*/


	/*{{{public function hasRoute()*/

	#check if named route exists
	public function hasRoute($name)
	{
		return isset($this->_routes[$name]);
	}	

	/*}}}*/
	/*{{{public function getRoute()*/

	#retrieve a named route
	public function getRoute($name)
	{
		if (!isset($this->_routes[$name])) {
			require_once 'Zend/Controller/Router/Exception.php';
			throw new Zend_Controller_Router_Exception("Router $name is not defined!");
		}	

		return $this->_routes[$name];
	}
	
	/*}}}*/
	

	/*}}}*/

}
