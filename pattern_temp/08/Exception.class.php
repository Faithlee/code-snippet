<?php
/**
 * @FileName: Exception.class.php
 * @Desc: MyException
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 12 Aug 2014 10:49:21 PM CST
 */

class MyException extends Exception {
	
	private $_previous = null;	

	public function __construct($msg = '', $code = 0, Exception $previous = null)
	{
		if (version_compare(PHP_VERSION, '5.3.0', '<')) {
			parent::__construct($msg, (int)$code);
			$this->_previous = $previous;
		} else {
			parent::__construct($msg, (int)$code, $previous);
		}
	}

	public function __call($method, array $args)
	{
		if ('getprevious' == strtolower($method)) {
			return $this->_getPrevious();
		}

		return null;
	}


	public function __toString()
	{
		if (version_compare(PHP_VERSION, '5.3.0', '<'))	{
			if (null !== $e->getPrevious()) {
				return $e->__toString() . 
					"\n\nNext" . 
					parent::__toString();
			}
		} 
	
		return parent::__toString();
	}
	
	protected function _getPrevious()	
	{
		return $this->_previous;		
	}
}

try {
	throw new MyException('throw a Exception');
} catch (MyException $e) {
	echo $e->getMessage();
}
