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
