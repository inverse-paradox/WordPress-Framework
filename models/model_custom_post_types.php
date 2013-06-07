<?php
class IP_Framework_Model_Custom_Post_Types extends IP_Framework_Model_Abstract
{

	function save() {

		$post = $_POST;
		$post_types = array();

		$array_fields = array(
			'capabilities' => 'array',
			'supports' => 'array',
			'taxonomies' => 'array',
		);

		if (isset($post['options'])) {
			foreach ($post['options'] as $entry) {
				$post_type = null;
				$args = null;
				$labels = null;
				foreach ($entry as $key => $value) {
					if ($key == 'post_type') {
						$post_type = $value;
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

				if (substr($post_type, 0, 4) != 'ipf_') {
					$post_type = 'ipf_' . $post_type;
				}

				if ($args['rewrite'] !== false && isset($args['rewrite_slug'])) {
					$args['rewrite'] = array(
						'slug' => $args['rewrite_slug']
					);
					unset($args['rewrite_slug']);
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

				$post_type = array(
					'post_type' => $post_type,
					'args' => $final_args
				);
				$post_types[] = $post_type;

			}
		}

		if (!add_option('ip_framework_post_types', $post_types, null, 'no')) {
			update_option('ip_framework_post_types', $post_types);
		}

		$this->message = 'Custom post types saved.';
		$this->messageType = 'success';

	}

	public function getData() {
		$post_types = get_option('ip_framework_post_types');
		$ided_types = array();
		if ($post_types) {
			foreach ($post_types as $post_type) {
				$id = md5($post_type['post_type']);
				$post_type['id'] = $id;
				$default_args = $this->getArgDefaults();
				foreach ($default_args as $arg => $value) {
					if (!isset($post_type['args'][$arg])) {
						$post_type['args'][$arg] = $value;
					}
				}
				$ided_types[] = $post_type;
			}
		}
		return $ided_types;
	}

	function getLabels() {
		$labels = array(
			'name',
			'singular_name',
			'add_new',
			'all_items',
			'add_new_item',
			'edit_item',
			'new_item',
			'view_item',
			'search_items',
			'not_found',
			'not_found_in_trash',
			'parent_item_colon',
			'menu_name',
		);
		return $labels;
	}
	function getLabelDefaults() {
		$labels = array(
			'name' => '[plural]',
			'singular_name' => '[singular]',
			'add_new' => 'Add New',
			'all_items' => '[plural]',
			'add_new_item' => 'Add New [singular]',
			'edit_item' => 'Edit [singular]',
			'new_item' => 'New [singular]',
			'view_item' => 'View [singular]',
			'search_items' => 'Search [plural]',
			'not_found' => 'No [plural] found',
			'not_found_in_trash' => 'No [plural] found in Trash',
			'parent_item_colon' => 'Parent [singular]',
			'menu_name' => '[plural]',
		);
		return $labels;
	}

	function getArgs() {
		$args = array(
			'label',
			'labels',
			'description',
			'public',
			'exclude_from_search',
			'publicly_queryable',
			'show_ui',
			'show_in_nav_menus',
			'show_in_menu',
			'show_in_admin_bar',
			'menu_position',
			'menu_icon',
			'capability_type',
			'capabilities',
			'map_meta_cap',
			'hierarchical',
			'supports',
			'register_meta_box_cb',
			'taxonomies',
			'has_archive',
			'permalink_epmask',
			'rewrite',
			'query_var',
			'can_export',
		);
		return $args;
	}
	function getArgDefaults() {
		$args = array(
			'label' => null,
			'labels' => null,
			'description' => null,
			'public' => true,
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			'menu_position' => null,
			'menu_icon' => null,
			'capability_type' => 'post',
			'capabilities' => null,
			'map_meta_cap' => null,
			'hierarchical' => false,
			'supports' => array('title', 'editor'),
			'register_meta_box_cb' => null,
			'taxonomies' => array(),
			'has_archive' => false,
			'permalink_epmask' => 'EP_PERMALINK',
			'rewrite' => true,
			'query_var' => true,
			'can_export' => true,
		);
		return $args;
	}

}