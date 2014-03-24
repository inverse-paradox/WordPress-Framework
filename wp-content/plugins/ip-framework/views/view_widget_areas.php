<?php
class IP_Framework_View_Widget_Areas extends IP_Framework_View_Abstract
{

	function display($template = 'default', $folder = 'widget_areas') {

		$this->page_title = 'Manage Sidebars';
		$this->sidebars = $this->getModel()->getSidebars();

		parent::display($template, $folder);

	}

}