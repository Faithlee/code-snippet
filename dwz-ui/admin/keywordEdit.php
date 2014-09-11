<?php 
	$link = mysql_connect('localhost', 'root', '123456') or die('连接失败!');
	mysql_select_db('dwz_zf') or die();
	$keywordId = intval($_GET['id']);
	mysql_query('set names utf8');
	$res = mysql_query("select * from dp_keywords where id={$keywordId}");
	$keywordInfo = array();
	if (!empty($res)) {
		$keywordInfo = mysql_fetch_assoc($res);
	}

	$sexArr = array(
		'1' => '男', 
		'2' => '女'
	);

?>
<div class="page unitBox" style="display: block;">
	<div class="pageContent">
		<form onsubmit="return validateCallback(this, navTabAjaxDone);" class="pageForm required-validate" action="admin/keyword.ini.php" method="post" novalidate="novalidate">
			<input type="hidden" name="handle" value="updateKeyword">
			<input type="hidden" name="id" value="<?php echo $keywordInfo['id']; ?>">
			<div layouth="56" class="pageFormContent nowrap" style="height: 352px; overflow: auto;">
				<dl>
					<dt>编号：</dt>
					<dd>
						<input type="text" readOnly class="required textInput valid" maxlength="20" name="code" value="<?php echo $keywordInfo['code']; ?>">
					</dd>
				</dl>
				<dl>
					<dt>名称：</dt>
					<dd>
						<input type="text" class="required textInput valid" maxlength="20" name="name" value="<?php echo $keywordInfo['name']; ?>">
					</dd>
				</dl>
				<dl>					
					<dt>性别：</dt>
					<dd>
						<select class="combox" name="type">
							<option value="">请选择</option>
							<?php 
								$option = '';
								foreach ($sexArr as $key => $value) {
									$selected = $keywordInfo['type'] == $key ? ' selected' : '';

									$option .= '<option ' . $selected . 'value="' . $key . '">' . $value . '</option>';
								}

								echo $option;
							?>
						</select>
					</dd>
				</dl>
				<dl>
					<dt>密码：</dt>
					<dd>
						<input type="password" class="required textInput valid" maxlength="10" minlength="6" name="status" value="<?php echo $keywordInfo['status'];?>">
					</dd>
				</dl>
				<dl>
					<dt>创建日期：</dt>
					<dd>
						<input type="text" class="date"  readonly="true"  dateFmt="yyyy-MM-dd HH:mm:ss" name="created_date" value="<?php echo $keywordInfo['created_date'];?>">
						<a href="javascript:;" class="inputDateButton">选择</a>
						<span class="info">yyyy-MM-dd HH:mm:ss</span>
					</dd>
				</dl> 
				<dl>
					<dt>添加管理员：</dt>
					<dd>
						<input type="text" class="required textInput valid" maxlength="20" name="created_user" value="<?php echo $keywordInfo['created_user'];?>">
						<span class="info">class="required"</span>
					</dd>
				</dl> 
				<dl class="nowrap">
					<dt>个人描述：</dt>
					<dd><textarea rows="2" cols="80" name="description" class="textInput" style="width: 405px; height: 61px;"><?php echo $keywordInfo['description']; ?></textarea></dd>
				</dl>

			</div>
			<div class="formBar">
				<ul>
					<!--<li><a class="buttonActive" href="javascript:;"><span>保存</span></a></li>-->
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
					<li>
						<div class="button"><div class="buttonContent"><button class="close" type="button">取消</button></div></div>
					</li>
				</ul>
			</div>
		</form>
	</div>
</div>
