<?php
class IP_Framework_Model_Custom_Taxonomies extends IP_Framework_Model_Abstract
{

	function save() {

		$post = stripslashes_deep($_POST);
		$taxonomies = array();

		$array_fields = array(
			'capabilities' => 'array',
			'post_types' => 'array',
		);

		if (isset($post['options'])) {
			foreach ($post['options'] as $entry) {

				$taxonomy_name = null;
				$assoc_objects = null;
				$args = null;
				$labels = null;
				foreach ($entry as $key => $value) {
					if ($key == 'taxonomy_name') {
						$taxonomy_name= $value;
					} else if ($key == 'args-post_types') {
						$assoc_objects = $value;
					} else if (substr($key, 0, 4) == 'args') {
						$key = str_replace('args-', '', $key);
						if ($value != '') {
							if ($value == 'true') {
								$value = true;
							} else if ($value == 'false'){
								$value = false;
							} else if (array_key_exists($key, $array_fields) && is_string($value)) {
								$value = array($value);
							}
							$args[$key] = $value;
						}
					} else if (substr($key, 0, 5) == 'label') {
						$key = str_replace('label-', '', $key);
						if ($value != '') {
							$labels[$key] = $value;
						}
					}
				}

				if (substr($taxonomy_name, 0, 4) != 'ipf_') {
					$taxonomy_name = 'ipf_' . $taxonomy_name;
				}

				if ($args['rewrite'] !== false) {
					if (isset($args['rewrite_slug'])) {
						$args['rewrite'] = array(
							'slug' => $args['rewrite_slug']
						);
						unset($args['rewrite_slug']);
					}
				}

				if ($args['query_var'] !== false && $args['query_var'] != $taxonomy_name) {
					if ($args['query_var'] == 'taxonomy' || $args['query_var'] == null) {
						$args['query_var'] = $taxonomy_name;
					} else {
						$args['query_var'] = $args['query_var_string'];
						unset($args['query_var_string']);
					}
				}

				$label_list = $this->getLabels();
				$label_defaults = $this->getLabelDefaults();
				$final_labels = array();
				$singular_name = $labels['singular_name'];
				$plural_name = $labels['name'];
				foreach ($label_list as $label) {
					if (isset($labels[$label])) {
						$final_labels[$label] = $labels[$label];
					} else {
						$final_labels[$label] = str_replace(array('[singular]', '[plural]'), array($singular_name, $plural_name), $label_defaults[$label]);
					}
				}

				$arg_list = $this->getArgs();
				$arg_defaults = $this->getArgDefaults();
				$final_args = array();
				foreach ($arg_list as $arg) {
					if (isset($args[$arg])) {
						$final_args[$arg] = $args[$arg];
					} else {
						if ($arg_defaults[$arg] != null) {
							$final_args[$arg] = $arg_defaults[$arg];
						}
					}
				}

				$final_args['labels'] = $final_labels;

				$taxonomy = array(
					'taxonomy' => $taxonomy_name,
					'object_type' => $assoc_objects,
					'args' => $final_args
				);
				$taxonomies[] = $taxonomy;

			}
		}

		if (!add_option('ip_framework_taxonomies', $taxonomies, null, 'no')) {
			update_option('ip_framework_taxonomies', $taxonomies);
		}

		$this->message = 'Custom taxonomies saved.';
		$this->messageType = 'success';

	}

	public function getData() {
		$taxonomies = get_option('ip_framework_taxonomies');
		$ided_taxonomies = array();
		if ($taxonomies) {
			foreach ($taxonomies as $taxonomy) {
				$id = md5($taxonomy['taxonomy']);
				$taxonomy['id'] = $id;
				$default_args = $this->getArgDefaults();
				foreach ($default_args as $arg => $value) {
					if (!isset($taxonomy['args'][$arg])) {
						$taxonomy['args'][$arg] = $value;
					}
				}
				if ($taxonomy['args']['post_types'] == null) {
					$taxonomy['args']['post_types'] = array();
				}
				if ($taxonomy['object_type'] == null) {
					$taxonomy['object_type'] = array();
				}
				$ided_taxonomies[] = $taxonomy;
			}
		}
		return $ided_taxonomies;
	}

	function getLabelDefaults() {
		$labels = array(
			'name' => '[plural]',
			'singular_name' => '[singular]',
			'search_items' => 'Search [plural]',
			'popular_items' => 'Popular [plural]',
			'all_items' => 'All [plural]',
			'parent_item' => 'Parent [singular]',
			'parent_item_colon' => 'Parent [singular]:',
			'edit_item' => 'Edit [singular]',
			'update_item' => 'Update [singular]',
			'add_new_item' => 'Add New [singular]',
			'new_item_name' => 'New [singular] Name',
			'separate_items_with_commas' => 'Separate [plural] with commas',
			'add_or_remove_items' => 'Add or remove [plural]',
			'choose_from_most_used' => 'Choose from the most used [plural]',
			'menu_name' => '[plural]',
		);
		return $labels;
	}

	function getLabels() {
		$labels = array(
			'name',
			'singular_name',
			'search_items',
			'popular_items',
			'all_items',
			'parent_item',
			'parent_item_colon',
			'edit_item',
			'update_item',
			'add_new_item',
			'new_item_name',
			'separate_items_with_commas',
			'add_or_remove_items',
			'choose_from_most_used',
			'menu_name',
		);
		return $labels;
	}

	function getArgDefaults() {
		$args = array(
			'label' => '',
			'labels' => array(),
			'public' => true,
			'show_in_nav_menus' => true,
			'show_ui' => true,
			'show_tagcloud' => true,
			'show_admin_column' => true,
			'hierarchical' => false,
			'update_count_callback' => null,
			'query_var' => null,
			'rewrite' => true,
			'capabilities' => null,
			'sort' => false,
			'post_types' => null,
		);
		return $args;
	}

	function getArgs() {
		$args = array(
			'label',
			'labels',
			'public',
			'show_in_nav_menus',
			'show_ui',
			'show_tagcloud',
			'show_admin_column',
			'hierarchical',
			'update_count_callback',
			'query_var',
			'rewrite',
			'capabilities',
			'sort',
			'post_types',
		);
		return $args;
	}

}