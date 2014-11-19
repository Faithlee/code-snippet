<?php
/**
 * @FileName: Bootstrap.php
 * @Desc: bootstrap引导程序，提供了一个全局配置入口
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 12:30:43 AM CST
 */

class Bootstrap extends Yaf_Bootstrap_Abstract {
	/*{{{public function _initPlugin()*/
	
	#注册一个插件
	public function _initPlugin(Yaf_Dispatcher $dispatcher)
	{
		echo '1. initPlugin was called! All route and dispatch plugins begin to be called! <br/>';

		$plugin = new UserPlugin();
		$dispatcher->registerPlugin($plugin);

		echo 'initPlugin was called end!<br/>';
		echo '========================<br/>';
	}
	
	/*}}}*/
	/*{{{public function _initConfig()*/

	public function _initConfig()
	{
		$config = Yaf_Application::app()->getConfig();
		Yaf_Registry::set('config', $config);
	}

	/*}}}*/
	/*{{{public function _initDefaultName()*/

	public function _initDefaultName(Yaf_Dispatcher $dispatcher)
	{
		$dispatcher->setDefaultModule('Index')->setDefaultController('Index')->setDefaultAction('Index');
	}
	
	/*}}}*/
	/*{{{public function _initView()*/

	public function _initView(Yaf_Dispatcher $dispatcher)
	{
	
	}

	/*}}}*/
}
