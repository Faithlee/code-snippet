<?php
/**
 * @FileName: Test.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 16 Oct 2014 10:44:42 PM CST
 */

class PublishController extends Yaf_Controller_Abstract {
	public function init()
	{
		#如果是ajax请求关闭自动模板渲染
		if ($this->getRequest()->isXmlHttpRequest()) {
			Yaf_Controller_Abstract::getInstance()->autoRender(false);
		}
	}

	public function indexAction()
	{
		echo __METHOD__;	

	}
}
