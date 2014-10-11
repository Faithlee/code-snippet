<?php
/**
 * @FileName: parseStr.php
 * @Desc: parse_str函数
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sat 11 Oct 2014 10:57:20 PM CST
 */

$str = 'first=vlaue&arr[]=foo+bar&arr[]=baz';


parse_str($str);
echo $first;
echo $arr[0];
echo $arr[1];

parse_str($str, $output);
print_r($output);


function setQuery($output, $value = null) {
	if (is_array($output)) {
		foreach ($output as $key => $val) {
			setQuery($key, $val);
		}
	}

	$_GET[$output] = $value;
}

setQuery($output);
var_export($_GET);

#类似函数还有parse_url， http_build_query ; urldecode;
