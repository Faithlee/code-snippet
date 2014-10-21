<?php
/**
 * @FileName: CsvDataTest.php
 * @Desc:使用迭代器对象的数据供给器
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 21 Oct 2014 11:42:35 PM CST
 */

require './CsvFileIterator.php';

class CsvDataTest extends PHPUnit_Framework_TestCase {
	/**
	 *@dataProvider provider
	 */
	public function testAdd($a, $b, $c)	
	{
		$this->assertEquals($c, $a + $b);
	}

	public function provider()
	{
		return new CsvFileIterator('data.csv');
	}
}
