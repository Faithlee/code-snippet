<?php
/**
 * @FileName: Apache404.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 12 Nov 2014 09:46:47 PM CST
 */

require_once 'Zend/Controller/Request/Http.php';

require_once 'Zend/Uri.php';

class Zend_Controller_Request_Apache404 extends Zend_Controller_Request_Http {

	/*{{{members*/
	/*{{{public function setRequestUri()*/
	
	public function setRequestUri($requestUri = null)
	{
		$parseUriGetVars = false;
		if ($requestUri === null) {
			if (isset($_SERVER['HTTP_X_REWRITE_URL'])) {
				$requestUri = $_SERVER['HTTP_X_REWRITE_URL'];
			} elseif (isset($_SERVER['REDIRECT_URL'])) {
				$requestUri = $_SERVER['REDIRECT_URL'];
				if (isset($_SERVER['REDIRECT_QUERYSTRING'])) {
					$parseUriGetVars = $_SERVER['REDIRECT_QUERYSTRING'];
				}
			} elseif (isset($_SERVER['REQUEST_URI'])) {
				$requestUri = $_SERVER['REQUEST_URI'];
			} elseif (isset($_SERVER['ORIG_PATH_INFO'])) {
				$requestUri = $_SERVER['ORIG_PATH_INFO'];
				if (!empty($_SERVER['QUERY_STRING'])) {
					$requestUri .= '?' . $_SERVER['QUERY_STRING'];
				}
			} else {
				return $this;
			}
		} elseif (!is_string($requestUri)) {
			return $this;
		} else {
			if (false !== ($pos = strpos($requestUri, '?'))) {
				$parseUriGetVars = substr($requestUri, $pos + 1);
			}
		}

		if ($parseUriGetVars) {
			parse_str($parseUriGetVars, $_GET);
		}

		$this->_requestUri = $requestUri;
		
		return $this;
	}
	
	/*}}}*/
	/*}}}*/
}
