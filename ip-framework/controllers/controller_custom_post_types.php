<?php
class IP_Framework_Controller_Custom_Post_Types extends IP_Framework_Controller_Abstract
{

	public function save() {
		$this->getModel()->save();
		$this->getView()->display();
	}

}

include IP_Framework::plugin_path() . '/models/model_custom_post_types.php';
include IP_Framework::plugin_path() . '/views/view_custom_post_types.php';