<?php
class IP_Framework_Controller
{
	public function default_action() {
		$controller = new IP_Framework_Controller_Setup_Theme_Options();
		$controller->default_action();
	}
}