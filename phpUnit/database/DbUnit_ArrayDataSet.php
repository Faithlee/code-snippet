<?php
/**
 * @FileName: DbUnit_ArrayDataSet.php
 * @Desc: 
 * @Author: lijiawei
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Sat 25 Oct 2014 06:22:57 PM CST
 */

class DbUnit_ArrayDataSet extends PHPUnit_Extensions_Database_DataSet_AbstractDataSet {

	/**
	 * @var array
	 */
	protected $tables = array();

	public function __construct(array &$data)
	{
		foreach ($data as $tableName => $rows) {
			if (isset($rows[0])) {
				$columns = array_keys($rows[0]);
			}

			$metaData = new PHPUnit_Extensions_Database_DataSet_DefaultTableMetaData($tableName);
			$table = new PHPUnit_Extensions_Database_DataSet_Default($metaData);

			foreach ($rows as $row) {
				$table->addRow($row);
			}

			$this->tables[$tableName] = $table;
		}
	}

	protected function createIterator($reverse = false)
	{
		return new PHPUnit_Extensions_Database_DataSet_DefaultTableInterator($this->table, $reverse);
	
	}

	public function getTable($tableName)
	{
		if (!isset($this->table[$tableName])) {
			throw new InvalidArgumentException("$tableName is not a table in the current database");
		}

		return $this->tables[$tableName];
	}
}

