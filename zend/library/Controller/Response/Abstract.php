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

	//
	public function setHeader($name, $value, $replace = false)
	{
		$this->canSendHeaders(true);
	}
	
	/*}}}*/





	/*}}}*/



}
