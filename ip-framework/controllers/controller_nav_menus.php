<?php
class IP_Framework_Controller_Nav_Menus extends IP_Framework_Controller_Abstract
{

	public function save() {
		$this->getModel()->save();
		$this->getView()->display();
	}

}

include IP_Framework::plugin_path() . '/models/model_nav_menus.php';
include IP_Framework::plugin_path() . '/views/view_nav_menus.php';