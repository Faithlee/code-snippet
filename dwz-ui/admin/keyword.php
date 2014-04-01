<?php
	require 'connect.php';
	$module = 'keywords';
	$link = mysql_connect($hostName, $user, $passwd) or die('数据库连接失败！');
	mysql_select_db($dbName) or die('数据库选择失败');
	mysql_query('set names utf8');

	$res = mysql_query('select * from dp_keywords');
?>
<div class="pageHeader">
	<form id="pagerForm" onsubmit="return navTabSearch(this);" action="" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="orderField" value=""/>
	<input type="hidden" name="orderDirection" value=""/>
	
	<div class="searchBar">
		<ul class="searchContent">
			<li>
				<label>编号：</label>
				<input type="text" name="code" value="<?php //echo $_REQUEST['code']?>"/>
			</li>
			<li>
				<label>名称：</label>
				<input type="text" name="name" value="<?php //echo $_REQUEST['name']?>"/>
			</li>
		</ul>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></li>
			</ul>
		</div>
	</div>
	</form>
</div>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<li><a class="add" href="admin/keywordAdd.php" target="navTab" title="添加标签"><span>新增</span></a></li>
			<li><a class="delete" href="admin/keyword.ini.php?navTabId=<?php echo $module; ?>&handle=delKeyword&id={sid_obj}" target="ajaxTodo" title="你确定要删除吗？" warn="请选择一条数据"><span>删除</span></a></li>
			<li><a class="edit" href="admin/keywordEdit.php?id={sid_obj}" target="navTab" mask="true" warn="请选择一条数据" title="编辑标签"><span>编辑</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="138">
		<thead>
		<tr>
			<th width="100" orderField="code" >编号</th>
			<th orderField="name">名称</th>
			<th>描述</th>
		</tr>
		</thead>
		<tbody>
		<?php 
			if (!empty($res)) {
				$trHtml = '';
				$total = 0;
				while ($row = mysql_fetch_assoc($res)) {
					$trHtml .= '
						<tr target="sid_obj" rel="' . $row['id'] . '">
							<td>' . $row['code'] . '</td>
							<td>' . $row['name'] . '</td>
							<td>' . $row['description'] . '</td>
						</tr>';
					$total++;
				}

				echo $trHtml;
			} 
		?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>共<?php echo $total;?>条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo $total;?>" numPerPage="<?php echo 5;?>" pageNumShown="10" currentPage="<?php echo $page;?>"></div>
	</div>
</div>
