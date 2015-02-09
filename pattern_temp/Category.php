<?php
/**
 * @FileName: Category.php
 * @Desc: 无限分类
 * @Author: Faithlee
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Mon 02 Feb 2015 12:08:28 AM CST
 * @version 1.0 todo 可能存在缺陷目前只支持到第四级分类
 */

class Category {

	/**
	 * 保存分类路径 
	 * 
	 * @var string
	 * @access public
	 */
	public $path = '';

	/**
	 * 保存节点路径到数组中 
	 * 
	 * @var array
	 * @access public
	 */
	public $pathArr = array();
	
	/**
	 * 保存格式化后的分类
	 * 
	 * @var array
	 * @access public
	 */
	public $categoryArr = array();

	/*{{{*/

	/**
	 * 构造函数
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		//echo '1231231'	;
	}

	/*}}}*/
	/*{{{public function format()*/

	/**
	 * 格式化为树状分类 
	 * 
	 * @param mixed $data 
	 * @param int $parentId 
	 * @access public
	 * @return void
	 */
	public function format($data, $parentId = 0, $rootId = 0)
	{	
		//$categoryArr = array();
		for ($i = 0; $i < count($data); $i++) {
			if ($parentId == $data[$i]['parent_id']) {
				if ($parentId == $rootId) {
					$this->path = $data[$i]['classid'];	
				}	

				if ($parentId != 0) {
					$arr = explode('-', $this->path);
					$count = count($arr);
					//echo $data[$i]['classid'].'@'.$data[$i]['parent_id'];
					//上级节点叶子不是当前节点的父节点	
					if ($arr[$count - 1] != $data[$i]['parent_id']) {
						$flag = false;
						foreach ($this->pathArr as $k => $path) {
							$pidArr = explode('-', $path);
							$num = count($pidArr);
							if ($pidArr[$num - 1] == $data[$i]['parent_id']) {

								$pidArr[] = $data[$i]['classid'];
								$this->path = implode('-', $pidArr);
								
								$flag = true;

								break;
							}
						}
								
						if ($flag == false) {
							$this->path = $arr[0] . '-' . $data[$i]['classid'];
						}
					} else {
						//上级节点叶子是当前节点的父节点
						$this->path .= '-' . $data[$i]['classid'];
					}
										
					$this->pathArr[] = $this->path;
				} 

				//分割深度
				$diff = $rootId > 0 ? 2 : 1;
				$depth = explode('-', $this->path);
				$num = (count($depth) - $diff) * 2;
				
				$data[$i]['classname'] = str_repeat('&nbsp;&nbsp;', $num) . $data[$i]['classname'];
				$this->categoryArr[] = $data[$i];
				
				$this->format($data, $data[$i]['classid'], $rootId);
			} 
		}
		
		return true;
	}

	/*}}}*/
}
