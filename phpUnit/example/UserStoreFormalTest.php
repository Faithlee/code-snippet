<?php
/**
 * @FileName: UserStoreFormalTest.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 27 Oct 2014 10:23:00 PM CST
 */

require_once 'UserStore.php';

$store = new UserStore();

$store->addUser('admin', 'admin@sina.com', '123456');

$user = $store->getUser('admin@sina.com');

print_r($user);
