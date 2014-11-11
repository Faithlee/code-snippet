<?php
/**
 * @FileName: HttpTestCase.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 11 Nov 2014 11:25:28 PM CST
 */

require_once 'Zend/Controller/Request/Http.php';


class Zend_Controller_Request_HttpTestCase {
	/**
	 * requiest headers
	 */
	protected $_headers = array();
	
	/**
	 * request method
	 */
	protected $_method = 'GET';

	/**
	 * Raw POST body
	 */
	protected $_rawBody;


	protected $_validMethodTypes = array(
		'DELETE',
		'GET',
		'HEAD',
		'OPTIONS',
		'POST',
		'PUT', 
	);

	/*{{{member*/
	/*{{{public function clearQuery()*/

	#clear GET values 
	public function clearQuery()
	{
		$_GET = array();

		return $this;	
	}
	
	/*}}}*/
	/*{{{public function clearPost()*/

	#clear POST value
	public function clearPost()
	{
		$_POST = array();

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setRawBody()*/

	#set raw body value
	public function setRawBody($content)
	{
		$this->_rawBody = (string) $content;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getRawBody()*/
	
	#clear raw post body
	public function getRawBody()
	{
		return $this->_rawBody;
	}
	
	/*}}}*/
	/*{{{public function setCookie()*/

	#set a cookie
	public function setCookie($key, $value)
	{
		$_COOKIE[(string) $key]	= $value;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setCookies()*/

	public function setCookies(array $cookies)	
	{
		foreach ($cookies as $key => $value) {
			$_COOKIE[$key] = $value;
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function clearCookie()*/

	#clear COOKIE value
	public function clearCookie()
	{
		$_COOKIE = array();

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setMethod()*/
	
	#set request method
	public function setMethod($type)
	{
		$type = strtoupper(trim(((string)$type)));
		if (in_array($type, $this->_validMethodTypes)) {
			require_once 'Zend/Controller/Exception.php';
			throw new Zend_Controller_Exception('Invalid request method specified');
		}

		$this->_method = $type;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getMethod()*/
	
	#get request method
	public function getMethod()
	{
		return $this->_method;
	}
	
	
	/*}}}*/
	/*{{{public function setHeader()*/
	
	#set a request header
	public function setHeader($key, $value)
	{
		$key = $this->_normalizeHeaderName($key);
		$this->_headers[$key] = (string) $value;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setHeaders()*/

	#set request headers
	public function setHeaders(array $headers)
	{
		foreach ($headers as $key => $value) {
			$this->setHeader($key, $value);
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getHeader()*/

	#get request header
	public function getHeader($header, $default = null)
	{
		$header = $this->_normalizeHeaderName($header);

		if (array_key_exists($header, $this->_headers)) {
			return $this->_headers[$header];
		}

		return $default;
	}
	
	/*}}}*/
	/*{{{public function getHeaders()*/

	#get all request header
	public function getHeaders()
	{
		return $this->_headers;	
	}
	
	/*}}}*/
	/*{{{public function clearHeaders()*/
	
	#clear header
	public function clearHeaders()
	{
		$this->_headers = array();

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getRequestUri()*/

	#get request uri
	public function getRequestUri()
	{
		return $this->_requestUri;	
	}
	
	/*}}}*/
	/*{{{private function _normalizeHeaderName()*/

	#normalize header name
	private function _normalizeHeaderName($name)
	{
		$name = strtoupper($name);
		$name = str_replace('-', '_', $name);

		return $name;
	}
	
	/*}}}*/
	/*}}}*/
}
