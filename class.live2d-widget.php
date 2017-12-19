<?php
/**
 * @package Live2D
 */
class Live2D_Widget extends WP_Widget {

	function __construct() {
		parent::__construct('live2d_widget', 'Live2D Widget', array('description' => 'Description'));

		if (is_active_widget(false, false, $this->id_base)) {
			add_action('wp_head', array($this, 'static_files'));
		}
	}

	function static_files() {
?>
<style type="text/css">
#glcanvas{
    position:absolute;
    background-size:75%;
}
#btnChange{
    display:none;
}
#model{
    width:200px;
    height:300px;
    right:0px;
    bottom:0px;
    position:fixed;
    z-index:200;
}
@media screen and (max-width:980px){
    #glcanvas{
        position:absolute;
        background-size:75%;
        display:none;
    }
    #btnChange{
        display:none;
    }
    #model{
        width:200px;
        height:300px;
        right:0px;
        bottom:0px;
        position:fixed;
        z-index:-1;
        display:none;
    }
}
</style>
<script src="<?= plugins_url("js/Live2D.min.js", __FILE__); ?>"></script>
<script src="<?= plugins_url("js/Live2DFramework.js", __FILE__); ?>"></script>
<script src="<?= plugins_url("js/MatrixStack.js", __FILE__); ?>"></script>
<script src="<?= plugins_url("js/ModelSettingJson.js", __FILE__); ?>"></script>
<script src="<?= plugins_url("js/PlatformManager.js", __FILE__); ?>"></script>
<script src="<?= plugins_url("js/LAppModel.js", __FILE__); ?>"></script>
<script src="<?= plugins_url("js/App.js", __FILE__); ?>"></script>
<script src="<?= plugins_url("js/LAppDefine.js", __FILE__); ?>"></script>
<script src="<?= plugins_url("js/LAppLive2DManager.js", __FILE__); ?>"></script>
<?php
	}

	function form($instance) {
		if ($instance && isset($instance['title'])) {
			$title = $instance['title'];
		}
		else {
			$title = 'Live2D';
		}
?>
		<p>
			<label for="<?= $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" type="text" value="<?= esc_attr($title); ?>" />
		</p>
<?php
	}

	function update($new_instance, $old_instance) {
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

	function widget($args, $instance) {
		if (!isset($instance['title'])) {
			$instance['title'] = 'Live2D';
		}

		echo $args['before_widget'];

		if (!empty($instance['title'])) {
			echo $args['before_title'];
			echo esc_html($instance['title']);
			echo $args['after_title'];
		}
?>
	<div id="model">
 		<canvas id="glcanvas" width="200" height="250">
 		<button id="btnChange" class="active">Change Model</button>
 	</div>
 	<script type="text/javascript">App()</script>
<?php
		echo $args['after_widget'];
	}
}

function live2d_register_widgets() {
	register_widget('Live2D_Widget');
}

add_action('widgets_init', 'live2d_register_widgets');