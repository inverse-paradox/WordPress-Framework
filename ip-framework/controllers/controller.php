<?php
class IP_Framework_Controller
{
	public function default_action() {
		$controller = new IP_Framework_Controller_Nav_Menus();
		$controller->default_action();
	}
}