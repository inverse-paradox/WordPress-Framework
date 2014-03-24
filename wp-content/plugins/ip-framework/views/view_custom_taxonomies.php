<?php
class IP_Framework_View_Custom_Taxonomies extends IP_Framework_View_Abstract
{

	function display($template = 'default', $folder = 'custom_taxonomies') {
		
		$this->page_title = 'Manage Custom Taxonomies';
		$this->taxonomies = $this->getModel()->getData();
		$this->post_types = $this->getPostTypes();

		parent::display($template, $folder);
		
	}

	function arrayToTextarea($array) {
		$text = implode("\n", $array);
		return $text;
	}
	
	function getPostTypes() {
		$wp_post_types = get_post_types(null, 'objects');
		$post_types = array();
		foreach ($wp_post_types as $wp_post_type) {
			if ($wp_post_type->public === true) {
				$post_types[$wp_post_type->name] = $wp_post_type->labels->name;
			}
		}
		return $post_types;
	}

}