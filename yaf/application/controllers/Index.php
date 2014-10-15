<?php
/**
 * @FileName: Index.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 12:30:12 AM CST
 */
class IndexController extends Yaf_Controller_Abstract {
	public function indexAction()
	{
		echo 'test';
		#以下方式不支持，可能是低版本在使用
		#$this->view->return = 'hello, world!';

		$this->getView()->assign('return', 'Hello World');

		$this->getView()->title = 'Yaf Framework';
	}
}
