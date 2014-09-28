<?php
/**
 * @FileName: Rewrite.php
 * @Desc: router rewrite
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 28 Sep 2014 10:20:36 PM CST
 */

require_once 'Zend/Controller/Router/Route.php';

class Zend_Controller_Router_Rewrite extends Zend_Controller_Router_Route {
	/*{{{members*/

	//use default routes
	prtected $_useDefaultRoutes = true;

	//array of routes to match against
	protected $_routes = array();

	//current matched route
	protected $_currentRoute = null;


	/*}}}*/
	//todo function 

}
