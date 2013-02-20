<?php
class IP_Framework_Model_Setup_Theme_Options extends IP_Framework_Model_Abstract
{

	function save() {
		$post = $_POST;
		$theme_options = array();
		foreach ($post['options'] as $option) {

			$label = trim($option['label']);
			$name = trim($option['name']);
			$type = trim($option['type']);
			$options = trim($option['options']);
			$instructions = trim($option['instructions']);
			$default = trim($option['default']);
			$order = trim($option['order']);

			$name = sanitize_key($name);
			if (substr($name, 0, 4) != 'ipf_') {
				$name = 'ipf_' . $name;
			}

			if ($options == '') {
				$options = array();
			} else {
				$options = preg_replace('/(\r\n|\r|\n)+/', "|", $options);
				$options = explode('|', $options);
				foreach ($options as $key => $value) {
					if ($value == '') {
						unset($options[$key]);
					}
				}
			}

			$order = absint($order);

			if ($name == '' || $label == 'ipf_' || $type == '') {
				$message = 'Required fields missing from at least 1 option.';
				$messageType = 'error';
				return;
			}

			$theme_options[$order] = array(
				'label' => $label,
				'name' => $name,
				'type' => $type,
				'options' => $options,
				'instructions' => $instructions,
				'default' => $default,
				'order' => $order
			);

		}

		ksort($theme_options);

		if (!add_option('ip_framework_theme_options', $theme_options, null, 'no')) {
			update_option('ip_framework_theme_options', $theme_options);
		}

		$this->message = 'Theme options saved.';
		$this->messageType = 'success';

	}

	public function getData() {
		$theme_options = get_option('ip_framework_theme_options');
		$ided_options = array();
		if ($theme_options) {
			foreach ($theme_options as $theme_option) {
				$id = md5($theme_option['name']);
				$theme_option['id'] = $id;
				$ided_options[] = $theme_option;
			}
		}
		return $ided_options;
	}

}