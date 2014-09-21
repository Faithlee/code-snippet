<?php
/**
 * @FileName: escapesChars.php
 * @Desc: 转义字符函数测试
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 21 Sep 2014 12:30:45 PM CST
 */
//http://www.asciitable.com/
echo ord('z'),'aaa';
echo ord(']'),'aa';
echo ord('A'), 'aaa';
echo ord('.'), PHP_EOL;

//echo ord("\000"), 'bbb';
echo ord("#"), PHP_EOL;
echo ord("\n"), PHP_EOL;
echo ord("'"), PHP_EOL;

var_dump(chr("33"));

#1.addcslashes [a..z]/[A..Z]/[A..z] 设置范围建议从小到大
echo addcslashes('foo[ ]', 'A..z'), PHP_EOL;

//echo addcslashes("zoo", 'z..A') , PHP_EOL;
//范围设置要从小到大否则会警告，并只转义最大assii的值和范围边界的；
//结果：\zoo['\.\;']\B
echo addcslashes("zoo['.;']B", 'z..;B') , PHP_EOL;

echo addcslashes("123", '1..10'), PHP_EOL;

#SQL转义处理
#"'" . addcslashes($value, "\000\n\r\\'\"\032") . "'";


#sprintf
$float = 1.1314;
echo sprintf('%F', $float), PHP_EOL;

