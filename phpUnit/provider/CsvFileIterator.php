<?php
/**
 * @FileName: CsvFileIterator.php
 * @Desc: 迭代器对象
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 21 Oct 2014 11:37:21 PM CST
 */

class CsvFileIterator implements Iterator {

	protected $file;

	protected $key = 0;

	protected $current;

	public function __construct($file)
	{
		$this->file = fopen($file, 'r');
	}

	public function __destruct()
	{
		fclose($this->file);
	}


	public function rewind()
	{
		rewind($this->file);
		$this->current = fgetcsv($this->file);
		$this->key = 0;
	}
	
	public function valid()
	{
		return !feof($this->file);
	}

	public function key()
	{
		return $this->key;
	}

	public function current()
	{
		return $this->current;
	}

	public function next()
	{
		return $this->key++;	
	}
}

$csv = new CsvFileIterator('./data.csv');
print_r($csv);


