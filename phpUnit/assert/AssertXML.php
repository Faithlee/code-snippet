<?php
/**
 * @FileName: AssertXML.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 24 Oct 2014 12:36:53 AM CST
 */

class AssertXML extends PHPUnit_Framework_TestCase {
	public function testXml()	
	{
		#注意：此处断言3次，原因还需要断言文件是否存在
		$this->assertXmlFileEqualsXmlFile('./expected.xml', 'actual.xml', '断言两个文件的内容是相同的: false');
	}

	public function testXmlStringEqualsXmlFile()
	{
		$this->assertXmlStringEqualsXmlFile('./expected.xml', '<foo><baz/></foo>');
	}

	public function testXmlStringEqualsXmlString()
	{
		$this->assertXmlStringEqualsXmlString(
			'<foo><bar/></foo>',
			'<foo><baz/></foo>'
		);
	}
}

