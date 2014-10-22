<?php
/**
 * @FileName: ErrorSupperessionTest.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 22 Oct 2014 11:39:24 PM CST
 */

class ErrorSupperesionTest extends PHPUnit_Framework_TestCase {
	public function testFileWrite()
	{
		$writer = new FileWrite();

		$this->assertFalse(@$writer->write('/is-not-wirter/file', 'stuff'));
	}

}

class FileWrite {
	public function write($file, $content)
	{
		$handle = fopen($file, 'w');
		if (false === $handle) {
			return false;
		}
	}
}
