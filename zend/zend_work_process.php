<?php
/**
 * @FileName: zend_work_process.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Wed 03 Sep 2014 11:31:30 PM CST
 */

Zend 执行流程：
1. Application::bootstrap()::run(); 

2. Application::setOptions($config); [Zend_Application_Bootstrap_Bootstrapper] (将自身传入Bootstapper内)

3. Application/Bootstrap/Bootstrap.php --> Application/Bootstrap/BootstrapAbstract.php [bootstrap]
	BootstrapAbstract::setOptions($options) [$options即application.ini配置数组]

4. I see



###### Zend_Controller 基础 #######
Zend_Controller:
Zend_Controller_Front：
	控制了zend_controller系统的整个工作流；前端控制器模型(FrontController)的解释；
	处理所有由服务器接收的请求并把请求派发给动作控制器；
	在index.php重置后，需要设置控制器目录并且分发；
	前端控制器设置开启视图渲染及错误插件；
	Zend_Controller_Front::setParam('noViewRender', true): 关闭视图渲染；
	Zend_Controller_Front::setParam('noErrorHandlers', true)：关闭默认错误处理；


Zend_Controller_Request：
	描述请求环境和提供设置和读取控制器和动作名字及任何请求参数的方法；
	跟踪动作是否被派遣；
	允许路由器从请求环境中读取信息；	

路由器router：
	是个过程，只能发生一次；在最初收到请求并在第一个控制器被派遣之前；
	主要是基于URL的路径信息将其分解成控制器、动作、和参数；

派遣器dispatcher：
	派遣也是个过程，从请求的对象中取出控制器、动作将它们映射到控制器文件目录及控制器中的方法；
	如果不存在，则派遣默认的；

	
