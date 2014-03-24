<?php
class IP_Framework_View_Setup extends IP_Framework_View_Abstract
{

	function display($template = 'default', $folder = 'setup') {

		$this->page_title = 'IP Framework: Setup Defaults';

		parent::display($template, $folder);

	}

}