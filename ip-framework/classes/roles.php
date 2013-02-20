<?php
class IP_Framework_Roles {

	public static function init() {
		// site owner role removes certain things clients shouldn't touch
		if (!get_role('site_owner')) {
			add_role('site_owner', 'Site Owner', array(
				'add_users' => true,
				'create_users' => true,
				'delete_others_pages' => true,
				'delete_others_posts' => true,
				'delete_pages' => true,
				'delete_posts' => true,
				'delete_private_pages' => true,
				'delete_private_posts' => true,
				'delete_published_pages' => true,
				'delete_published_posts' => true,
				'delete_users' => true,
				'edit_others_pages' => true,
				'edit_others_posts' => true,
				'edit_pages' => true,
				'edit_posts' => true,
				'edit_private_pages' => true,
				'edit_private_posts' => true,
				'edit_published_pages' => true,
				'edit_published_posts' => true,
				'edit_theme_options' => true,
				'edit_users' => true,
				'export ' => true,
				'import' => true,
				'list_users' => true,
				'manage_categories' => true,
				'manage_links' => true,
				'manage_options' => true,
				'moderate_comments' => true,
				'promote_users' => true,
				'publish_pages' => true,
				'publish_posts' => true,
				'read' => true,
				'read_private_pages' => true,
				'read_private_posts' => true,
				'remove_users' => true,
				'unfiltered_html' => true,
				'unfiltered_upload' => true,
			));
		}

		// add framework capability to admins
		$admin_role = get_role('administrator');
		if (!$admin_role->has_cap('manage_ipframework')) {
			$admin_role->add_cap('manage_ipframework');
		}
		// add edit admin account capability to admins
		if (!$admin_role->has_cap('edit_admin_user')) {
			$admin_role->add_cap('edit_admin_user');
		}

		// run filters
		add_filter('editable_roles', array('IP_Framework_Roles', 'editable_roles'));
		add_filter('map_meta_cap', array('IP_Framework_Roles', 'map_meta_cap'), 10, 4);

	}

	// Remove 'Administrator' from the list of roles if the current user is not an admin
	public static function editable_roles($roles) {
		if (isset($roles['administrator']) && !current_user_can('edit_admin_user')) {
			unset($roles['administrator']);
		}
		return $roles;
	}

	// If someone is trying to edit or delete an admin and that user isn't an admin, don't allow it
  	public static function map_meta_cap($caps, $cap, $user_id, $args) {
    	switch($cap) {
	        case 'edit_user':
	        case 'remove_user':
	        case 'promote_user':
	            if (isset($args[0]) && $args[0] == $user_id) {
	                break;
	            } else if (!isset($args[0])) {
	                $caps[] = 'do_not_allow';
	            }
	            $other = new WP_User(absint($args[0]));
	            if ($other->has_cap('administrator')) {
	                if (!current_user_can('edit_admin_user')) {
	                    $caps[] = 'do_not_allow';
	                }
	            }
	            break;
	        case 'delete_user':
	        case 'delete_users':
	            if (!isset($args[0])) {
	                break;
	            }
	            $other = new WP_User(absint($args[0]));
	            if ($other->has_cap('administrator')) {
	                if (!current_user_can('edit_admin_user')) {
	                    $caps[] = 'do_not_allow';
	                }
	            }
	            break;
	        default:
	            break;
    	}
    	return $caps;
  	}

}