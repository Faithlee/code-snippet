<?php
/**
 * @FileName: Http.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 10 Oct 2014 12:23:13 AM CST
 */

class Zend_Uri_Http extends Zend_Uri {
	/*{{{members*/
	
	
	/*}}}*/
	/*{{{functions*/
	
	/*{{{public function setRequestUri()*/

	public function setRequestUri($requestUri = null)
	{
		if (null === $request) {
			//todo 判断是否IIS服务器
			if (isset($_SERVER['HTTP_X_REWRITE_URL'])) {
			
			} else if ($_SERVER['REQUEST_URI']) { 
				$requestUri = $_SERVER['REQUEST_URI'];

				//todo http proxy reqs setup request uri with scheme and host and port
				
			}
				
		}
		
		$this->_requestUri = $requestUri;
		return $this;
	}
	
	/*}}}*/
	
	/*}}}*/
	

}
