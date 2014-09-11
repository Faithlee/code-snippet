<?php
	require_once 'connect.php';

	$link = mysql_connect($hostName, $user, $passwd)  or die('数据库连接失败！');
	mysql_select_db($dbName, $link) or die('数据库选择失败');
	mysql_query('set names utf8');

	/**
	 * 添加数据
	 */
	if (!empty($_POST) && $_POST['handle'] == 'addKeyword') {
	
		$sql = "insert into dp_keywords (code, name, description, type, status, created_user, created_date) 
				values ('{$_POST['code']}', '{$_POST['name']}', '{$_POST['description']}', '{$_POST['type']}',
				'{$_POST['status']}', '{$_POST['created_user']}', '{$_POST['created_date']}' )";
	
		$res = mysql_query($sql);
		if ($res) {
			$msg = '添加成功！';
			$statusCode = 200;
		} else {
			$msg = '添加失败！';
			$statusCode = 300;
		}

		$status = array(
			'statusCode' => $statusCode, 
			'message' => $msg,
			'rel' => 'keywords',
			'callbackType' => 'closeCurrent',
		);

		echo json_encode($status);
	}

	/**
	 * 删除一条数据
	 */
	if (!empty($_GET['handle']) && $_GET['handle'] == 'delKeyword' && !empty($_GET['id'])) {
		$keyId = intval($_GET['id']);

		$sql = 'delete from dp_keywords where id=' . $keyId;
		$res = mysql_query($sql);
		if ($res) {
			$msg = '删除成功！';
			$statusCode = 200;
		} else {
			$msg = '删除失败！';
			$statusCode = 300;
		}

		$status = array(
			'statusCode' => $statusCode, 
			'message' => $msg,
			//'rel' => '',	//为空时更新当前tab
		);

		echo json_encode($status);
	}

	/**
	 * 更新一条数据
	 */
	if (!empty($_POST) && $_POST['handle'] == 'updateKeyword' && !empty($_POST['id'])) {
		unset($_POST['handle']);
		$field = '';
		foreach ($_POST as $key => $value) {
			$field .= "`{$key}`='{$value}',";
		}

		$sql = 'update dp_keywords set ' . rtrim($field, ',') . ' where `id`=' . intval($_POST['id']);
		$res = mysql_query($sql);

		if ($res) {
			$statusCode = 200;
			$message = '操作成功!';		
		} else {
			$statusCode = 300;
			$message = '操作失败！';
		}

		$status = array(
			'statusCode' => $statusCode, 
			'message' => $message,
			'navTabId' => 'keywords',
			'rel' => '',
			'callbackType' => 'closeCurrent',
			'forwardUrl' => ''
		);

		echo json_encode($status);
	}

	mysql_close($link);
?>