<?php
/**
 * @FileName: curlIpAddr.php
 * @Desc: 分页抓取IP直到数量满足为止；
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Thu 06 Nov 2014 02:29:32 PM CST
 */

$limitNum = 100;

$baseUrl = 'http://www.xici.net.co/nn/2';

$content = curlUrl($baseUrl);
if ($content['code'] != '0000') {
	echo $content['msg'];
	die;
}

$text = iconvEncoding($content['data']);
//$content = file_get_contents('ipAddr.txt');

$content = preg_replace(array("|> *<|", "|\r|", "|\n|", "|\t|", "|  |"), array("><"), $text);
$pattern = '#<tr class="(odd)?"><td></td><td><img alt="\w+" src="[^"]*" /></td><td>(?P<ipAddr>[0-9\.]+)</td><td>(?P<port>\d+)</td><td><a href="[^"]*">[^x00-xff]+</a></td><td>高匿</td><td>[A-Z]+</td><td><div title="[0-9\.]+秒" class="bar"><div class="bar_inner fast" style="width:\d+%"></div></div></td><td><div title="[0-9\.]+秒" class="bar"><div class="bar_inner fast" style="width:\d+%"></div></div></td><td>[\d+\-]+\s+[\d+\:]+</td></tr>#isU';

$ipAddr = array();
$matchRes = preg_match_all($pattern, $content, $match);
if (false !== $matchRes && is_array($match)) {
	foreach ($match['ipAddr'] as $k => $ip) {
		$ip = !empty($match['port'][$k]) ? $ip . ':' . $match['port'][$k] : $ip;
		array_push($ipAddr, $ip);
	}
}

print_r($ipAddr);

/**
 * 抓取页面
 */
function curlUrl($url) {
	#返回状态
	$res = array('code' => '0000', 'msg' => 'success', 'data' => '');
	if (empty($url)) {
		return false;
	}

	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_HEADER, 0);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$res['data'] = curl_exec($curl);

	if (curl_errno($curl)) {
		$res['code'] = '0001';
		$res['msg'] = curl_error($curl);

		return $res; 
	}

	return $res;	
}


/**
 * 文本字符编码转换
 */
function iconvEncoding($text = '', $to = 'gbk', $from = 'utf8') {
	#定义字符集
	$encodingArr = array(
		'gbk',
		'utf8',
	);
	if (empty($text) || !in_array($to, $encodingArr)) {
		return false;
	}

	if (empty($from)) {
		$from = mb_detect_encoding($text);
	}
	
	return iconv($from, $to, $text);
}
