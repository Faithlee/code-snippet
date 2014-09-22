<?php
/**
 * @FileName: directory.php
 * @Desc: 目录迭代器
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Mon 22 Sep 2014 11:42:48 PM CST
 */

$path = dirname(__FILE__) . '/../';
$iterator = new DirectoryIterator($path);
//print_r($iterator);

foreach ($iterator as $fileinfo) {
	//print_r($fileinfo);

	
	#打印目录及文件，isDot()表示.或..
#	if (!$fileinfo -> isDot()) {
#		//打印目录及文件
#		var_dump($fileinfo->getFileName());
#	}

	##打印目录
#	if ($fileinfo->isDot() || !$fileinfo->isDir()) {
#		continue;
#	}
#
#	var_dump($fileinfo->getFileName());
	
}
