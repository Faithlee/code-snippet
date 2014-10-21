<?php
/**
 * @FileName: DataTest.php
 * @Desc: 使用返回数组的数组的数据供给器
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 21 Oct 2014 11:20:29 PM CST
 */

#用@dataProvider标注来指定使用哪一个数据供给器；
class DataTest extends PHPUnit_Framework_TestCase {
	/**
	 *@dataProvider provider
	 */
	public function testAdd($a, $b, $c)	
	{
		$this->assertEquals($c, $a + $b);
	}

	public function provider()
	{
		return array(
			array(0, 0, 0),
			array(0, 1, 1),
			array(1, 0, 1),
			array(2, 1, 1), #3并不匹配2
			array(1, 1, 3)
			);
	}

	/**
	 *@dataProvider minProvider
	 */
	public function testMin($a, $b, $c)
	{
		$this->assertEquals($c, $a - $b);
	}
	
	public function minProvider()	
	{
		return array(
			array(3, 1, 2),
			array(10, 5, 4)
		);
	}
}
