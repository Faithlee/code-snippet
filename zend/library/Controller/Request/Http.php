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



	/*{{{public function setQuery()*/

	public function setQuery($spec, $value = null)
	{
		//todo 如果$spec是数组则递归设置

		$_GET[(string)$spec] = $value;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getQuery()*/

	public function getQuery($key = null, $default = null)
	{
		if (null == $key) {
			return $_GET;
		}

		return isset($_GET[$key]) ? $_GET[$key] : $default;
	}
	
	/*}}}*/

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
			} else if (isset($_SERVER['PHP_SELF']) && basename($_SERVER['PHP_SELF']) == $filename) {
				$baseUrl = $_SERVER['PHP_SELF'];
			} else if (isset($_SERVER['ORIG_SCRIPT_NAME']) && basename($_SERVER['ORIG_SCRIPT_NAME']) === $filename) {
				$baseUrl = $_SERVER['ORIG_SCRIPT_NAME'];
			}

			$path = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : '';
			$file = isset($_SERVER['SCRIPT_FILENAME']) ? $_SERVER['SCRIPT_FILENAME'] : '';
			
			$segs = explode('/', trim($file, '/'));
			$segs = array_reverse($segs);
			$index = 0;
			$last = count($segs);
			$baseUrl = '';

			do {
				$baseUrl = '/' . $segs[$index] . $baseUrl;
				$index++;
			} while ($last > $index && (false !== ($pos = strpos($path, $baseUrl))) && 0 !== $pos); 
		}
		
		#uri统一资源标识 如public/dwz 或 public/dwz/index.php
		#requestUri：/dwz/public/index.php?c=IndexController
		#则baseUrl: /dwz/public/index.php
		$requestUri = $this->getRequestUri();
		if (0 === strpos($requestUri, $baseUrl)) {
			$this->_baseUrl = $baseUrl;

			return $this;
		}

		#requestUri:/dwz/public/index/demo
		#$baseUrl: /dwz/public/index.php
		if (0 === strpos($requestUri, dirname($baseUrl))) {
			$this->_baseUrl = rtrim(dirname($baseUrl), '/');

			return $this;
		}

		#通过?传递参数的请求		
		$truncatedReqeustUri = $requestUri;
		if ($pos = strpos($requestUri, '?') !== false) {
			$truncatedReqeustUri = substr($requestUri, 0, $pos);
		}

		$basename = basename($baseUrl);
		if (empty($basename) || !strpos($truncatedReqeustUri, $basename)) {
			$this->_baseUrl = '';

			return $this;
		}

		#use mod_rewrite strip the script fileame out of baseUrl; 不明白
		if (strlen($requestUri) >= strlen($baseUrl) && ((false !== ($pos = strpos($requestUri, $baseUrl))) && ($pos !== 0))) {
			$baseUrl = substr($requestUri, 0, $pos + strlen($baseUrl));
		}

		$this->_baseUrl = rtrim($baseUrl, '/');

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getBaseUrl()*/

	#retrieve baseUrl
	public function getBaseUrl()
	{
		if (null === $this->_baseUrl) {
			$this->setBaseUrl();
		}

		return urldecode($this->_baseUrl);
	}

	/*}}}*/
	/*{{{public function setBasePath()*/

	public function setBasePath($basePath = null)
	{
		if ($basePath === null)	{
			$filename = isset($_SERVER['SCRIPT_FILENAME']) ? basename($_SERVER['SCRIPT_FILENAME']) : '';
						
			$baseUrl = $this->getBaseUrl();
			if (empty($baseUrl)) {
				$this->_basePath = '';
				return $this;
			}

			if (basename($baseUrl) === $filename) {
				$basePath = dirname($baseUrl);
			} else {
				$basePath = $baseUrl;
			}
		}

		if (substr(PHP_OS, 0, 3) === 'WIN')	{
			$basePath = str_replace('\\', '/', $basePath);
		}

		$this->_basePath = rtrim($basePath, '/');

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getBasePath()*/

	#retrieve
	public function getBasePath()
	{
		if (null === $this->_basePath) {
			$this->setBasePath();
		}

		return $this->_basePath;
	}
	
	/*}}}*/
	/*{{{*/

		
	
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
