<?php
class IP_Framework_View_Custom_Post_Types extends IP_Framework_View_Abstract
{

	function display($template = 'default', $folder = 'custom_post_types') {
		
		$this->page_title = 'Manage Custom Post Types';
		$this->post_types = $this->getModel()->getData();
		$this->taxonomies = $this->getTaxonomies();

		parent::display($template, $folder);
		
	}

	function arrayToTextarea($array) {
		$text = implode("\n", $array);
		return $text;
	}
	
	function getTaxonomies() {
		$wp_taxonomies = get_taxonomies(null, 'objects');
		$taxonomies = array();
		foreach ($wp_taxonomies as $wp_taxonomy) {
			if ($wp_taxonomy->public === true) {
				$taxonomies[$wp_taxonomy->name] = $wp_taxonomy->labels->name;
			}
		}
		return $taxonomies;
	}

}