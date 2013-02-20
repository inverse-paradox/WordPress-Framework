<?php
class IP_Framework_Controller_Nav_Menus extends IP_Framework_Controller_Abstract
{

	public function save() {
		$this->getModel()->save();
		$this->getView()->display();
	}

}