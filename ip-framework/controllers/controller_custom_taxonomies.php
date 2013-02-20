<?php
class IP_Framework_Controller_Custom_Taxonomies extends IP_Framework_Controller_Abstract
{

	public function save() {
		$this->getModel()->save();
		$this->getView()->display();
	}

}