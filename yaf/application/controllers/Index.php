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

		$this->getView()->assign('title', 'Yaf framework');
		$this->getView()->return = 'hello, world!';
	}


	public function demoAction()
	{
		#throw new Exception('测试异常案例');


		#没有注册也能用，将类名分割成路径到library目录寻找
		#$loader = Yaf_Loader::getInstance();
		#$loader->registerLocalNamespace(array('Foo'));

		$bar = new Foo_Bar();
		print_r($bar->getData());


		Yaf_Dispatcher::getInstance()->autoRender(false);
	}
}
