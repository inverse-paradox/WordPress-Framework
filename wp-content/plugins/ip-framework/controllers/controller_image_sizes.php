<?php
class IP_Framework_Controller_Image_Sizes extends IP_Framework_Controller_Abstract
{

	public function save() {
		$this->getModel()->save();
		$this->getView()->display();
	}

}