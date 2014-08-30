<?php
/**
 * @FileName: parseIni.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sat 30 Aug 2014 11:51:46 PM CST
 */

/*{{{test*/
//define('BIRD', 'dodo bird');
//
////未开启每一节的配置
//$iniArr = parse_ini_file('example.ini');
//print_r($iniArr);
//
////开启每一节的配置,返回多维数组
//$iniArr = parse_ini_file('example.ini', true);
//print_r($iniArr);
/*}}}*/

$appIni = parse_ini_file('../application/configs/application.ini', true);
//print_r($appIni);
$iniArr = array();

foreach ($appIni as $key => $data) {
	$pieces = explode(':', $key);
	$section = trim($pieces[0]);
	switch (count($pieces)) {
		case 1: 
			$iniArr[$section] = $data;
			break;
		case 2:
			$extension = trim($pieces[1]);
			$iniArr[$section] = array_merge(array(';extends' => $extension), $data);
			break;

		default:
			break;
	}
}

//print_r($iniArr);

$product = $iniArr['production'];
$data = array();
foreach ($product as $key => $value) {
	$data[$key] = processKey(array(), $key, $value);
}

print_r($data);

function processKey($config = array(), $key, $val) {
	if (strpos($key, '.' !== false)) {
		$pieces = explode('.', $key, 2);
		if (strlen($pieces[0]) && strlen($pieces[1])) {
			if (!isset($config[$pieces[0]])) {
				if ($pieces[0] === '0' && !empty($config)) {
					$config = array($pieces[0] => $config);
				} else {
					$config[$pieces[0]] = array();
				}
			} else if (!is_array($config[$pieces[0]])) {
				break;
			}

			$config[$pieces[0]] = processKey($config[$pieces[0]], $pieces[1], $value);
		} else {
			break;
		}
	} else {
		$config[$key] = $val;
	}

	return $config;
}
