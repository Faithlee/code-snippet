<?php
/**
 * @FileName: Cli.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 14 Nov 2014 09:30:27 PM CST
 */

require_once 'Zend/Controller/Response/Abstract.php';

class Zend_Controller_Response_Cli extends Zend_Controller_Response_Abstract {
	
	public $headersSentThrowException = false; 

	public function __toString()
	{
		if ($this->isException() && $this->renderException()) {
			$exceptions = '';
			foreach ($this->getException() as $e) {
				$exceptions .= $e->__toString() . "\n";
			}

			return $exceptions;
		}

		return $this->_body;
	}
}
