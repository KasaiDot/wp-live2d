<?php

class Live2D {
	// const VAR = 'text';

	private static $initiated = false;

	public static function init() {
		if (!self::$initiated) {
			self::init_hooks();
		}
	}

	private static function init_hooks() {
		self::$initiated = true;

		define('LIVE2D_PLUGIN_HOME', LIVE2D_PLUGIN_DIR . 'settings.php');

        add_action('admin_menu', array('Live2D', 'admin_menu'));
    }

    public static function admin_menu(){
        add_menu_page('Live2D', 'Live2D', 'manage_options', LIVE2D_PLUGIN_HOME, '', LIVE2D_PLUGIN_DIR . 'img/icon.png');

        add_submenu_page(LIVE2D_PLUGIN_HOME, 'Settings', 'Settings', 'manage_options', LIVE2D_PLUGIN_DIR . 'settings.php');
        add_submenu_page(LIVE2D_PLUGIN_HOME, 'Models', 'Models', 'manage_options', LIVE2D_PLUGIN_DIR . 'models.php');
    }

	public static function plugin_activation() {
		if (version_compare($GLOBALS['wp_version'], LIVE2D_MINIMUM_WP_VERSION, '<')) {
			// OK
		}
	}

	public static function plugin_deactivation( ) {
		// OK
    }
}