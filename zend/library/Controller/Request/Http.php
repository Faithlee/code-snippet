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
	/*{{{public function __construct()*/

	public function __construct($uri = null)
	{
		if (null !== $uri) {
			if (!$uri instanceof Zend_Uri) {
				$uri = Zend_Uri::factory($uri);
			}

			if ($uri->valid()) {
				$path = $uri->getPath();
				$query = $uri->getQuery();
				if (!empty($query)) {
					$path .= '?' . $query;
				}

				$this->setRequestUri($path);
			} else {
				require_once 'Zend/Controller/Request/Exception.php';
				throw new Zend_Controller_Request_Exception('Invalid URI provided to construtor');
			}
		} else {
			$this->setRequestUri();
		}
	
	}
	
	/*}}}*/
	/*{{{public function __get()*/
	
	#access values contained in the superglobals as public members;
	public function __get($key)
	{
		switch (true) {
			case isset($this->_params[$key]):
				return $this->params[$key];
			case isset($_GET[$key]):
				return $_GET[$key];
			case isset($_POST[$key]):
				return $_POST[$key];
			case isset($_COOKIE[$key]):
				return $_COOKIE[$key];
			case ($key == 'REQUEST_URI'):
				return $this->getRequestUri();
			case ($key == 'PATH_INFO'):
				return $this->getPathInfo();
			case isset($SERVER[$key]):
				return $_SERVER[$key];
			case isset($_ENV[$key]):
				return $_ENV[$key];
			default:
				return null;
		}
	}
	
	/*}}}*/
	/*{{{public function get()*/

	#alias to _get()
	public function get($key)
	{
		return $this->__get($key);
	}
	
	/*}}}*/
	/*{{{public function __set()*/
	
	#set values
	public function __set($key, $value)
	{
		require_once 'Zend/Controller/Request/Exception.php';
		throw new Zend_Controller_Request_Exception('Setting values in supperglobals not allowed; please use setParam()');
	}
	
	/*}}}*/
	/*{{{public function set()*/

	public function set($key, $value)
	{
		return $this->__set($key, $value);
	}
	
	/*}}}*/
	/*{{{public function __isset()*/
	
	#check to see if a property is set
	public function __isset($key)
	{
		switch (true) {
			case isset($this->_params[$key]):
				return true;
			case isset($_GET[$key]):
				return true;
			case isset($_POST[$key]):
				return true;
			case isset($_COOKIE[$key]):
				return true;
			case isset($_SERVER[$key]):
				return true;
			case isset($_ENV[$key]):
				return true;
			default:
				return false;
		}
	}
	
	/*}}}*/
	/*{{{public function has()*/

	#alias to __isset()	
	public function has($key)
	{
		return $this->__isset($key);
	}

	/*}}}*/
	/*{{{public function setQuery()*/
	
	#关键: $_GET[(string)$spec]	= $value;
	public function setQuery($spec, $value = null)
	{
		//todo 如果$spec是数组则递归设置
		if ((null === $value) && !is_array($spec)) {
			require_once 'Zend/Controller/Exception.php';
			throw new Zend_Controller_Exception('Invalid value passed to setQuery(); must be either array of values or key/value pair');
		}

		if (null === ($value) && is_array($spec)) {
			foreach ($spec as $key => $value) {
				$this->setQuery($key, $value);
			}

			return $this;
		}

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
	/*{{{public function setPost()*/

	#set post values
	public function setPost($spec, $value = null) 
	{
		if (null === $value && !is_array($spec)) {
			require_once 'Zend/Controller/Exception.php';

			throw new Zend_Controller_Exception('Invalid value pased to setPost(); must be either arrya of values or  key/value pair');
		}

		if (null === $value && is_array($spec)) {
			foreach ($spec as $key => $value) {
				$this->setPost($key, $value);
			}

			return $this;
		}

		$_POST[(string) $spec] = $value;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getPost()*/
	
	public function getPost($key = null, $default = null)
	{
		if (null == $key) {
			return $_POST;
		}

		return isset($_POST[$key]) ? $_POST[$key] : $default;
	}
	
	/*}}}*/
	/*{{{public function getCookie()*/

	#retrieve a member of the $_COOKIE superglobal
	public function getCookie($key = null, $default = null)
	{
		if (null === $key) {
			return $_COOKIE;
		}

		return isset($_COOKIE[$key]) ? $_COOKIE[$key] : $default;
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
	/*{{{public function getEnv()*/
	
	#retrieve a member of the $_ENV superglobal
	public function getEnv($key = null, $default = null)
	{
		if (null === $key) {
			return $_ENV;
		}

		return isset($_ENV[$key]) ? $_ENV[$key] : $default;
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
	/*{{{public function getRequestUri()*/

	public function getRequestUri()
	{
		if (empty($this->_requestUri)) {
			$this->setRequestUri();
		}

		return $this->_requestUri;	
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
	/*{{{public function setPathInfo()*/

	public function setPathInfo($pathInfo = null)			
	{
		if (null === $pathInfo)	{
			$baseUrl = $this->getBaseUrl();

			if (null === ($requestUri = $this->getRequestUri())){
				return $this;
			}

			if ($pos = strpos($requestUri, '?')) {
				$requestUri = substr($requestUri, 0, $pos);
			}

			$requestUri = urldecode($requestUri);

			if (null !== $baseUrl && ((!empty($baseUrl) && 0 === strpos($requstUri, $baseUrl)) || empty($baseUrl)) && false === ($pathInfo = substr($requestUri, strlen($baseUrl)))) {
				$pathInfo = '';
			} else if (null === $baseUrl || (!empty($baseUrl) && false === strpos($requestUri, $baseUri))) {
				$pathInfo = $requestUri;
			}
		}

		$this->_pathInfo= (string) $pathInfo;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getPathInfo()*/

	#returns everything betweenthe baseUrl and querystring.
	public function getPathInfo()
	{
		if (empty($this->_pathInfo)) {
			$this->setPathInfo();
		}

		return $this->_pathInfo;
	}
	
	/*}}}*/
	/*{{{public function setParamSources()*/

	#set allowed parameter sources
	public function setParamSources(array $paramSources = array())
	{
		$this->_paramSources = $paramSources;	
	}
	
	/*}}}*/
	/*{{{public function getParamSources()*/

	#get list of allowed parameter sources
	public function getParamSources()
	{
		return $this->_paramSources;	
	}
	
	/*}}}*/
	/*{{{public function setParam()*/

	#set a useland parameter
	public function setParam($key, $value)
	{
		$key = null !== ($alais = $this->getAlias($key)) ? $alias : $key;
		parent::setParam($key, $value);

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getParam()*/

	public function getParam($key, $default = null)	
	{
		$keyName = null !== ($alias = $this->getAlias($key)) ? $alias : $key;

		$paramSources = $this->getParamSources();
		if (isset($this->_params[$keyName])) {
			return $this->_params[$keyName];
		} else if (in_array('_GET', $paramSources) && isset($_GET[$keyName])) {
			return $_GET[$keyName];
		} else if (in_array('_POST', $paramSources) && isset($_POST[$keyName])){
			return $_POST[$keyName];
		}

		return $default;	
	}

	/*}}}*/
	/*{{{public function getParams()*/

	#retrieve params	
	public function getParams()
	{
		$return = $this->_params;	
		$paramSources = $this->getParamSources();
		if (in_array('_GET', $paramSources) && isset($_GET) && is_array($_GET)) {
			$return += $_GET; 
		} 

		if (in_array('_POST', $paramSources) && isset($_POST) && is_array($_POST)) {
			$return += $_POST;
		}

		return $return;
	}
	
	/*}}}*/
	/*{{{public function setParams()*/
	
	public function setParams(array $params) 
	{
		foreach ($params as $key => $value)	{
			$this->setParam($key, $value);
		}

		return $this;

	}

	/*}}}*/
	/*{{{public function setAlias()*/

	#set a key alias
	public function setAlias($name, $target)
	{
		$this->_aliases[$name] = $target;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getAlias()*/

	public function getAlias($name)
	{
		if (isset($this->_aliases[$name])) {
			return $this->_aliases[$name];
		}

		return null;
	}

	/*}}}*/
	/*{{{public function getAliases()*/

	#get all alaises
	public function getAliases()
	{
		return $this->_aliases;	
	}
	
	/*}}}*/
	/*{{{public function getMethod()*/

	public function getMethod()
	{
		return $this->getServer('REQUEST_METHOD');
	}
	
	/*}}}*/
	/*{{{public function isPost()*/

	public function isPost()
	{
		if ('POST' == $this->getMethod()) {
			return true;
		}

		return false;
	}
	
	
	/*}}}*/
	/*{{{public function isGet()*/

	public function isGet()
	{
		if ('GET' == $this->getMethod()) {
			return true;
		}

		return false;
	}
	
	/*}}}*/
	/*{{{public function isPut()*/
	
	public function isPut()
	{
		if ('PUT' == $this->getMethod()) {
			return true;
		}

		return false;
	}

	/*}}}*/
	/*{{{public function isDelete()*/

	public function isDelete()
	{
		if ('DELETE' == $this->getMethod())	{
			return true;
		}

		return false;
	}
	
	/*}}}*/
	/*{{{public function isHead()*/
	
	public function isHead()
	{
		if ('HEAD' == $this->getMethod()) {
			return true;	
		}

		return false;
	}
	
	/*}}}*/
	/*{{{public function isOptions()*/
	
	public function isOptions()
	{
		if ('OPTIONS' == $this->getMethod()) {
			return true;
		}

		return false;	
	}
	
	/*}}}*/
	/*{{{public function isXmlHttpRequest()*/

	public function isXmlHttpRequest()
	{
		return 'XMLHttpRequest' == $this->getHeader('X_REQUESTED_WITH');
	}
	
	/*}}}*/
	/*{{{public function isFlashRequest()*/

	public function isFlashRequest()
	{
		$header = strtolower($this->getHeader('USER_AGENT'));

		return strstr($header, 'flash') ? true : false;
	}
	
	/*}}}*/
	/*{{{public function isSecure()*/

	public function isSecure()
	{
		return $this->getScheme() === self::SCHEME_HTTPS;
	}
	
	/*}}}*/
	/*{{{public function getRawBody()*/

	public function getRawBody()
	{
		if ($this->_rawBody === null) {
			$body = file_get_contents('php://input');
			if (strlen(trim($body)) > 0) {
				$this->_rawBody = $body;	
			} else {
				$this->_rawBody = '';
			}
		}

		return $this->_rawBody;
	}
	
	/*}}}*/
	/*{{{public function getHeader()*/

	#首先通过$_SERVER获取头信息参数结果，其次从apache扩展函数中获取
	public function getHeader($header)
	{
		if (empty($header)) {
			require_once 'Zend/Controller/Request/Exception.php';
			throw new Zend_Controller_Request_Exception('An HTTP Header name is required!');
		}

		$temp = 'HTTP_' . strtoupper(str_replace('-', '_', $header));
		if ($isset($_SERVER[$temp])) {
			return $_SERVER[$temp];
		}

		if (function_exists('apache_request_headers')) {
			$headers = apache_request_headers();
			if (isset($headers[$header])) {
				return $headers[$header];
			}

			foreach ($headers as $key => $value) {
				if (strtolower($key) == $header) {
					return $value;
				}
			}
		}

		return false;	
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
	/*{{{public function getClientIp()*/

	public function getClientIp($checkProxy = true)
	{
		if ($checkProxy && $this->getServer('HTTP_CLIENT_IP') !==  null) {
			$clientIp = $this->getServer('HTTP_CLIENT_IP');
		} else if ($checkProxy && $this->getServer('HTTP_X_FORWARDED_FOR') != null) {
			$clientIp = $this->getServer('HTTP_X_FORWARDED_FOR');
		} else {
			$clientIp = $this->getServer('REMOTE_ADDR');
		}

		return $clientIp;
	}
	
	/*}}}*/
	/*}}}*/
}
