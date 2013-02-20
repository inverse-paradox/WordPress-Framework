<?php
class IP_Framework_Controller_Setup_Theme_Options extends IP_Framework_Controller_Abstract
{

	public function save() {
		$this->getModel()->save();
		$this->getView()->display();
	}

}