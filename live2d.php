<?php
/**
 * @package Live2D
 */
/*
Plugin Name: Live2D
Plugin URI: http://dev.kasai.moe/wp-live2d
Description: Live2D Plugin
Version: 0.1.6.5
Author: Kasai.
Author URI: http://kasai.moe
License: GPLv3 or later
Text Domain: live2d
*/

// Make sure we don't expose any info if called directly
if (!function_exists('add_action')) {
	echo 'Hi there! I\'m just a plugin, not much I can do when called directly.';
	exit;
}

define('LIVE2D_VERSION', '0.1.6.5');
define('LIVE2D_MINIMUM_WP_VERSION', '4.7.4');
define('LIVE2D_PLUGIN_DIR', plugin_dir_path(__FILE__));

register_activation_hook(__FILE__, array('Live2D', 'plugin_activation'));
register_deactivation_hook(__FILE__, array('Live2D', 'plugin_deactivation'));

require_once(LIVE2D_PLUGIN_DIR . 'class.live2d.php');
require_once(LIVE2D_PLUGIN_DIR . 'class.live2d-widget.php');

add_action('init', array('Live2D', 'init'));