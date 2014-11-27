<?php
/**
 * @FileName: Template.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 27 Nov 2014 10:56:11 PM CST
 */

class Template implements Yaf_View_Interface {
	#todo 分离此变量
	public $tplVars = array();

	public function assign($spec, $value = null) 
	{
		if (is_array($spec)) {
			foreach ($spec as $key => $val) {
				$this->$key = $val;
			}

			return $this;
		}

		$this->$spec = $value;
		
		return $this;
	}

	public function render($tpl, $tpl_vars = null)
	{
		$viewFile = APPLICATION_PATH . '/application/views/' . $tpl . '.php';
		if (!file_exists($viewFile)) {
			throw new Exception("{$tpl}.php not found!");	
		}

		require_once $viewFile;	
	}

	public function setScriptPath($tpl_dir)
	{
		if (is_readable($tpl_dir)) {
			$this->scriptPath = $tpl_dir;

			return;
		}

		$this->scriptPath = $this->getScriptPath();
		return $this;
	}

	public function getScriptPath()
	{
		return APPLICATION_PATH . '/application/views';
	}

	public function display($tpl, $tpl_vars = null)
	{
		$viewFile = APPLICATION_PATH . '/application/views/' . $tpl . '.php';
		if (!file_exists($viewFile)) {
			throw new Exception("{$tpl}.php not found!");	
		}

		if (is_array($tpl_vars)) {
			foreach ($tpl_vars as $key => $val) {
				$this->$key = $val;
			}
		}

		ob_start();

		#extract 分离变量处理
		require_once $viewFile;

		$content = ob_get_contents();
		ob_end_clean();

		echo $content;

		die;
	}

	public function __set($name, $val) 
	{
		$this->$name = $val;	
	}

	public function __get($name)
	{
		return $this->$name;
	}
}
