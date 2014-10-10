<?php
/**
 * @FileName: Http.php
 * @Desc: http请求类
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 09 Oct 2014 11:50:33 PM CST
 */

class Zend_Controller_Request_Http extends Zend_Controller_Request_Abstract {
	/*{{{members*/
	
	#scheme for http
	const SCHEME_HTTP = 'http';

	#scheme for https
	const SCHEME_HTTPS = 'https';


	/*}}}*/
	/*{{{functions*/

	/*{{{public function setRequestUri()*/

	public function setRequestUri($requestUri = null)
	{

		#todo 直接检查指定访问的页面			
		if ($_SERVER['REQUEST_URI']) {
			$requestUri = $_SERVER['REQUEST_URI'];
			$schemeAndHttpHost = $this->getScheme() . '://' . $this->getHttpHost();

			if (strpos($requestUri, $schemeAndHttpHost) === 0) {
				$requestUri = substr($requestUri, strlen($schemeAndHttpHost));
			}
		}

		$this->_requestUri = $requestUri;

		return $this;
	}
	
	
	/*}}}*/

	/*{{{public function setBaseUrl()*/

	public function setBaseUrl($baseUrl = null)
	{
		if (null !== $baseUrl && !is_string($baseUrl)) {
			return $this;
		}

		if (null === $baseUrl) {
			$filename = (isset($_SERVER['SCRIPT_FILENAME'])) ? basename($_SERVER['SCRIPT_FILENAME']) : '';
			if (isset($_SERVER['SCRIPT_NAME']) && basename($_SERVER['SCRIPT_NAME']) === $filename) {
				$baseUrl = $_SERVER['SCRIPT_NAME'];
			} else if () {
			
			}


		}


	}
	
	/*}}}*/


	/*{{{public function getServer()*/

	#retrieve a member of the $_server superglobal
	public function getServer($key = null, $default = null)
	{
		if (null === $key) {
			return $_SERVER;
		}

		return isset($_SERVER[$key]) ? $_SERVER[$key] : $default;
	}
	
	
	/*}}}*/


	/*{{{public function getScheme()*/

	#get request uri scheme
	public function getScheme()
	{
		return ($this->getServer('HTTPS') == 'on') ? self::SCHEME_HTTPS : self::SCHEME_HTTP;
	
	}

	/*}}}*/
	/*{{{public function getHttpHost()*/

	#retrieve http host 
	public function getHttpHost()
	{
		if ($host = $this->getServer('HTTP_HOST')) {
			return $host;
		}

		#host由三部分组成：协议、主机名、端口
		$scheme = $this->getScheme();
		$name = $this->getServer('SERVER_NAME');
		$port = $this->getServer('SERVER_PORT'); 

		if (null = $name) {
			return '';
		} else if (self::SCHEME_HTTP == $scheme && $port == 80 || self::SCHEME_HTTPS == $scheme && $port == 443) {
			return $name;
		} else {
			return $name . ':' . $port;
		}
	}
	
	/*}}}*/
	/*}}}*/

}
