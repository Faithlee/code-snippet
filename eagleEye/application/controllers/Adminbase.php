<?php
/**
 * @FileName: Adminbase.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 25 Dec 2014 01:23:48 AM CST
 */

class AdminbaseController extends Yaf_Controller_Abstract {
	public function init()
	{
		$config = Yaf_Registry::get('config');
        $dbConfig = new Zend_Config($config->resource->toArray());

        $adapter = Zend_Db::factory($dbConfig->administrator);
        Zend_Db_Table::setDefaultAdapter($adapter);

        $adapter->query('set names utf8');		

		Yaf_Registry::set('admin', $adapter);
	}
}
