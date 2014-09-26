<?php
/**
 * @FileName: Abstract.php
 * @Desc: Zend Controller Dispatcher Abstract
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 24 Sep 2014 11:32:18 PM CST
 */

require_once 'Zend/Controller/Dispatcher/Interface.php';

abstract class Zend_Controller_Dispatcher_Abstract implements Zend_Controller_Dispatcher_Interface {
	
	//default action
	protected $_defaultAction = 'index';

	//default controller
	protected $_defaultController = 'index';

	//default module
	protected $_defaultModule = 'default';

	//front controller instance
	protected $_frontController;

	//invocation parameters
	protected $_invokeParams = array();

	//path delimiter character
	protected $_pathDelimiter = '_';

	//response object
	protected $_response = null;

	//word delimiter characters
	protected $_wordDelimiter = array('-', '.');

	/*{{{*/

	public function __construct(array $params = array())
	{
		$this->setParams($params);
	}

	/*}}}*/
	/*{{{public function formatControllerName()*/

	//format a string to controller name
	public function formatControllerName($unformatted)
	{
		return ucfirst($this->_formatName($unformatted)) . 'Controller';
	}
	
	/*}}}*/

	/*{{{*/

	//format a string from a uri into a php-friendly name
	protected function _formatName($unformatted, $isAction = false)
	{
		//针对XXX_XXXController的处理及xxxAction的处理
		if (!$isAction)	{
			$segments = explode($this->getPathDelimiter(), $unformatted);
		} else {
			$segments = (array) $unformatted;
		}

		foreach ($segments as $key => $segment) {
			$segment = str_replace($this->getWordDelimiter(), ' ', strtolower($segment));
			$segment = preg_replace('/[^a-z0-9]/', '', $segment);
			$segments[$key] = str_replace(' ', '', ucwords($segment));
		}

		return implode('_', $segments);
	}

	/*}}}*/
	/*{{{public function getFrontController()*/

	//retrieve front controller
	public function getFrontController()
	{
		if (null === $this->_frontController) {
			require_once 'Zend/Controller/Front.php';
			$this->_frontController = Zend_Controller_Front::getInstance();
		}

		return $this->_frontController;
	}

	/*}}}*/

	/*{{{public function getPathDelimiter()*/

	//retrieve the path delimiter charset
	public function getPathDelimiter()
	{
		return $this->_pathDelimiter;	
	}

	/*}}}*/
	/*{{{public function getWordDelimiter()*/

	//retrieve the word delimiter characters
	public function getWordDelimiter()
	{
		return $this->_wordDelimiter;
	}

	/*}}}*/


	/*{{{public function getDefaultModule()*/
	
	public function getDefaultModule()
	{
		//default
		return $this->_defaultModule;
	}

	/*}}}*/
}
