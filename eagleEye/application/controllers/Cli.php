<?php
/**
 * @FileName: Cli.php
 * @Desc: 命令行程序示例
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 26 Nov 2014 01:00:29 AM CST
 */

class CliController extends Yaf_Controller_Abstract {
	public function init()
	{
		Yaf_Dispatcher::getInstance()->autoRender(false);
		echo __METHOD__, PHP_EOL;
	}

	public function indexAction()
	{
		echo '==================== ' . __METHOD__ . ' start ====================', PHP_EOL;

		$request = $this->getRequest();

		echo $request->getModuleName(), PHP_EOL;
		echo $request->getRequestUri(), PHP_EOL;

		echo '==================== ' . __METHOD__ . ' end ====================', PHP_EOL;
	}
}
