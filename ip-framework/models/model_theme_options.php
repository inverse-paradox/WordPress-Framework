<?php
class IP_Framework_Model_Theme_Options extends IP_Framework_Model_Abstract
{

	function save() {
		$post = $_POST;
		$theme_options = array();
		foreach ($post as $postname => $postvalue) {

			if (substr($postname, 0, 4) == 'ipf_') {
				$name = sanitize_key($postname);
				$value = trim($postvalue);
				$theme_options[$name] = $value;
			}

		}

		
		foreach ($theme_options as $key => $value) {
			if (!add_option($key, $value, null, 'no')) {
				update_option($key, $value);
			}
		}

		$message = 'Theme options saved.';
		$messageType = 'success';

	}

	public function getOptionFields() {
		$theme_options = get_option('ip_framework_theme_options');
		return $theme_options;
	}
	
	public function getOptions() {
		$fields = $this->getOptionFields();
		$options = array();
		foreach ($fields as $field) {
			$option = get_option($field['name'], $field['default']);
			$options[$field['name']] = $option;
		}
		return $options;
	}

}