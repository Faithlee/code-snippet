<?php
/**
 * @FileName: Index.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 12:30:12 AM CST
 */
class IndexController extends Yaf_Controller_Abstract {
	public function init()
	{
		Yaf_Dispatcher::getInstance()->autoRender(false);
	}

	public function indexAction()
	{
		#开启或关闭视图渲染
		#Yaf_Dispatcher::getInstance()->disableView();
		Yaf_Dispatcher::getInstance()->enableView();

		$this->getView()->assign('title', 'Yaf framework');
		$this->getView()->return = 'hello, world!';

		//print_r($this->getView());

		$this->getView()->display('Index');
	}


	public function demoAction()
	{
		echo '<pre>====================' . __METHOD__ . ' start ====================<br/>';

		#throw new Exception('测试异常案例');

		#没有注册也能用，将类名分割成路径到library目录寻找
		#$loader = Yaf_Loader::getInstance();
		#$loader->registerLocalNamespace(array('Foo'));

		$bar = new Foo_Bar();
		print_r($bar->getData());

		echo '==================== ' . __METHOD__ . ' end ====================<br/><br/></pre>';
	}

	#Yaf_Application
	public function appAction()
	{
		echo '<pre>====================' . __METHOD__ . ' start ====================<br/>';

		$app = Yaf_Application::app();
		#print_r($app);
	
		#当前环境名
		$environ = $app->environ();
		var_dump($environ);
		
		#申明的模块名
		$module = $app->getModules();
		var_dump($module);

		#应用目录
		$appDir = $app->getAppDirectory();
		var_dump($appDir);

		#应用配置
		$config = $app->getConfig();
		print_r($config);
			
		#Yaf_Dispatcher的实例
		$dispatcher = $app->getDispatcher();
		print_r($dispatcher);

		echo '==================== ' . __METHOD__ . ' end ====================<br/><br/></pre>';
	}

	#Yaf_loader类测试
	public function loadAction()
	{
		Yaf_Dispatcher::getInstance()->autoRender(false);

		$loader = Yaf_Loader::getInstance();

		echo '<pre>==================== ' . __METHOD__ . ' start ====================<br/>';

		#设置library路径；参数true设置为全局，将会覆盖application.ini中设置本地类，否则用配置文件的路径
		#$loader->setLibraryPath(APPLICATION_PATH . '/application/librarys', true); #注册为全局
		#$loader->setLibraryPath(APPLICATION_PATH . '/application/library');		#仍然配置文件的

		#获取library路径
		$libraryPath = $loader->getLibraryPath();
		var_dump($libraryPath);


		#注册本地类，以Foo开头
		$loader->registerLocalNamespace(array('Foo'));

		#获取本地类：Foo开头的
		$namespace = $loader->getLocalNamespace();
		var_dump($namespace);

		###?加载本地类:不明白其用法
		$loader->autoload('Local_Shop');

		###?Local前缀并未注册本地类，但仍然能够找到
		$shop = new Local_Shop();
		$shop->sellFruit();

		echo '==================== ' . __METHOD__ . ' end ====================<br/><br/></pre>';
	}
}
