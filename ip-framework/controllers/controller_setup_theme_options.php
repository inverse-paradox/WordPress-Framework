<?php
class IP_Framework_Controller_Setup_Theme_Options extends IP_Framework_Controller_Abstract
{

	public function save() {
		$this->getModel()->save();
		$this->getView()->display();
	}

}

include IP_Framework::plugin_path() . '/models/model_setup_theme_options.php';
include IP_Framework::plugin_path() . '/views/view_setup_theme_options.php';