<?php
/**
 * @FileName: assertArrayHasKey.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 23 Oct 2014 12:04:39 AM CST
 */

class AssertTest extends PHPUnit_Framework_TestCase {
	#1.断言数组键值
	public function testArrayKey()
	{
		$this->assertArrayHasKey('foo', array('bar' => 'baz'), 'The array has no key');
	}

	#2.断言类的属性
	public function testAttribute()
	{
		$this->assertClassHasAttribute('foo', 'stdClass');
	}

	#3.断言类的静态属性；
	public function testStaticAttribute()	
	{
		$this->assertClassHasStaticAttribute('bar', 'stdClass', 'Assert has static attribute');
	}

	#4.
	public function testContains()
	{
		$this->assertContains(4, array(1, 2, 3), '判断元素是否被包含！');
	}

	#5.
	public function testAnotherContains()
	{
		$this->assertContains('baz', 'foobar', '判断字符串是否在另一个里');
	}

	#6.
	public function testContainsOnly()
	{
		#断言仅包含字符串类型，false
		//$this->assertContainsOnly('string', array('1', '2', 3));	

		#包含数组类型 true
		#$this->assertContainsOnly('array', array(array(1)));

		#断言包含整型数据 true
		#$this->assertContainsOnly('int', array(123));
		
		$this->assertContainsOnly('string', array('1', '2', 'abc'));
	}

	#7.
	public function testContainsOnlyInstancesOf()
	{
		#断言只包含foo类，false
		#$this->assertContainsOnlyInstancesof('Foo', array(new Foo(), new Bar(), new Foo()), '断言只包含Foo类');

		$this->assertContainsOnlyInstancesof('Foo', array(new Foo()));
	}
	
	#8.
	public function testCount()
	{
		$this->assertCount(3, array(1, 2), '断言两个的数量相同:false');
	}
	
	#9.
	public function testEmpty()
	{
		$this->assertEmpty(array('foo'), '断言参数是空的，返回false');
	}

	/*{{{testEqualXMLStructrue*/
	#10.断言xml文档结点是否相同
	public function testFailureWithDifferentNodeNames()
	{
		$expected = new DOMElement('foo');
		$actual = new DOMElement('bar');

		$this->assertEqualXMLStructure($expected, $actual);
	}
	
	#11.
	public function testFailureWithDifferentNodeAttributes()
	{
		$expected = new DOMDocument;
		$expected->loadXML('<foo bar="true"/>');

		$actual = new DOMDocument;
		$actual->loadXML('<foo baz="false" />');#bax="hehe"
		
		#不考虑节点属性是相同的
		$this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild);
		
		#考虑节点属性时会比较节点属性名是否相同，并且会比较属性数量，但属性的值不会比较，有一条失败则断言失败
		$this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild, true);
	}

	#12.子节点的数量不同
	public function testFailureDifferentChildrenCount()
	{
		$expected = new DOMDocument;
		$expected->loadXML('<foo><bar/><bar/><bar/></foo>');

		$actual = new DOMDocument;
		$actual->loadXML('<foo><bar/></foo>');

		$this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild);
	}

	#13.
	public function testFailureWithDifferentChildren()	
	{
		$expected = new DOMDocument;
		$expected->loadXML('<foo><bar/><bar/><bar/></foo>');

		$actual = new DOMDocument;
		$actual->loadXML('<foo><baz/><baz/><baz/></foo>');

		$this->assertEqualXMLStructure($expected->firstChild, $actual->firstChild);
	}

	/*}}}*/

	#14. 
	public function testEquals()
	{
		#assertNotEquals()断言不相同
		
		$this->assertEquals(1, 0);
	}
	
	#15.
	public function testEquals2()
	{
		$this->assertEquals('bar', 'baz');
	}
	
	#16.
	public function testEquals3()
	{
		$this->assertEquals("foo\nbar\nbaz\n", "foo\nbah\nbaz\n");
	}

	#17.关于特殊类型的
	public function testEquals4()	
	{
		#浮点数的运算
		$this->assertEquals(1.0, 1.1, '浮点数的运算:true', 0.2);
	}

	#18.
	public function testEquals5()
	{
		$this->assertEquals(1.0, 1.1, '浮点数的运算:false');
	}


	#19.
	public function testDOMDocument()
	{
		$expected = new DOMDocument;
		$expected->loadXML('<foo><bar/></foo>');

		$actual = new DOMDocument;
		$actual->loadXML('<bar><foo/></bar>');

		$this->assertEquals($expected, $actual);
	}

	#20.对象的应用
	public function testObjEquals()
	{
		$expected = new stdClass;		
		$expected->foo = 'foo';
		$expected->bar = 'bar';

		$actual = new stdClass;
		$actual->foo = 'bar';
		$actual->baz = 'bar'; 
	
		$this->assertEquals($expected, $actual);
	}

	#21.数组的测试
	public function testArrayEqual()
	{
		$this->assertEquals(array('a', 'b', 'c'), array('a', 'c', 'd'), '断言的数组不相同: false');
	}
	
	#22. assertFalse()
	public function testFalse()
	{
		$this->assertFalse(true);
	}

	#23.assertFileEquals():对比文件的内容
	public function testFileEquals()
	{
		$expected = './expectedFile';
		$actual = './actualFile';

		$this->assertFileEquals($expected, $actual, '断言文件的内容是否相同:false');
	}
	
	#24.断言文件存在
	public function testFileExist()
	{
		#true
		#$this->assertFileExists('./expectedFile');

		$this->assertFileExists('./noExistsFile');
	} 

	#25.断言比较大小
	public function testGreaterThan()
	{
		$this->assertGreaterThan(2, 1, '断言1比2大: false');
	}

	#26 断言大于或等于
	public function testGreaterThanOrEqual()
	{
		$this->assertGreaterThanOrEqual(2, 1, '断言1大于或等于2: false');
	}
	
	#27.断言对象的实例化
	public function testInstanceOf()
	{
		$this->assertInstanceOf('RuntimeException', new Exception);
	}

	#29.断言内部类型
	public function testInternalType()	
	{
		$this->assertInternalType('string', 42, '42的类型是整型: false');
	}

	#30.断言json字符串相同	




}

class Foo{

}

class Bar{

}
