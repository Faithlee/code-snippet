<?php
/**
 * @FileName: splAutoload.php
 * @Desc: spl_autoload_register()
 * @Author: Faithlee098
 * @Mail: lijiabin098@126.com 
 * @CTime: Tue 26 Aug 2014 11:42:06 PM CST
 */

class splAutoload {
	public static function register()
	{
		return spl_autoload_register(array(__CLASS__, 'load'));
	}

	public static function load($class)
	{
		$objFilePath = BASE_PATH . $class . '.php';

		if ((file_exists($objFilePath) === false) || is_readable($objFilePath) === false) {
			return false;
		}

		require $objFilePath;

		if (class_exists($class) === false) {
			return false;
		}
	}
}


