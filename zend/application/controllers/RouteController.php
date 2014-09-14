<?php
/**
 * @FileName: RouteController.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 14 Sep 2014 07:36:18 PM CST
 */

class RouteController extends Zend_Controller_Action {
	public function init()
	{
	
	}

	//测试标准路由
	public function staticAction()
	{

		echo '标准路由器测试:';
		echo '当不需要任何匹配的变量,使用标准路由协议<br/>';
		echo 'food/bread被路由至此控制器此方法';	
		die;
	}


	//测试正则路由
	public function pregAction()
	{
		echo '正则路由实现正则的全部方法，功能比上面实现更灵活，可以随意使用<br/>';

		//通过变量1(对应正则的括号)通过正则参数的值
		$param = $this->_getParam(1);
		
		//如果上面的1不舒服,可以为其定义变量名
		//在正则协议中加入第三个参数array(1 => 'param')

		$param1 = $this->_getParam('param');
		var_dump($param, $param1);

		die;
	}


	//正则匹配路由实例
	public function oldproductAction()
	{
		$catId = $this->_getParam('catId');
		$proId = $this->_getParam('proId');
		
		
	#	[code]
	#	$catId => categoryName 
		$catName = 'fish';
	#	$ident => 'something'	
		$ident = 'goldfish';
	#	[code]

		$this->_redirect('/product/' . $catName . '/' . $proId . '-' . $ident . '.html', array('code' => 301));
	}


	//正则匹配路由实例
	public function newproductAction()
	{
		
		echo 'welcome!'	;

		echo '从旧URL来新URL!';
		die;
	}


	public function accountAction()
	{
		echo '主机域名路由协议!';
		echo '过滤了www.domain.com';
	}


}
