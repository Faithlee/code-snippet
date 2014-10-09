<?php
/**
 * @FileName: Uri.php
 * @Desc: uri validate
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 10 Oct 2014 12:05:37 AM CST
 */


abstract class Zend_Uri {
	/*{{{members*/
	
	/*}}}*/
	/*{{{members*/
	/*{{{public function factory()*/

	#create a new zend_uri object for a uri
	public function factory($uri = 'http', $className = null)
	{
		$uri = explode(':', $uri, 2);
		$scheme = strtolower($uri[0]);
		$schemeSpecific = isset($uri[1]) === true ? $uri[1] : '';
		
		if (strlen($scheme) === 0) {
			require_once 'Zend/Uri/Exception.php';
			throw new Zend_Uri_Exception('An Empty string was supplied for the scheme');
		}

		if (ctype_alnum($scheme) === false) {
			throw new Exception('Illegal scheme supplied, only alphanueric characterers are permitted!');
		}

		if ($className === null) {
			switch ($scheme) {
				case 'http':
				case 'https':
					$className = 'Zend_Uri_Http';
					break;
				case 'mailto':
					//todo
				default:
					throw new Exception('Scheme is not supported!');
					break;
			}
		}

		//todo loadclas/ new classname
		require_once 'Zend/Loader.php';
		try {
			Zend_Loader::loadClass($className);
		} catch (Exception $e) {
		
		}

		$schemeHandler = new $className($scheme, $schemeSpecific);
		
		//todo 验证
		
		return $schemeHandler;	

	}

	/*}}}*/
	/*{{{*/

	#validate the current uri from the instance variables
	public function valid()
	{
		return $this->validateUsername() 
		and		$this->validatePassword();
		#todo 有时间补充
			
	}
	
	/*}}}*/
	/*}}}*/
}
