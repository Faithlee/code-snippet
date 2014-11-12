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

	/*}}}*/
}
