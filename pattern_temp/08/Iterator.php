<?php
/**
 * @FileName: Iterator.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 29 Aug 2014 11:57:32 PM CST
 */

class myIterator implements Iterator {
	private $position = 0;

	private $array = array(
		'firstElement',
		'secondElement',
		'thirdElement',
	);

	public function __construct()
	{
		$this->position = 0;
	}

	public function rewind()
	{
		var_dump(__METHOD__);
		$this->position = 0;	
	}

	public function key()
	{
		var_dump(__METHOD__);
		return $this->position;
	}

	public function current()
	{
		var_dump(__METHOD__);
		return $this->array[$this->position];
	}

	public function next()
	{
		var_dump(__METHOD__);
		++$this->position;
	}

	public function valid()
	{
		var_dump(__METHOD__);
		return isset($this->array[$this->position]);
	}
}


$myIterator = new myIterator();

foreach ($myIterator as $key => $val) {
	var_dump('aaaa', $key, $val);

	echo PHP_EOL;
}
