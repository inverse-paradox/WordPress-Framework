<?php
class IP_Framework_View_Setup_Theme_Options extends IP_Framework_View_Abstract
{

	function display($template = 'default', $folder = 'setup_theme_options') {
		
		$this->page_title = 'Manage Theme Options';
		$options = $this->getModel()->getData();

		if ($options) {
			foreach ($options as $option) {
				$option['options'] = $this->arrayToTextarea($option['options']);	
				$this->options[] = $option;
			}
		} else {
			$this->options = false;
		}

		parent::display($template, $folder);
		
	}

	function arrayToTextarea($array) {
		$text = implode("\n", $array);
		return $text;
	}

}