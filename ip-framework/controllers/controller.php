<?php
class IP_Framework_Controller
{
	public function default_action() {
		include IP_Framework::plugin_path() . '/controllers/controller_setup_theme_options.php';
		$controller = new IP_Framework_Controller_Setup_Theme_Options();
		$controller->default_action();
	}
}