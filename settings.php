<?php

if (!defined('ABSPATH')) exit;

if (!current_user_can("live2d")) {
	wp_die("Error!");
}

if ($_POST) {
	if ($_POST["status"])
		if (!wp_verify_nonce($_REQUEST['_wpnonce'], 'live2d_status')) die( 'Failed security check' );
		update_option("live2d_status", ($_POST["status"] == "2" ? "0" : "1"));
	}
?>
<div class="updated">
		<p>
			<strong>Configuration saved!</strong>
		</p>
	</div>
<?php }
if (!$_GET["do"]) {?>
<div class="wrap">
		<h2>Live2D - Settings</h2>
		<form method="post">
			<div id="poststuff" class="metabox-holder has-right-sidebar">
				<div id="side-info-column" class="inner-sidebar">
					<div id="side-sortables" class="meta-box-sortables">
						<div id="linksubmitdiv" class="postbox">
							<div class="inside">
								<div class="submitbox" id="submitlink">
									<div id="minor-publishing">
										<div id="misc-publishing-actions">
											<div class="misc-pub-section misc-pub-section-last">Submit modifications.</div>
										</div>
									</div>
									<div id="major-publishing-actions">
										<input name="save" type="submit" class="button-primary" id="publish" value="Submit" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="post-body">
					<div id="post-body-content">
						<div id="namediv" class="stuffbox">
							<h3>
								<label for="status">Activate Live2D</label>
							</h3>
							<div class="inside">
								<?php wp_nonce_field('live2d_status'); ?>
								<select name="status">
									<option value="1" <?php if (get_option("live2d_status")) print("selected");?>>Yes</option>
									<option value="2" <?php if (!get_option("live2d_status")) print("selected");?>>No</option>
								</select>
							</div>
						</div>
<?php if (get_option("live2d_status")) : ?>
						<div id="namediv" class="stuffbox">
							<p class="inside">Hi!</p>
						</div>
<?php endif; ?>
						<div id="advanced-sortables" class="meta-box-sortables"></div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php }?>
