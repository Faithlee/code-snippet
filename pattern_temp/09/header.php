<?php
/**
 * @FileName: weather_api.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 24 Apr 2014 11:22:27 PM CST
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);
//http://www.baidu.com/s?wd=%D6%D8%C7%EC
echo rawurldecode('%D6%D8%C7%EC');

//echo urlencode('天津');


header('Expires: Mon, 26 Sep 2014 05:00:00 GMT');

###当有下面内容输出时返回值才是true
print('hello');
flush();
echo "whatever";

###返回 false
$status = headers_sent($file, $line);
var_dump($status);

if ($status === true) {
	throw new Exception('Cannot sent header, header has sent in ' . $file . ', line:' . $line);
}


