<?php 
/**
 * @desc 自动添加数据脚本
 * @time 2014/04/01
 * 
 */
header("Content-Type: text/html; charset=UTF-8");
$fileName = 'nameArr.conf';
$descFile = 'description.conf';
$nameStr = $description = '';
if (file_exists($fileName) && file_exists($descFile)) {
	$nameStr = file_get_contents($fileName);
	$description = file_get_contents($descFile);
}

echo date('Y-m-d', 1395279416);die;
//@todo 手工数组组合
eval("\$nameArr = $nameStr;");
eval("\$description = $description;");

if (is_array($nameArr)) {
	foreach ($nameArr as $key => $name) {
		$num = ++$key;
		$modValue = $num % 10;
		$length = ($modValue * 3) + mb_strlen($name);

		$sex = getSex();
		$passwd = getPasswd($length);
		$date = getAddTime();
		$description = getDescription($length);
		$addUser = 'admin';
		$jobCode = '#' . str_pad($num, 5, '0', STR_PAD_LEFT);

		$sql = 'INSERT INTO `dp_keywords` (`code`, `name`, `type`, `passwd`, `description`, `created_user`) ';
		$sql .=	"VALUES ('{$jobCode}', '{$name}', '{$sex}', '{$passwd}', '{$description}', '{$addUser}')\n";
		echo $sql;
	}
}

var_dump($nameArr);
echo __LINE__;
//@todo 获取数据表结构


//@todo curl添加数据


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
	$strlen = mb_strlen($description);
	$randPostion = rand(0, $strlen);
	$desc = mb_substr($description, $randPostion, $length);
	$descLen = mb_strlen($desc);

	if ($descLen > $length) {
		getDescription($length);
	}
	echo $randPostion,0, $length;
die($desc);
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

	$passwdLen = $length > count($passwdArr)  ? 10 : $length;

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
