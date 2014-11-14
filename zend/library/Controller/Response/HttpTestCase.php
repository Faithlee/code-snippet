<?php
/**
 * @FileName: HttpTestCase.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 14 Nov 2014 09:57:10 PM CST
 */

require_once 'Zend/Controller/Response/Http.php';

class Zend_Controller_Response_HttpTestCase extends Zend_Controller_Response_Http {
	/*{{{members*/
	/*{{{public function sentHeaders()*/

	public function sentHeaders()
	{
		$headers = array();
		foreach ($this->_headersRaw as $header) {
			$headers[] = $header;
		}
		foreach ($this->_headers as $header) {
			$name = $header['name'];
			$key = strtolower($name);
			if (array_key_exists($name, $headers)) {
				if ($header['replace'])	{
					$headers[$key] = $header['name'] . ':' . $header['value'];
				}
			} else {
				$header[$key] = $header['name'] . ':' . $header['value'];
			}
		}

		return $headers;
	}
	
	/*}}}*/
	/*{{{public function canSendHeaders()*/
	
	public function canSendHeaders($throw = false)
	{
		return true;	
	}
	
	/*}}}*/
	/*{{{public function outputBody()*/

	public function outputBody()
	{
		$fullContent = '';
		foreach ($this->_body as $content) {
			$fullContent .= $content;
		}

		return $fullContent;
	}
	
	/*}}}*/
	/*{{{public function getBody()*/

	#get body and/or body segments
	public function getBody($spec = false)
	{
		if (false === $spec) {
			return $this->outputBody();
		} else if (true === $spec) {
			return $this->_body;
		} else if (is_string($spec) && isset($this->_body[$spec])) {
			return $this->_body[$spec];
		}

		return null;
	}
	
	/*}}}*/
	/*{{{public function sendResponse()*/

	#'send' response
	public function sendResponse()
	{
		$headers = $this->sendHeaders()	;
		$content = implode("\n", $headers) . "\n\n";
		if ($this->isException() && $this->renderExceptions()) {
			$exceptions = '';
			foreach ($this->getException() as $e) {
				$exceptions .= $e->__toString() . "\n";
			}
			$content .= $exceptions;
		} else {
			$content .= $this->outputBody();
		}

		return $content;	
	}
	
	/*}}}*/
	/*}}}*/
}
