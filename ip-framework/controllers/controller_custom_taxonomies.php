<?php
class IP_Framework_Controller_Custom_Taxonomies extends IP_Framework_Controller_Abstract
{

	public function save() {
		$this->getModel()->save();
		$this->getView()->display();
	}

}

include IP_Framework::plugin_path() . '/models/model_custom_taxonomies.php';
include IP_Framework::plugin_path() . '/views/view_custom_taxonomies.php';