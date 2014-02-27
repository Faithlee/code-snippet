<?php
/**
 * @FileName: hello.php
 * @Desc: gettext test file
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 11 Feb 2014 03:31:42 AM EST
 */

//phpinfo();die;

define('PACKAGE', 'hello');

putenv('LANG=zh_CN');
//指定要用的语系
setlocale(LC_ALL, 'zh_CN');

bindtextdomain(PACKAGE, './localhost/language');
textdomain(PACKAGE);

echo gettext('Hello world!');

