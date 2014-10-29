<?php
/**
 * 首页控制器测试类
 *
 *
 */


require_once PHPUNIT_PATH . '/application/library/Test/PHPUnit/TestCase.php';

class IndexTest extends  Test\PHPUnit\TestCase {

    /**
     * 测试index方法
     */
	public function testIndex() 
	{
		#将默认的Index模块更改为Default
        $request = new \Yaf\Request\Simple("CLI", "Default", "Index", 'index');
		//print_r($request);

		//todo $this->_application通过在bootstrap中用全局变量代替

        $response = $this->_application->getDispatcher()
                ->returnResponse(true)
                ->dispatch($request);

        $content = $response->getBody();

        $this->assertEquals('index phtml', $content, '内容不相同');
    }
}
