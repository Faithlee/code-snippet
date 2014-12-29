<?php
/**
 * @FileName: Template.php
 * @Desc: 
 * @Author: Faithlee
 * @Mail: li.jiawei@leftbrain.com.cn
 * @CTime: Mon 29 Dec 2014 11:42:55 AM CST
 */

class TemplateController extends Yaf_Controller_Abstract {
	public function init()
	{
		
		
	}

	//simple edit
	public function editAction()
	{
		$this->getView()->display('FormEdit');
	}

	//detail edit
	public function edit2Action()
	{
		
		$this->getView()->display('FormEdit2');
	}

	//edit product
	public function edit3Action()
	{
			
		$this->getView()->display('FormEdit3');
	}

	//editor test
	public function editorAction()
	{
		$this->getView()->display('FormEditor');
	}

	public function tableAction()
	{
		
	}

	public function toolTipAction()
	{
		
	}

	public function calendarAction()
	{
		
	}
}
