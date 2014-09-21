<?php
/**
 * @FileName: DbTable.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 21 Sep 2014 06:57:11 PM CST
 */

class DbTable extends Zend_Db_Table {
	/**
	 * 对应表名【属性不能为私有】
	 */
	protected $_name = 'dp_log';


	/**
	 * 对应当前表的主键【属性不能为私有】
	 * 
	 * @var string
	 * @access private
	 */
	protected $_primary = 'id';

}
