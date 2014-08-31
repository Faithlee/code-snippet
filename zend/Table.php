<?php
/**
 * @FileName: Table.php
 * @Desc: 
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Sun 31 Aug 2014 06:09:39 PM CST
 */

class Table extends Zend_Db_Table {
	//todo 通过setup()设置表名和主键
	//但在设置完之后需要再执行一次parent::_setup()
	protected function _setup()
	{
		$this->_name = 'dp_log';
		$this->_primary = 'id';

		parent::_setup();
	}


	public function findAllWithName($name, $count = 0)
	{
		$db = $this->getAdapter();
		$where = $db->quoteInto('title=?', $name);
		$order = 'id desc';

		return $this->fetchAll($where, $order, $count);
	}
}
