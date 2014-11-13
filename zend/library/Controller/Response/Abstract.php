<?php
/**
 * @FileName: Abstract.php
 * @Desc: Response Abstract 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 24 Sep 2014 11:38:04 PM CST
 */

abstract Zend_Controller_Response_Abstract {
	/*{{{members*/

	/**
	 * body content
	 */
	protected $_body = array();

	/**
	 * exception stack
	 */	
	protected $_exceptions = array();
	
	/**
	 * headers
	 */	
	protected $_headers = array();

	/**
	 * raw headers
	 */
	protected $_headersRaw = array();

	/**
	 * HTTP response code
	 */
	protected $_httpResponseCode = 200;

	/**
	 * flag response or redirect
	 */
	protected $_isRedirect = false;

	/**
	 * whether or not to render exceptions
	 */
	protected $_renderExceptions = false;

	/**
	 * flag 
	 */
	public $headersSentThrowsException = true;

	/*}}}*/
	/*{{{functions*/
	/*{{{protected function _normalizeHeader()*/
	
	//normalizes a header name to x-capitalized-names;
	protected function _normalizeHeader($name)
	{
		$filtered = str_replace(array('-', '_'), ' ', (string)$name);
		$filtered = ucwords($strtolower($filtered));
		$filtered = str_replace(' ', '-', $filtered);

		return $filtered;
	}

	/*}}}*/
	/*{{{public function setHeader()*/

	//set a header and replace header name
	public function setHeader($name, $value, $replace = false)
	{
		$this->canSendHeaders(true);

		$name = $this->_normalizeHeader($name);
		$value = (string) $value;

		#$replace设置为true时，将所有的headers头都替换，并只保留一个
		if ($replace) {
			foreach ($this->_headers as $key => $header) {
				if ($name == $header['name']) {
					unset($this->_headers[$key]);
				}
			}
		}

		$this->_headers[] = array(
			'name' => $name,
			'value' => $value,
			'replace' => $replace
		);

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setRedirect()*/

	#set Location header and response code.
	public function setRedirect($url, $code = 302)
	{
		$this->setHeader('Location', $url, true)	
			 ->setHttpResponseCode($code);

		return $this;
	}
	
	/*}}}*/
	/*{{{public function isRedirect()*/

	#is this a redirect?
	public function isRedirect()
	{
		return $this->_isRedirect;
	}
	
	/*}}}*/
	/*{{{public function getHeaders()*/
	
	public function getHeaders()
	{
		return $this->_headers;
	}

	/*}}}*/
	/*{{{public function clearHeaders()*/

	#clear headers
	public function clearHeaders()
	{
		$this->_headers = array();

		return $this;
	}
	
	/*}}}*/
	/*{{{public function clearHeader()*/

	#clear the specified HTTP header
	public function clearHeader($name)
	{
		if (!count($this->_headers)) {
			return $this;
		}

		foreach ($this->_headers as $index => $header) {
			if ($name == $header['name']) {
				unset($this->_headers[$index]);
			}
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setRawHeader()*/

	#
	public function setRawHeader($value)
	{
		$this->canSendHeaders(true);
		if ('Location' == substr($value, 0, 8)) {
			$this->_isRedirect = true;
		}

		$this->_headerRaw[] = (string) $value;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getRawHeaders()*/

	#retrieve all
	public function getRawHeaders()
	{
		return $this->_headersRaw;	
	}
	
	/*}}}*/
	/*{{{public function clearRawHeaders()*/
	
	#clear all
	public function clearRawHeaders()
	{
		$this->_headersRaw = array();

		return $this;
	}
	
	/*}}}*/
	/*{{{public function clearRawHeader()*/

	#clear the specified raw http header
	public function clearRawHeader($headerRaw)
	{
		if (!count($this->_headerRaw)) {
			return $this;
		}

		$key = array_search($headerRaw, $this->_headersRaw);
		unset($this->_headersRaw[$key]);

		return $this;
	}
	
	/*}}}*/
	/*{{{public function clearAllHeaders()*/

	#clear all headers, normal and raw
	public function clearAllHeaders()
	{
		return $this->clearHeaders()	
					->clearRawHeaders();
	}
	
	/*}}}*/
	/*{{{public function setHttpResponseCode()*/

	//set http response code to use with headers
	public function setHttpResponseCode($code)
	{
		if (!is_int($code) || (100 > $code) || (599 < $code)) {
			require_once 'Zend/Controller/Response/Exception.php';
			throw new Zend_Controller_Response_Exception('Invalid HTTP response code');
		}

		if ((300 <= $code) && (307 >= $code)) {
			$this->_isRedirect = true;
		} else {
			$this->_isRedirect = false;
		}

		$this->_httpResponseCode = $code;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getHttpResponseCode()*/

	#retrieve HTTP response code
	public function getHttpResponseCode()
	{
		return $this->_httpResponseCode;	
	}
	
	/*}}}*/
	/*{{{public function canSendHeaders()*/

	//whethere send headers?
	public function canSendHeaders($throw = false)
	{
		$ok = headers_sent($file, $line);
		if ($ok && $throw && $this->headersSentThrowException) {
			require_once 'Zend/Controller/Response/Exception.php';
			throw new Zend_Controller_Response_Exception('Cannot send headers; headers already sent in ' . $file . ', line ' . $line);
		}

		return !$ok;	
	}

	/*}}}*/
	/*{{{public function sendHeaders()*/
	
	#send any headers specified;
	public function sendHeaders()
	{
		if (count($this->_headersRaw) || count($this->_headers) || (200 != $this->_httpResponseCode)) {
			$this->canSendHeaders(true);
		} elseif (200 == $this->_httpResponseCode) {
			return $this;
		}

		$httpCodeSent = false;

		foreach ($this->_headersRaw as $header) {
			if (!$httpCodeSent && $this->_httpResponseCode) {
				header($header, true, $this->_httpResponseCode);
				$httpCodeSent = true;
			} else {
				header($header);
			}
		}

		foreach ($this->_headers as $header) {
			if (!$httpCodeSent && $this->_httpResponseCode) {
				header($headr['name'] . ': ' . $header['value'], $header['replace'], $this->_httpResponseCode);
				$httpCodeSent = true;
			}
		}

		if (!$httpCodeSent) {
			header('HTTP/1.1' . $this->_httpResponseCode);
			$httpCodeSent = true;
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function setBody()*/

	#set body content
	public function setBody($content, $name = null)
	{
		if (null === $name || !is_string($name)) {
			$this->_body = array('default' => (string) $content);
		} else {
			$this->_body[$name] = (string) $content;
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function appendBody()*/
	
	#append content to the body content
	public function appendBody($content, $name = null)
	{
		if (null === $name || !is_string($name)) {
			if (isset($this->_body['default'])) {
				$this->_body['default'] .= (string)$content;
			} else {
				$this->_body['default'] = (string)$content;
			}
		} elseif (isset($this->_body[$name])) {
			$this->_body[$name] .= (string)$content;
		} else {
			return $this->append($name, $content);
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function clearBody()*/

	#clear body
	public function clearBody($name = null)
	{
		if (null != $name) {
			$name = (string)$name;
			if (isset($this->_body[$name])) {
				unset($this->_body[$name]);

				return true;
			}

			return false;
		}

		$this->_body = array();

		return true;
	}
	
	/*}}}*/
	/*{{{public function getBody()*/

	#return the body content
	public function getBody($spec = false)
	{
		if ($spec === false) {
			ob_start();
			$this->outputBody();
			return ob_get_clean();
		} else if ($spec === true) {
			return $this->_body;	
		} else if (is_string($spec) && isset($this->_body[$spec])) {
			return $this->_body[$spec];
		}

		return null;
	}
	
	/*}}}*/
	/*{{{public function append()*/

	public function append($content, $name)
	{
		if (!is_string($name)) {
			require_once 'Zend/Controller/Response/Exception.php';
			throw new Zend_Controller_Response_Exception('Invalid body segment key ' . gettype($name));
		}

		if (isset($this->_body[$name])) {
			unset($this->_body[$name]);
		}

		$this->_body[$name] = (string)$content;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function prepend()*/
	
	public function prepend($name, $content)
	{
		if (!is_string($name)) {
			require_once 'Zend/Controller/Response/Exception.php';

			throw new Zend_Controller_Response_Exception('Invalid body segment key ' . gettype($name));
		}

		#向前插入
		if (isset($this->_body[$name])) {
			unset($this->_body[$name]);
		}

		$new = array($name => (string)$content);
		$this->_body = $new + $this->_body;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function insert()*/

	#insert a named segment into the body content array	
	public function insert($name, $content, $parent = null, $before = false)	
	{
		if (!is_string($name)) {
			require_once 'Zend/Controller/Response/Exception.php';

			throw new Zend_Controller_Response_Exception('Invalid body segment key ' . gettype($name));
		}

		if (null !== $parent || !is_string($parent)) {
			require_once 'Zend/Controller/Response/Exception.php';

			throw new Zend_Controller_Response_Exception('Invalid body segment parent key ' . gettype($parend));
		}

		if ($this->_body[$name]) {
			unset($this->_body[$name]);
		}

		if (null === $parent || !isset($this->_body[$naem])) {
			return $this->append($name, $content);
		}

		$ins = array($name => (string)$content);
		$key = array_keys($this->_body);
		$loc = array_search($parent, $key);
		if (!$before) {
			++$loc;
		}

		if (0 === $loc) {
			$this->_body = $ins + $this->_body;
		} else if ($loc >= count($this->_body)) {
			$this->_body = $this->_body + $ins;
		} else {
			$pre = array_slice($this->_body, 0, $loc);
			$post = array_slice($this->_body, $loc);
			$this->_body = $pre + $ins + $post;
		}

		return $this;
	}
	
	/*}}}*/
	/*{{{public function outputBody()*/
	
	#echo the body segments
	public function outputBody()
	{
		$body = implode('', $this->_body);
		echo $body;
	}
	
	/*}}}*/
	/*{{{public function setException()*/

	#register an exception with the response
	public function setException(Exception $e)
	{
		$this->_exceptions[] = $e;

		return $this;
	}
	
	/*}}}*/
	/*{{{public function getException()*/

	#retrieve the exception stack
	public function getException()
	{
		return $this->_exceptions;	
	}
	
	/*}}}*/
	/*{{{public function isException()*/
	
	#has an exception been registered with the response
	public function isException()
	{
		return !empty($this->_exceptions);
	}
	
	/*}}}*/
	/*{{{public function hasExceptionOfType()*/

	#contain an exception of a given type
	public function hasExceptionOfType($type)
	{
		foreach ($this->_exceptions as $e)	{
			if ($e instanceof $type) {
				return true;
			}
		}

		return false;
	}
	
	/*}}}*/
	/*{{{public function hasExceptionOfMessage()*/

	#contain an exception of a given message?
	public function hasExceptionOfMessage($message)
	{
		foreach ($this->_exceptions as $e) {
			if ($message == $e->getMessage()) {
				return true;
			}
		}

		return false;
	}
	
	/*}}}*/
	/*{{{public function hasExceptionCode()*/

	#contain exception of a given code?
	public function hasExceptionCode($code)
	{
		foreach ($this->_exceptions as $e) {
			if ($code == $e->getCode()) {
				return true;
			}
		}

		return false;
	}
	
	/*}}}*/
	/*{{{public function getExceptionByType()*/

	#retrieve all exception of a given type
	public function getExceptionByType($type)
	{
		$exceptions = array();
		foreach ($this->_exceptions as $e) {
			if ($e instanceof $type) {
				$exceptions[] = $e;
			}
		}
	
		if (empty($exception)) {
			$exceptions = false;
		}

		return $exceptions;
	}
	
	/*}}}*/
	/*{{{public function getExceptionByMessage()*/

	#retrieve all exception of a given message
	public function getExceptionByMessage($message)
	{
		$exceptions = array();
		foreach ($this->_exceptions as $e) {
			if ($message == $e->getMessage()) {
				$exceptions[] = $e;
			}
		}

		return empty($exceptions) ? false : $exceptions;
	}
	
	/*}}}*/
	/*{{{public function getExceptionByCode()*/

	#retrieve all exception of a given code
	public function getExceptionByCode($code)
	{
		$exceptions = array();
		foreach ($this->_exceptions as $e) {
			if ($code == $e->getCode()) {
				$exceptions[] = $e;
			}
		}

		return empty($exceptions) ? false : $exceptions;
	}
	
	/*}}}*/
	/*{{{public function renderExceptions()*/

	#weather or not to render exceptions
	public function renderExceptions($flag = null)
	{
		if (null !== $flag)	{
			$this->_renderExceptions = $flag ? true : false;
		}

		return $this->_renderExceptions;	
	}
	
	/*}}}*/
	/*{{{public function sendResponse()*/

	public function sendResponse()
	{
		$this->sendHeaders();

		if ($this->isException() && $this->renderException()) {
			$exceptions = '';
			foreach ($this->getException() as $e) {
				$exceptions .= $e->__toString()	. "\n";
			}

			echo $exceptions;
			return;
		}
		
		$this->outputBody();
	}
	
	/*}}}*/
	/*{{{public function __toString()*/

	public function __toString()
	{
		ob_start();

		$this->sendResponse();

		return ob_get_clean();
	}
	
	/*}}}*/

	/*}}}*/
}
