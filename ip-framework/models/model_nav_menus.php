<?php
class IP_Framework_Model_Nav_Menus extends IP_Framework_Model_Abstract
{

	function save() {
		
		$post = $_POST;
		$nav_menus = array();
		
		foreach ($post['options'] as $menu) {
			
			$slug = sanitize_key($menu['slug']);
			$label = $menu['label'];
			$nav_menus[$slug] = $label;
			
		}
		
		if (!add_option('ip_framework_nav_menus', $nav_menus, null, 'no')) {
			update_option('ip_framework_nav_menus', $nav_menus);
		}

		$this->message = 'Nav menus saved.';
		$this->messageType = 'success';
		
	}

	public function getMenus() {
		
		$menus = get_option('ip_framework_nav_menus');
		$ided_menus = array();
		if ($menus) {
			foreach ($menus as $slug => $label) {
				$id = md5($slug);
				$menu = array(
					'id' => $id,
					'slug' => $slug,
					'label' => $label
				);
				$ided_menus[] = $menu;
			}
		}
		return $ided_menus;
		
	}

}