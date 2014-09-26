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
		$filtered = str_replace(array('-', '_', ' '), ' ', (string)$name);
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

	public function setRedirect($url, $code = 302)
	{
		$this->setHeader('Location', $url, true)	
			 ->setHttpResponseCode($code);

		return $this;
	}
	
	/*}}}*/
	/*{{{public function isRedirect()*/

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

	public function clearHeaders()
	{
		$this->_headers = array();

		return $this;
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

	/*}}}*/
}
