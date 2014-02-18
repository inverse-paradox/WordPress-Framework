<?php
class IP_Framework_Model_Widget_Areas extends IP_Framework_Model_Abstract
{

	function save() {

		$post = stripslashes_deep($_POST);
		$widget_areas = array();

		if (isset($post['options'])) {
			foreach ($post['options'] as $widget_area) {

				$name = $widget_area['name'];
				$id = sanitize_key($widget_area['id']);
				$description = $widget_area['description'];
				$class = $widget_area['class'];
				$before_widget = ($widget_area['before_widget'] == '') ? '<div id="%1$s" class="widget %2$s">' : $widget_area['before_widget'];
				$after_widget = ($widget_area['after_widget'] == '') ? '</div>' : $widget_area['after_widget'];
				$before_title = ($widget_area['before_title'] == '') ? '<h3 class="widgettitle">' : $widget_area['before_title'];
				$after_title = ($widget_area['after_title'] == '') ? '</h3>' : $widget_area['after_title'];

				$widget_areas[] = array(
					'name' => $name,
					'id' => $id,
					'description' => $description,
					'class' => $class,
					'before_widget' => $before_widget,
					'after_widget' => $after_widget,
					'before_title' => $before_title,
					'after_title' => $after_title
				);

			}
		}

		if (!add_option('ip_framework_widget_areas', $widget_areas, null, 'no')) {
			update_option('ip_framework_widget_areas', $widget_areas);
		}

		$this->message = 'Widget areas saved.';
		$this->messageType = 'success';

	}

	public function getSidebars() {

		$sidebars = get_option('ip_framework_widget_areas');
		return $sidebars;

	}

}