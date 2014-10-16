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
		$plugin = new UserPlugin();
		$dispatcher->registerPlugin($plugin);
	}
	
	/*}}}*/
	/*{{{public function _initConfig()*/

	public function _initConfig()
	{
			
	}

	/*}}}*/
	/*{{{public function _initView()*/

	public function _initView(Yaf_Dispatcher $dispatcher)
	{
	
	}

	/*}}}*/




}
