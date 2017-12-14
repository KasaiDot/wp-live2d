<?php
/**
 * @package WP_Live2D
 * @version 0.1.6.2
 */

/*
Plugin Name: Live2D
Description: Live2D Plugin
Version: 0.1.6.2
Author: Kasai.
Author URI: http://kasai.moe
License : GPLv3 or later
Text Domain : wp-live2d
*/

// require_once("globals.php");

define("LIVE2D_FILEPATH", dirname(__FILE__));
define("LIVE2D_DIRNAME", basename(LIVE2D_FILEPATH));
define("LIVE2D_BASE", LIVE2D_DIRNAME . "/settings.php");
define("LIVE2D_FOLDER", dirname(plugin_basename(__FILE__)));
define("LIVE2D_URL", plugins_url(LIVE2D_FOLDER, dirname(__FILE__)));

$role = get_role("administrator");

if (!$role->has_cap("wp_live2d")) {
	$role->add_cap("wp_live2d");
}

function live2d_admin_menu(){
	add_menu_page("Live2D", "Live2D", 2, LIVE2D_BASE);

	add_submenu_page(LIVE2D_BASE, "Settings", "Settings", 7, LIVE2D_BASE);
	// add_submenu_page(LIVE2D_BASE, "Models", "Models", 7, LIVE2D_DIRNAME . "/models.php");
	// add_submenu_page(LIVE2D_BASE, "Add Model", "Add Model", 7, LIVE2D_DIRNAME . "/add.php");
}

function live2d_widget() {?>
	<div id="model">
		<canvas id="glcanvas" width="200" height="250">
		<button id="btnChange" class="active">Change Model</button>
	</div>
	<script type="text/javascript">App()</script>
<?php }

function live2d_widget_init(){
	if (function_exists("wp_register_sidebar_widget")) {
		wp_register_sidebar_widget("live2d_widget_1", __("Live2D"), "live2d_widget", array("description" => "Description"));
	} else {
		register_sidebar_widget(__("Live2D"), "live2d_widget");
	}
}

function live2d_add_css() {
	wp_enqueue_style("wp-live2d-style", plugins_url("css/style.css", __FILE__));
}

function live2d_add_js() {
	wp_enqueue_script("wp-live2d-lib", plugins_url("js/live2d/Live2D.min.js", __FILE__));
	wp_enqueue_script("wp-live2d-framework", plugins_url("js/live2d/Live2DFramework.js", __FILE__));
	wp_enqueue_script("wp-live2d-matrix", plugins_url("js/live2d/MatrixStack.js", __FILE__));
	wp_enqueue_script("wp-live2d-modelsetting", plugins_url("js/live2d/ModelSettingJson.js", __FILE__));
	wp_enqueue_script("wp-live2d-platformmanager", plugins_url("js/live2d/PlatformManager.js", __FILE__));
	wp_enqueue_script("wp-live2d-appmodel", plugins_url("js/live2d/LAppModel.js", __FILE__));
	wp_enqueue_script("wp-live2d-app", plugins_url("js/live2d/App.js", __FILE__));
	wp_enqueue_script("wp-live2d-appdefine", plugins_url("js/model/LAppDefine.js", __FILE__));
	wp_enqueue_script("wp-live2d-appmanager", plugins_url("js/model/LAppLive2DManager.js", __FILE__));
}

if (get_option("live2d_status")) {
	add_action("init", "live2d_add_js");
	add_action("wp_print_styles", "live2d_add_css");
}

add_action("admin_menu", "live2d_admin_menu");
add_action("plugins_loaded", "live2d_widget_init");
// add_filter("the_content", "LIVE2Dpage", 7);
// add_action("my_hourly_event", "LIVE2D_hourly_scrape");
// add_action("edit_form_advanced", "LIVE2D_admin_post");
// add_action("save_post", "LIVE2D_admin_post_update");
// add_action("edit_post", "LIVE2D_admin_post_update");
// add_action("publish_post", "LIVE2D_admin_post_update");
// add_filter("the_content", "LIVE2D_post");

?>