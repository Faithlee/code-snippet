<?php
/**
 * @FileName: Countable.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 29 Aug 2014 11:42:16 PM CST
 */

class CountMe {
	protected $_count = 3;

	public function count()
	{
		return $this->_count ;
	}
}

//元素的个为1
$count1 = new CountMe();
echo count($count1), PHP_EOL;

class CountHe implements Countable {
	protected $_count = 3;

	public function count()	
	{
		return $this->_count;
	}
}

//元素的个数为3
$count2 = new CountHe;
echo count($count2);
