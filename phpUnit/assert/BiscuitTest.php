<?php
/**
 * @FileName: BiscuitTest.php
 * @Desc: assertThat()
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 24 Oct 2014 12:24:52 AM CST
 */

require './Biscuit.php';

class BuscuitTest extends PHPUnit_Framework_TestCase {
	public function testEquals()
	{
		$theBiscuit = new Biscuit('Ginger');
		$myBiscuit = new Biscuit('Ginger');

		$this->assertThat(
			$theBiscuit,
			$this->logicalNot($this->equalTo($myBiscuit))
		);
	}
}
