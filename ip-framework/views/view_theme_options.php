<?php
class IP_Framework_View_Theme_Options extends IP_Framework_View_Abstract
{

	function display($template = 'default', $folder = 'theme_options') {
		
		$this->page_title = 'Manage Theme Options';
		$this->fields = $this->getModel()->getOptionFields();
		$this->options = $this->getModel()->getOptions();

		parent::display($template, $folder);
		
	}

}