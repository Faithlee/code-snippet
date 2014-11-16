<?php
/**
 * @FileName: Abstract.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 08 Oct 2014 05:01:02 AM CST
 */

require_once 'Zend/Controller/Router/Route/Interface.php';

abstract class Zend_Controller_Router_Route_Abstract implements Zend_Controller_Router_Route_Interface {
	/*{{{members*/

	//wether this route is abstract or not
	protected $_isAbstract = false;

	//path matched by this route
	protected $_matchedPath = null;

	/*}}}*/
	/*{{{functions*/
	/*{{{public function getVersion()*/

	public function getVersion()
	{
		return 2;	
	}
	
	/*}}}*/
	/*{{{public function setMatchedPath()*/

	#set partially matched path
	public function setMatchedPath($path)
	{
		$this->_matchedPath = $path;	
	}
	
	/*}}}*/
	/*{{{public function getMatchedPath()*/

	#get partially matched path
	public function getMatchedPath()
	{
		return $this->_matchedPath;	
	}
	
	/*}}}*/
	/*{{{public function isAbstract()*/

	public function isAbstract($flag = null)	
	{
		if ($flag !== null) {
			$this->_isAbstract = $flag;
		}

		return $this->_isAbstract;
	}
	
	/*}}}*/
	/*{{{public function chain()*/

	#create a new chain
	public function chain(Zend_Controller_Router_Route_Abstract $route, $separator = '/')
	{
		require_once 'Zend/Controller/Router/Route/Chain.php';

		$chain = new Zend_Controller_Router_Route_Chain();
		$chain->chain($this)->chain($route, $separator);

		return $chain;
	}
	
	/*}}}*/
	/*}}}*/
}





