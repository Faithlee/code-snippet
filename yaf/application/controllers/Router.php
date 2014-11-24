<?php
/**
 * @FileName: Router.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 20 Nov 2014 11:08:21 PM CST
 */

class RouterController extends Yaf_Controller_Abstract {
	public function init()	
	{
		Yaf_Dispatcher::getInstance()->autoRender(false);
	}

	public function staticAction()
	{
				
	}

	#simple协议
	public function simpleAction()
	{
		echo '<pre>==================== ' . __METHOD__ . ' start ====================<br/>';
		#print_r($this);

		$request = $this->getRequest();
		#print_r($request);

		#baseUri
		$baseUri = $request->getBaseUri();
		var_dump($baseUri);
		
		#requestUri
		$requestUri = $request->getRequestUri();
		var_dump($requestUri);

		#协议:simple('m', 'c', 'a'); 
		#request_uri：/index.php?m=index&c=request&a=http&name=Lily
		#获取当前参数时使用get方法，
		
		echo '参数name:' . $request->get('name') . '<br/>';

		echo '==================== ' . __METHOD__ . ' end ====================<br/><br/></pre>';				
	}

	#rewrite路由协议
	public function rewriteAction()
	{
		echo '<pre>====================' . __METHOD__ . ' start ====================<br/>';
			
		$request = $this->getRequest();

		$baseUri = $request->getBaseUri();
		$requestUri = $request->getRequestUri();

		var_dump($baseUri, $requestUri);

		#1.协议:product/:ident
		#$param = $request->getParam('ident');
		#echo '参数ident：' . $param . '<br/>';
		
		#2.协议:product/:ident/*		
		$param = $request->getParam('ident');
		$params = $request->getParams();
		echo '参数ident：' . $param . '<br/>';
		echo '参数params：<br/>'; 
	   	print_r($params);
		 

		echo '==================== ' . __METHOD__ . ' end ====================<br/><br/></pre>';
	}

	public function regexAction()
	{
		echo '<pre>====================' . __METHOD__ . ' start ====================<br/>';

		$request = $this->getRequest();

		$baseUri = $request->getBaseUri();
		$requestUri = $request->getRequestUri();

		echo '参数var:' . $this->getRequest()->getParam('var') . '<br/>';

		echo '==================== ' . __METHOD__ . ' end ====================<br/><br/></pre>';
	}
}
