<?php
class IP_Framework_Controller_Setup extends IP_Framework_Controller_Abstract
{

    public function install_plugins()
    {

        $plugins = isset($_REQUEST['plugins']) ? $_REQUEST['plugins'] : array();

        if (!current_user_can('install_plugins')) {
            wp_die( __('You do not have sufficient permissions to install plugins on this site.'));
        }

        include_once ABSPATH . 'wp-admin/includes/plugin-install.php';
        include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';

        $count = 0;
        foreach ($plugins as $plugin) {

            $plugin = trim($plugin);
            $api = plugins_api('plugin_information', array('slug' => $plugin, 'fields' => array('sections' => false))); //Save on a bit of bandwidth.
            if (is_wp_error($api)) {
                wp_die($api);
            }

            $upgrader = new Plugin_Upgrader(new WP_Upgrader_Skin(array('title' => 'Install ' . $api->name)));

            $result = $upgrader->install($api->download_link);

            if ($result === true) {
                $plugin_file = $upgrader->plugin_info();
                activate_plugin($plugin_file, '', !empty($_GET['networkwide']), true);
                echo '<p>Plugin activated.</p>';
            }

        }

    }

}