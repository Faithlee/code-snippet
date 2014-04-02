<?php 
/**
 * @desc 自动添加数据脚本
 * @time 2014/04/01
 * 
 */
header("Content-Type: text/html; charset=UTF-8");

//设置是否导入
$import = false;
$fileName = 'nameArr.conf';
$descFile = 'description.conf';
$nameStr = $description = '';
if (file_exists($fileName) && file_exists($descFile)) {
	$nameStr = file_get_contents($fileName);
	$description = file_get_contents($descFile);
}

//@todo 手工数组组合
eval("\$nameArr = $nameStr;");
eval("\$description = $description;");

if (is_array($nameArr) && $import) {
	//URL全路径
	$url = 'http://localhost/dwzUI/admin/keyword.ini.php';
	$_POST = array();
	foreach ($nameArr as $key => $name) {
		$num = ++$key;
		$length = mb_strlen($name);

		$_POST['name'] = $name;
		$_POST['type'] = getSex();
		$_POST['code'] = '#' . str_pad($num, 5, '0', STR_PAD_LEFT);
		$_POST['status'] = getPasswd($length);
		$_POST['created_user'] = 'admin';
		$_POST['description'] = getDescription(20);
		$_POST['created_date'] = getAddTime();
		$_POST['handle'] = 'addKeyword';
		$addRes = curlAddData($url, $_POST);

		if (!$addRes) {
			echo "{$key}、添加失败！\n";
		} else {
			echo "{$key}、添加成功！\n";
		}
	}
}

//@todo 
/**
 * curl添加数据
 *  
 * @param string $url 全路径URL
 * @parma array $data 
 * @return bool 
 */
function curlAddData($url, $data){
	if (!is_array($data)) {
		return false;
	}

	$handle = curl_init($url);

	curl_setopt($handle, CURLOPT_HEADER , 0);
	curl_setopt($handle, CURLOPT_RETURNTRANSFER, 1);

	curl_setopt($handle, CURLOPT_POST, 1);
	curl_setopt($handle, CURLOPT_POSTFIELDS, $data);


	if (! $res = curl_exec($handle)) {
		trigger_error(curl_error($handle));
	}

	return $res;
}

getTableStructure('dp_keywords');
//@todo 获取数据表结构
function getTableStructure($tableName){
	require_once 'connect.php';

	$tableArr = array();
	$link = mysql_connect($hostName, $user, $passwd)  or die(mysql_error());
	mysql_select_db($dbName, $link) or die(mysql_error());
	//函数已过期，不建议使用
	//$result = mysql_list_tables($dbName, $link);
	$sql = ' SHOW TABLES FROM ' . $dbName;
	$result = mysql_query($sql);

	if (!empty($result)) {
		while ($row = mysql_fetch_array($result)) {
			$tableArr[] = $row[0];
		}
	}

	if (!in_array($tableName, $tableArr)) {
		throw new Exception("导出数据表结构失败！", 1);
	}

	$select = "SELECT * FROM {$tableName} LIMIT 1";
	$selectRes = mysql_query($select);
	if (empty($selectRes)) {
		throw new Exception(mysql_error(), 1);
	}

	$fields = mysql_num_fields($selectRes);
	
	//todo 需要获取字段名称及类型	
	return $fields;
}

//@todo xml数据结构


//导入数据表


/*=======================================================*/
/**
 * 随机获取介绍
 * @param  integer $length 设置长度
 * @return string          
 */
function getDescription($length = 20) {
	global $description;
	$desc = '';
	$strlen = mb_strlen($description, 'UTF-8');
	$randPostion = rand(0, $strlen);
	$desc = mb_substr($description, $randPostion, $length, 'UTF-8');
	$descLen = mb_strlen($desc, 'UTF-8');
	
	return $desc;
}

/**
 * 获取性别类型
 * @return int 
 */
function getSex(){
	$sexArr = array(1, 2);
	$key = array_rand($sexArr);

	return $sexArr[$key];
}

/**
 * 生成随机密码
 * @param  integer $length 密码长度
 * @return string 
 */
function getPasswd($length = 10) {
	$letterArr = range('a', 'z');
	$numArr = range(0, 9);

	$passwdArr = array_merge($letterArr, $numArr);
	shuffle($passwdArr);
	$lenArr = array(6, $length, 10);
	$max = max($lenArr);
	$min = min($lenArr);
	$passwdLen = rand($min, $max);
	
	$passwd = array_rand($passwdArr, $passwdLen);
	$passwdStr = '';

	foreach ($passwd as $value) {
		$passwdStr .= $passwdArr[$value];
	}

	return $passwdStr;
}

/**
 * 获取添加时间
 * @return string
 */
function getAddTime(){
	$year = 2014;
	$month = rand(1, 4);
	$day = rand (1, 30);

	$time = mktime(0, 0, 0, $month, $day, $year);

	return date('Y-m-d H:i:s');
}
