<?php
/**
 * @FileName: Template.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: lijiabin098@126.com 
 * @CTime: Thu 27 Nov 2014 10:56:11 PM CST
 */

class Template implements Yaf_View_Interface {
	/**
	 * tplVars 控制器到视图的变量
	 * 
	 * @var array
	 * @access protected
	 */
	protected $tplVars = array();


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

	#只渲染模板，但不打印到页面
	public function render($tpl, $tpl_vars = null)
	{
		var_dump( $tpl);
		$tplFile =  $this->getScriptPath() . "/{$tpl}.tpl.php";
		if (!file_exists($tplFile)) {
			throw new Exception($tplFile . " not found!");	
		}

		$eleFile = $this->getScriptPath() . "/{$tpl}.ele.php";
		if (file_exists($eleFile)) {
			require_once $eleFile;

			$className = "Template{$tpl}";
			$front = new $className;	
		}

		if (is_array($tpl_vars)) {
			foreach ($tpl_vars as $key => $val) {
				$this->tplVars[$key] = $val;
			}
		}

		extract($this->tplVars);

		ob_start();
		
		require_once $tplFile;	
		$content = ob_get_contents();

		ob_end_clean();

		return $content;
	}

	public function display($tpl, $tpl_vars = null)
	{
		$tplFile = $this->getScriptPath() . "/{$tpl}.tpl.php";
		if (!file_exists($viewFile)) {
			throw new Exception($tplFile . ' not found!');	
		}

		#可以不设置ele文件
		$eleFile = $this->getScriptPath() .  "/{$tpl}.ele.php";
		if (file_exists($eleFile)) {
			require_once $eleFile;

			$className = "Template{$tpl}";
			$front = new $className;
		}

		if (is_array($tpl_vars)) {
			foreach ($tpl_vars as $key => $val) {
				$this->tplVars[$key] = $val;
			}
		}

		#extract 分离变量处理
		extract($this->tplVars);

		ob_start();
		
		require_once $viewFile;
		$content = ob_get_contents();

		ob_end_clean();
		echo $content;
		die;
	}

	#修改视图路径
	public function setScriptPath($tpl_dir)
	{
		if (is_readable($tpl_dir)) {
			$this->scriptPath = $tpl_dir;

			return $this;
		}

		$this->scriptPath = $this->getScriptPath();

		return $this;
	}

	#设置默认视图路径
	public function getScriptPath()
	{
		return APPLICATION_PATH . '/application/views';
	}

	public function __set($name, $val) 
	{
		$this->tplVars[$name] = $val;	
	}

	public function __get($name)
	{
		#return $this->tplVars[$name];
		return NULL;
	}
}
