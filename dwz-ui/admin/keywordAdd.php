<?php
	$sexArr = array(
		'1' => '男',
		'2' => '女'
	);
?>
<div class="page unitBox" style="display: block;">
	<div class="pageContent">
		<form onsubmit="return validateCallback(this, navTabAjaxDone);" class="pageForm required-validate" action="admin/keyword.ini.php" method="post" novalidate="novalidate">
			<input type="hidden" name="handle" value="addKeyword">
			<div layouth="56" class="pageFormContent nowrap" style="height: 295px; overflow: auto;">
				<dl>
					<dt>编号：</dt>
					<dd>
						<input type="text" class="required textInput valid" maxlength="20" name="code">
					</dd>
				</dl>
				<dl>
					<dt>名称：</dt>
					<dd>
						<input type="text" class="required textInput valid" maxlength="20" name="name">
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
									$option .= '<option value="' . $key . '">' . $value . '</option>';
								}

								echo $option;
							?>
						</select>
					</dd>
				</dl>
				<dl>
					<dt>密码：</dt>
					<dd>
						<input type="password" class="required textInput valid" maxlength="10" minlength="6" name="status">
					</dd>
				</dl>
				<dl>
					<dt>创建日期：</dt>
					<dd>
						<input type="text" class="date"  readonly="true"  dateFmt="yyyy-MM-dd HH:mm:ss" name="created_date">
						<a href="javascript:;" class="inputDateButton">选择</a>
						<span class="info">yyyy-MM-dd HH:mm:ss</span>
					</dd>
				</dl> 
				<dl>
					<dt>添加管理员：</dt>
					<dd>
						<input type="text" class="required textInput valid" maxlength="20" name="created_user">
						<span class="info">class="required"</span>
					</dd>
				</dl> 
				<dl class="nowrap">
					<dt>个人描述：</dt>
					<dd><textarea rows="2" cols="80" name="description" class="textInput" style="width: 405px; height: 61px;"></textarea></dd>
				</dl>
			</div>
			<div class="formBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
					<li>
						<div class="button"><div class="buttonContent"><button class="close" type="button">取消</button></div></div>
					</li>
				</ul>
			</div>
		</form>
	</div>
</div>