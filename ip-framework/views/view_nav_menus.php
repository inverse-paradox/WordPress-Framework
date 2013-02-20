<?php
class IP_Framework_View_Nav_Menus extends IP_Framework_View_Abstract
{

	function display($template = 'default', $folder = 'nav_menus') {
		
		$this->page_title = 'Manage Nav Menus';
		$this->menus = $this->getModel()->getMenus();

		parent::display($template, $folder);
		
	}

}