<?php
/*
Plugin Name: Inverse Paradox Theme Framework
Description:
Version: 0.2
Author: Inverse Paradox
*/

function ip_autoloader($class_name) {
	if ($class_name == 'IP_Framework') {
		$file_to_include = IP_FRAMEWORK_PLUGIN_PATH . 'classes/ip-framework.php';
	} else if (strpos($class_name, 'IP_Framework') !== false) {
		$class_name = str_replace('IP_Framework_', '', $class_name);
		$class_name_parts = explode('_', $class_name);
		if ($class_name_parts[0] == 'Model') {
			$class_name = str_replace('Model', '', $class_name);
			$file_to_include = IP_FRAMEWORK_PLUGIN_PATH . 'models/model' . strtolower($class_name) . '.php';
		} else if ($class_name_parts[0] == 'View') {
			$class_name = str_replace('View', '', $class_name);
			$file_to_include = IP_FRAMEWORK_PLUGIN_PATH . 'views/view' . strtolower($class_name) . '.php';
		} else if ($class_name_parts[0] == 'Controller') {
			$class_name = str_replace('Controller', '', $class_name);
			$file_to_include = IP_FRAMEWORK_PLUGIN_PATH . 'controllers/controller' . strtolower($class_name) . '.php';
		} else {
			$file_to_include = IP_FRAMEWORK_PLUGIN_PATH . 'classes/' . strtolower($class_name) . '.php';
		}
	}
	if (isset($file_to_include)) {
		include $file_to_include;
	}
}
spl_autoload_register('ip_autoloader');

define('IP_FRAMEWORK_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('IP_FRAMEWORK_PLUGIN_URL', plugin_dir_url(__FILE__));


$ip_framework = new IP_Framework();
$ip_framework->init();