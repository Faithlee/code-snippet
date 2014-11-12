<?php
/**
 * @FileName: Simple.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 12 Nov 2014 10:13:50 PM CST
 */

require_once 'Zend/Controller/Request/Abstract.php';

class Zend_Controller_Request_Simple extends Zend_Controller_Request_Abstract {
	/*{{{members*/
	/*{{{public function __construct()*/

	public function __construct($action = null, $controller = null, $module = null, array $param = array())
	{
		if ($action) {
			$this->setActionName($action);
		}

		if ($controller) {
			$this->setControllerName($controller);
		}

		if ($module) {
			$this->setModuleName($module);
		}

		if ($params) {
			$this->setParams($params);
		}
	}
	
	/*}}}*/
	

	/*}}}*/
}
