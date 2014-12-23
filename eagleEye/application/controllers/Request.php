<?php
/**
 * @FileName: Request.php
 * @Desc: request测试
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 24 Nov 2014 01:29:37 AM CST
 */

class RequestController extends Yaf_Controller_Abstract {
	public function init() 
	{
		Yaf_Dispatcher::getInstance()->autoRender(false);
	}

	public function httpAction()
	{
		echo '<pre>==================== ' . __METHOD__ . ' start ====================<br/>';
		#print_r($this);

		#注意此处http实例化得到的结果不全，应该是使用controller对象中的getRequest()
		//$request = new Yaf_Request_Http();
		$request = $this->getRequest();
		#print_r($request);

		#baseUri
		$baseUri = $request->getBaseUri();
		var_dump($baseUri);
		
		#requestUri
		$baseUri = $request->getRequestUri();
		var_dump($baseUri);

		var_dump($request->getModuleName(),
			$request->getControllerName(),
			$request->getActionName(),
		   	$request->getParams());


		var_dump($request->isGet());

		echo '==================== ' . __METHOD__ . ' end ====================<br/><br/></pre>';
	}

	public function simpleAction()
	{
	
	}
}
