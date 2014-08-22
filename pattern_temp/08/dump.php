<?php
/**
 * @FileName: dump.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Fri 22 Aug 2014 11:44:53 PM CST
 */
ob_start();
$arr = array('int', 'string', 'array');
var_dump($arr);
$output = ob_get_clean();

if ('cli' === PHP_SAPI) {
	//正则处理
	$output = preg_replace("/\]\=\>\n(\s+)/", ' = > ', $output);
	echo $output;
} else {
	$ouput = array('hello', 'hi');
	if (extension_loaded('xdebug'))	{
		$flag = ENT_QUOTES;
		if (defined(ENT_SUBSTITUTE)) {
			$flag = ENT_QUOTES | ENT_SUBSTITUTE;
		}

		$output = htmlspecialchars($output, $flag);
	}

	$label = ' ';
	$output = '<pre>'
			. $label 
			. $output
			. '</pre>';
	
	echo $output;	
}
