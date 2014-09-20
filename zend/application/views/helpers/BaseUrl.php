<?php
/**
 * @FileName: BaseUrl.php
 * @Desc: 创建视图辅助类
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sat 20 Sep 2014 08:07:22 PM CST
 */

class Zend_View_Helper_BaseUrl {
	
	public function baseUrl()
	{
		$front = Zend_Controller_Front::getInstance();

		return '辅助视图助手：' . $front->getBaseUrl();
	}
}
