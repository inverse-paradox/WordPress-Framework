<?php
class IP_Framework_Controller_Custom_Post_Types extends IP_Framework_Controller_Abstract
{

	public function save() {
		$this->getModel()->save();
		$this->getView()->display();
	}

}