<?php
/*
* This file is part of Gravatar Signup Encouragement plugin for WorPress
* and it is used for settings form
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Display setting fields
 *
 * @since 3.0
 */
function gravatar_signup_encouragement_field_settings_form_display() {
	/* Load WP version */
	global $wp_version;
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* Include options version if available */
	if ( $gse_options['version'] ) {
		?>
		<input type="hidden" name="gravatar_signup_encouragement_settings[version]" value="<?php echo $gse_options['version']; ?>" />
		<?php
	}
	?>
	<div class="dashboard-widget-notice">
		<?php echo sprintf( __( 'Don&#8220;t know how to use this? <a href="%s" class="thickbox">Watch video tutorial</a>.', 'gse_textdomain' ), "#TB_inline?height=400&width=430&inlineId=gsevideotutorial&modal=true" ); ?><br />
	</div>
	<?php

	/* 
	 * First we print selection of cases when to show tip,
	 * then we print elements for that case
	 * that are hidden is case is not chosen
	 */
	?>
	<span id="gravatar_signup_encouragement_form"><?php _e( 'Choose where to show Gravatar Signup Encouragement message', 'gse_textdomain' ); ?></span>
	<br />

	<?php // Comments for unregistered ?>
	<label><input name="gravatar_signup_encouragement_settings[show_comments_unreg]" class="gse_show_comments_unreg" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_comments_unreg'] ); ?> /> <?php _e( 'Comment form (unregistered users)', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-2.png' ); ?>" title="<?php _e( 'Message shown below comment text field on a Twenty Eleven theme', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
		<?php // Elements ?>
		<div id="gse_below_comments_unreg" style="margin: 5px 0 0 10px;">
			<span><?php _e( 'Choose the comment form element or text field to display the Gravatar Signup Encouragement message below it', 'gse_textdomain' ); ?></span>
			<br />
			<?php
			/* If theme doesn't follow standards, add notice */
			if ( gravatar_signup_encouragement_is_theme_in_list() ) {
				?>
				<div class="dashboard-widget-notice">
				<?php
				echo sprintf( __( "Notice: Theme you are using doesn't fully follow WordPress theme standards so some of predefined fields in comment form might not work. You can add custom element to make it work. Read <a href='%s' class='thickbox'>here</a> for more information.", "gse_textdomain" ), "#TB_inline?height=500&width=400&inlineId=gsenonstandardthemetips&modal=true" );
				?>
				</div>
				<?php
			}
			?>
			<label><input name="gravatar_signup_encouragement_settings[below_comments_unreg]" type="radio" value="#comment" 
			<?php checked( '#comment', $gse_options['below_comments_unreg'] ); ?> /> <?php _e( 'Comment text', 'gse_textdomain' ); ?> </label><br />
			<label><input name="gravatar_signup_encouragement_settings[below_comments_unreg]" type="radio" value="#url" 
			<?php checked( '#url', $gse_options['below_comments_unreg'] ); ?> /> <?php _e( 'URL', 'gse_textdomain' ); ?> </label><br />
			<label><input name="gravatar_signup_encouragement_settings[below_comments_unreg]" type="radio" value="#email" 
			<?php checked( '#email', $gse_options['below_comments_unreg'] ); ?> /> <?php _e( 'E-mail address', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_comments_unreg]" type="radio" value="#submit" 
			<?php checked( '#submit', $gse_options['below_comments_unreg'] ); ?> /> <?php _e( 'Submit button', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_comments_unreg]" class="gse_below_comments_unreg_custom_radio" type="radio" value="<?php echo $gse_options['below_comments_unreg_custom']; ?>" 
			<?php checked( $gse_options['below_comments_unreg_custom'], $gse_options['below_comments_unreg'] ); ?> /> <?php _e( 'Custom element:', 'gse_textdomain' ); ?></label> <input name="gravatar_signup_encouragement_settings[below_comments_unreg_custom]" type="text" class="gse_below_comments_unreg_custom_text" value="<?php echo $gse_options['below_comments_unreg_custom']; ?>" /> <?php _e( 'Use <a href="http://api.jquery.com/category/selectors/" target="_blank">jQuery selectors</a> to choose any element on a page', 'gse_textdomain' ); ?>
		</div>
	<br />

	<?php // Comments for registered ?>
	<label><input name="gravatar_signup_encouragement_settings[show_comments_reg]" class="gse_show_comments_reg" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_comments_reg'] ); ?> /> <?php _e( 'Comment form (registered users)', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-3.png' ); ?>" title="<?php _e( 'Message shown below comment text field on a Twenty Eleven theme', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
		<?php // Elements ?>
		<div id="gse_below_comments_reg" style="margin: 5px 0 0 10px;">
			<span><?php _e( 'Choose the comment form element or text field to display the Gravatar Signup Encouragement message below it', 'gse_textdomain' ); ?></span>
			<br />
			<?php
			/* If theme doesn't follow standards, add notice */
			if ( gravatar_signup_encouragement_is_theme_in_list() ) {
				?>
				<div class="dashboard-widget-notice">
				<?php
				echo sprintf( __( "Notice: Theme you are using doesn't fully follow WordPress theme standards so some of predefined fields in comment form might not work. You can add custom element to make it work. Read <a href='%s' class='thickbox'>here</a> for more information.", "gse_textdomain" ), "#TB_inline?height=500&width=400&inlineId=gsenonstandardthemetips&modal=true" );
				?>
				</div>
				<?php
			}
			?>
			<label><input name="gravatar_signup_encouragement_settings[below_comments_reg]" type="radio" value="#comment" 
			<?php checked( '#comment', $gse_options['below_comments_reg'] ); ?> /> <?php _e( 'Comment text', 'gse_textdomain' ); ?> </label><br />
			<label><input name="gravatar_signup_encouragement_settings[below_comments_reg]" type="radio" value="#commentform p:first" 
			<?php checked( '#commentform p:first', $gse_options['below_comments_reg'] ); ?> /> <?php _e( 'Logout URL', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_comments_reg]" type="radio" value="#submit" 
			<?php checked( '#submit', $gse_options['below_comments_reg'] ); ?> /> <?php _e( 'Submit button', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_comments_reg]" class="gse_below_comments_reg_custom_radio" type="radio" value="<?php echo $gse_options['below_comments_reg_custom']; ?>" 
			<?php checked( $gse_options['below_comments_reg_custom'], $gse_options['below_comments_reg'] ); ?> /> <?php _e( 'Custom element:', 'gse_textdomain' ); ?></label> <input name="gravatar_signup_encouragement_settings[below_comments_reg_custom]" type="text" class="gse_below_comments_reg_custom_text" value="<?php echo $gse_options['below_comments_reg_custom']; ?>" /> <?php _e( 'Use <a href="http://api.jquery.com/category/selectors/" target="_blank">jQuery selectors</a> to choose any element on a page', 'gse_textdomain' ); ?>
		</div>
	<br />

	<?php // Modal for unregistered ?>
	<label><input name="gravatar_signup_encouragement_settings[show_after_commenting_modal_unreg]" class="gse_show_after_commenting_modal_unreg" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_after_commenting_modal_unreg'] ); ?> /> <?php _e( 'Dialog after comment posting (unregistered users)', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-4.png' ); ?>" title="<?php _e( 'Message shown in a dialog over a Twenty Eleven theme after comment is posted', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
	<br />

	<?php // Modal for registered ?>
	<label><input name="gravatar_signup_encouragement_settings[show_after_commenting_modal_reg]" class="gse_show_after_commenting_modal_reg" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_after_commenting_modal_reg'] ); ?> /> <?php _e( 'Dialog after comment posting (registered users)', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-5.png' ); ?>" title="<?php _e( 'Message shown in a dialog over a Twenty Eleven theme after comment is posted', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
	<br />

	<?php // Admin bar ?>
	<?php // Show only if WP 3.1 or newer ?>
	<?php if ( version_compare( $wp_version, '3.1', '>=' ) ) { ?>
	<label><input name="gravatar_signup_encouragement_settings[show_in_admin_bar]" class="gse_show_in_admin_bar" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_in_admin_bar'] ); ?> /> <?php _e( 'Admin bar', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-6.png' ); ?>" title="<?php _e( 'Message shown in admin bar', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
	<br />
	<?php } ?>

	<?php // Admin notice ?>
	<label><input name="gravatar_signup_encouragement_settings[show_in_admin_notices]" class="gse_show_in_admin_notices" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_in_admin_notices'] ); ?> /> <?php _e( 'Administration notice', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-7.png' ); ?>" title="<?php _e( 'Message shown in administration notices', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
	<br />

	<?php // Profile ?>
	<label><input name="gravatar_signup_encouragement_settings[show_profile]" class="gse_show_profile" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_profile'] ); ?> /> <?php _e( 'Profile page', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-8.png' ); ?>" title="<?php _e( 'Message shown on a profile page below “Profile” header', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
		<?php // Elements ?>
		<div id="gse_below_profile" style="margin: 5px 0 0 10px;">
			<span><?php _e( 'Choose the profile page form element or text field to display the Gravatar Signup Encouragement message below it', 'gse_textdomain' ); ?></span>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_profile]" type="radio" value="h2" 
			<?php checked( 'h2', $gse_options['below_profile'] ); ?> /> <?php _e( 'Header &#8220;Profile&#8221;', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_profile]" type="radio" value="#your-profile h3:eq(1)" 
			<?php checked( '#your-profile h3:eq(1)', $gse_options['below_profile'] ); ?> /> <?php _e( 'Header &#8220;Name&#8221;', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_profile]" type="radio" value="#user_login + .description" 
			<?php checked( '#user_login + .description', $gse_options['below_profile'] ); ?> /> <?php _e( 'User name', 'gse_textdomain' ); ?> </label><br />
			<label><input name="gravatar_signup_encouragement_settings[below_profile]" type="radio" value="#display_name" 
			<?php checked( '#display_name', $gse_options['below_profile'] ); ?> /> <?php _e( 'Nicename', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_profile]" type="radio" value="#email" 
			<?php checked( '#email', $gse_options['below_profile'] ); ?> /> <?php _e( 'E-mail address', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_profile]" type="radio" value="#your-profile h3:eq(3)" 
			<?php checked( '#your-profile h3:eq(3)', $gse_options['below_profile'] ); ?> /> <?php _e( 'Header &#8220;About Yourself&#8221;', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_profile]" type="radio" value="#description + br + .description" 
			<?php checked( '#description + br + .description', $gse_options['below_profile'] ); ?> /> <?php _e( 'Biographical Info', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_profile]" type="radio" value=".form-table:last" 
			<?php checked( '.form-table:last', $gse_options['below_profile'] ); ?> /> <?php _e( 'Last input field (by default, &#8220;New Password&#8221;)', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_profile]" class="gse_below_profile_custom_radio" type="radio" value="<?php echo $gse_options['below_profile_custom']; ?>" 
			<?php checked( $gse_options['below_profile_custom'], $gse_options['below_profile'] ); ?> /> <?php _e( 'Custom element:', 'gse_textdomain' ); ?></label> <input name="gravatar_signup_encouragement_settings[below_profile_custom]" type="text" class="gse_below_profile_custom_text" value="<?php echo $gse_options['below_profile_custom']; ?>" /> <?php _e( 'Use <a href="http://api.jquery.com/category/selectors/" target="_blank">jQuery selectors</a> to choose any element on a page', 'gse_textdomain' ); ?>
		</div>
	<br />

	<?php // Registration ?>
	<label><input name="gravatar_signup_encouragement_settings[show_registration]" class="gse_show_registration" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_registration'] ); ?> /> <?php _e( 'Registration page', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-9.png' ); ?>" title="<?php _e( 'Message shown on a registration page below e-mail address text field', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
		<?php // Then we print selection of cases where on page to show tip ?>
		<div id="gse_below_registration" style="margin: 5px 0 0 10px;">
			<span><?php _e( 'Choose the registration page form element or text field to display the Gravatar Signup Encouragement message below it', 'gse_textdomain' ); ?></span>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_registration]" type="radio" value="#user_email" 
			<?php checked( '#user_email', $gse_options['below_registration'] ); ?> /> <?php _e( 'E-mail address', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_registration]" type="radio" value="#user_login" 
			<?php checked( '#user_login', $gse_options['below_registration'] ); ?> /> <?php _e( 'User name', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_registration]" type="radio" value="#wp-submit" 
			<?php checked( '#wp-submit', $gse_options['below_registration'] ); ?> /> <?php _e( 'Submit button', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_registration]" class="gse_below_registration_custom_radio" type="radio" value="<?php echo $gse_options['below_registration_custom']; ?>" 
			<?php checked( $gse_options['below_registration_custom'], $gse_options['below_registration'] ); ?> /> <?php _e( 'Custom element:', 'gse_textdomain' ); ?></label> <input name="gravatar_signup_encouragement_settings[below_registration_custom]" type="text" class="gse_below_registration_custom_text" value="<?php echo $gse_options['below_registration_custom']; ?>" /> <?php _e( 'Use <a href="http://api.jquery.com/category/selectors/" target="_blank">jQuery selectors</a> to choose any element on a page', 'gse_textdomain' ); ?>
		</div>
	<br />

	<?php // Sign-up (multisite) ?>
	<?php // Show only if super admin is at main site of multisite ?>
	<?php if ( function_exists( 'is_multisite' ) && is_multisite() && is_main_site() && is_super_admin() ) { ?>
	<label><input name="gravatar_signup_encouragement_settings[show_ms_signup]" class="gse_show_ms_signup" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_ms_signup'] ); ?> /> <?php _e( 'Signup page (multisite)', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-10.jpg' ); ?>" title="<?php _e( 'Message shown on a registration page (multisite) on a Twenty Ten theme below e-mail address text field', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
		<?php // Elements ?>
		<div id="gse_below_ms_signup" style="margin: 5px 0 0 10px;">
			<span><?php _e( 'Choose the (multisite) registration page form element or text field to display the Gravatar Signup Encouragement message below it', 'gse_textdomain' ); ?></span>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_ms_signup]" type="radio" value="#user_email" 
			<?php checked( '#user_email', $gse_options['below_ms_signup'] ); ?> /> <?php _e( 'E-mail address', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_ms_signup]" type="radio" value="#user_name" 
			<?php checked( '#user_name', $gse_options['below_ms_signup'] ); ?> /> <?php _e( 'User name', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_ms_signup]" type="radio" value="#submit" 
			<?php checked( '#submit', $gse_options['below_ms_signup'] ); ?> /> <?php _e( 'Submit button', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_ms_signup]" class="gse_below_ms_signup_custom_radio" type="radio" value="<?php echo $gse_options['below_ms_signup_custom']; ?>" 
			<?php checked( $gse_options['below_ms_signup_custom'], $gse_options['below_ms_signup'] ); ?> /> <?php _e( 'Custom element:', 'gse_textdomain' ); ?></label> <input name="gravatar_signup_encouragement_settings[below_ms_signup_custom]" type="text" class="gse_below_ms_signup_custom_text" value="<?php echo $gse_options['below_ms_signup_custom']; ?>" /> 
		</div>
	<br />
	<?php } ?>

	<?php // bbPress ?>
	<?php // Show only if bbPress plugin is activated ?>
	<?php if ( class_exists( 'bbPress' ) ) { ?>
	<label><input name="gravatar_signup_encouragement_settings[show_bbpress]" class="gse_show_bbpress" type="checkbox" value="1" 
	<?php checked( '1', $gse_options['show_bbpress'] ); ?> /> <?php _e( 'bbPress reply form', 'gse_textdomain' ); ?> </label> (<a href="<?php echo gravatar_signup_encouragement_screenshot_url( 'screenshot-11.png' ); ?>" title="<?php _e( 'Message shown in a bbPress reply form of a Twenty Eleven theme below form title', 'gse_textdomain' ); ?>" class="thickbox"><?php _e( 'example of how this looks', 'gse_textdomain' ); ?></a>)
		<?php // Elements ?>
		<div id="gse_below_bbpress" style="margin: 5px 0 0 10px;">
			<span><?php _e( 'Choose the bbPress reply form element or text field to display the Gravatar Signup Encouragement message below it', 'gse_textdomain' ); ?></span>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_bbpress]" type="radio" value="#new-post legend:first" 
			<?php checked( '#new-post legend:first', $gse_options['below_bbpress'] ); ?> /> <?php _e( 'Form title', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_bbpress]" type="radio" value="#bbp_topic_tags" 
			<?php checked( '#bbp_topic_tags', $gse_options['below_bbpress'] ); ?> /> <?php _e( 'Topic tags', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_bbpress]" type="radio" value="#new-post .bbp-form p:last" 
			<?php checked( '#new-post .bbp-form p:last', $gse_options['below_bbpress'] ); ?> /> <?php _e( 'Last input field', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_bbpress]" type="radio" value="#new-post button" 
			<?php checked( '#new-post button', $gse_options['below_bbpress'] ); ?> /> <?php _e( 'Submit button', 'gse_textdomain' ); ?> </label>
			<br />
			<label><input name="gravatar_signup_encouragement_settings[below_bbpress]" class="gse_below_bbpress_custom_radio" type="radio" value="<?php echo $gse_options['below_bbpress_custom']; ?>" 
			<?php checked( $gse_options['below_bbpress_custom'], $gse_options['below_bbpress'] ); ?> /> <?php _e( 'Custom element:', 'gse_textdomain' ); ?></label> <input name="gravatar_signup_encouragement_settings[below_bbpress_custom]" type="text" class="gse_below_bbpress_custom_text" value="<?php echo $gse_options['below_bbpress_custom']; ?>" /> 
		</div>
	<br />
	<?php } ?>


	<br /><br />
	<?php
	/* Show notice about upgrade from <2.0 */
	if ( $gse_options['notice_upgrade_1_to_3'] ) {
		?>
		<div class="dashboard-widget-notice">
		<?php _e( "There are new options for Gravatar Signup Encouragement.", "gse_textdomain" ); ?><br />
		<ol>
			<li><?php _e( "Now you can show message in dialog after comment is posted, as an administration notice, in admin bar, on a signup page for multisite installation and in a bbPress reply form if bbPress plugin is installed.", "gse_textdomain" ); ?></li>
			<li><?php _e( "Now you can add message after any element on a page more easily then before.", "gse_textdomain" ); ?></li>
			<li><?php _e( "There are new predefined elements for profile page.", "gse_textdomain" ); ?></li>
			<li><?php _e( "Finally, there is a new, longer, and more descriptive default message. You can use the new default message, your existing message, or update your existing message.", "gse_textdomain" ); ?></li>
		</ol>
		<?php _e( "New default message:", "gse_textdomain" ); ?><br />
		<textarea  readonly="true" rows="5" cols="50" class="large-text code"><?php echo gravatar_signup_encouragement_default_message(); ?></textarea><br />
		<?php printf( '<a href="%s" id="gse-notice-1-to-2-no">' . __( 'Do not show this notice again', 'gse_textdomain' ) . '</a>', '?gse_notice_1_to_2=0' ); ?>
		</div><br />
		<?php
	/* Show notice about upgrade from 2.0+ */
	} elseif ( $gse_options['notice_upgrade_2_to_3'] ) {
		?>
		<div class="dashboard-widget-notice">
		<?php _e( "There are new options for Gravatar Signup Encouragement.", "gse_textdomain" ); ?><br />
		<ol>
			<li><?php _e( "Now you can show message in admin bar, and in a bbPress reply form if bbPress plugin is installed.", "gse_textdomain" ); ?></li>
		</ol>
		<?php printf( '<a href="%s" id="gse-notice-1-to-2-no">' . __( 'Do not show this notice again', 'gse_textdomain' ) . '</a>', '?gse_notice_1_to_2=0' ); ?>
		</div><br />
		<?php
	}

	/* Show notice if there is no message */
	if ( ! $gse_options['tip_text'] ) {
		?>
		<div class="dashboard-widget-notice">
		<?php _e( "You have not created a custom message. Below is the default message, to help with creating your own custom message.", "gse_textdomain" ); ?><br />
		<?php _e( "Default message:", "gse_textdomain" ); ?><br />
		<textarea  readonly="true" rows="5" cols="50" class="large-text code"><?php echo gravatar_signup_encouragement_default_message(); ?></textarea><br />
		</div>
		<?php
	}

	/* Encouragement message setup */
	_e( "Message to display to users who have not registered a Gravatar.", 'gse_textdomain' ); ?><br />
	<?php _e( 'You should leave <strong>URL</strong> since it is automatically replaced with appropriate link to signup page on gravatar.com.', 'gse_textdomain' ); ?><br />
	<?php _e( 'Do not use double quotes (<strong>"</strong>) since it will break code. Instead, use curly quotes (<strong>&#8220;</strong> and <strong>&#8221;</strong>) for text, and single quotes (<strong>&#039;</strong>) for HTML tags.', 'gse_textdomain' ); ?><br />
	<label><textarea name="gravatar_signup_encouragement_settings[tip_text]" rows="5" cols="50" id="gravatar_signup_encouragement_settings[tip_text]" class="large-text code"><?php echo $gse_options['tip_text']; ?></textarea></label>

	<?php
	/* Show encouragement to install Use Google Libraries plugin if it's not installed */
	if ( ! class_exists( 'JCP_UseGoogleLibraries' ) ) {
		?>
		<div class="dashboard-widget-notice">
			<strong><?php _e( "Notice:", "gse_textdomain" ); ?></strong><br />
			<?php _e( "Plugin Gravatar Signup Encouragement uses jQuery for display of messages. You can speed up your site by installing plugin <a href='http://jasonpenney.net/wordpress-plugins/use-google-libraries/'>Use Google Libraries</a>, which will load jQuery from Google's CDN.", "gse_textdomain" );
			echo sprintf( __( " (<a href='%s'>read here for more information</a>)", "gse_textdomain" ), "http://encosia.com/2008/12/10/3-reasons-why-you-should-let-google-host-jquery-for-you/" ); ?><br />
			<?php echo sprintf( __( "<a href='%s' class='thickbox'>Install Use Google Libraries</a>", "gse_textdomain" ),  esc_url( admin_url( 'plugin-install.php?tab=plugin-information&plugin=use-google-libraries&TB_iframe=true&width=600&height=550' ) ) ); ?><br />
		</div>
		<?php
	}

	/* Show donation encouragement */
	?>
	<div class="dashboard-widget-notice">
		<br />
		<strong>
		<?php
		echo sprintf( __( "If you like plugin Gravatar Signup Encouragement, you can <a href='%s'>donate</a> to the author to support its further development.", "gse_textdomain" ), "http://blog.milandinic.com/donate/" );
		?>
		</strong><br />
	</div>

	<?php /* Now we print jQuery script for show/hide on checkbox and text-to-radio input value */ ?>
<script language="javascript">
jQuery(document).ready(function()
{	
	<?php
	/*
	 * Check if case is turned on; if no, hide it.
	 * If checkbox is checked, show; if unchecked, hide.
	 */
	?>
	<?php if ( ! $gse_options['show_comments_unreg'] ) { ?>
	jQuery('#gse_below_comments_unreg').hide();
	<?php } ?>
	jQuery('.gse_show_comments_unreg').change(function() {
		if(jQuery('.gse_show_comments_unreg').attr('checked'))
			jQuery('#gse_below_comments_unreg').show();
		else
			jQuery('#gse_below_comments_unreg').hide();
		return true;
	});

	<?php if ( ! $gse_options['show_comments_reg'] ) { ?>
	jQuery('#gse_below_comments_reg').hide();
	<?php } ?>
	jQuery('.gse_show_comments_reg').change(function() {
		if(jQuery('.gse_show_comments_reg').attr('checked'))
			jQuery('#gse_below_comments_reg').show();
		else
			jQuery('#gse_below_comments_reg').hide();
		return true;
	});

	<?php if ( ! $gse_options['show_profile'] ) { ?>
	jQuery('#gse_below_profile').hide();
	<?php } ?>
	jQuery('.gse_show_profile').change(function() {
		if(jQuery('.gse_show_profile').attr('checked'))
			jQuery('#gse_below_profile').show();
		else
			jQuery('#gse_below_profile').hide();
		return true;
	});

	<?php if ( ! $gse_options['show_registration'] ) { ?>
	jQuery('#gse_below_registration').hide();
	<?php } ?>
	jQuery('.gse_show_registration').change(function() {
		if(jQuery('.gse_show_registration').attr('checked'))
			jQuery('#gse_below_registration').show();
		else
			jQuery('#gse_below_registration').hide();
		return true;
	});

	<?php if ( ! $gse_options['show_ms_signup'] ) { ?>
	jQuery('#gse_below_ms_signup').hide();
	<?php } ?>
	jQuery('.gse_show_ms_signup').change(function() {
		if(jQuery('.gse_show_ms_signup').attr('checked'))
			jQuery('#gse_below_ms_signup').show();
		else
			jQuery('#gse_below_ms_signup').hide();
		return true;
	});

	<?php if ( ! $gse_options['show_bbpress'] ) { ?>
	jQuery('#gse_below_bbpress').hide();
	<?php } ?>
	jQuery('.gse_show_bbpress').change(function() {
		if(jQuery('.gse_show_bbpress').attr('checked'))
			jQuery('#gse_below_bbpress').show();
		else
			jQuery('#gse_below_bbpress').hide();
		return true;
	});

	<?php 
	/*
	 * Get value from text input field of custom element on keyup
	 * and place it in radio button value
	 */
	?>
	jQuery('.gse_below_comments_unreg_custom_text').keyup(function(event){
		var gse_below_comments_unreg_custom = jQuery('.gse_below_comments_unreg_custom_text').val();
		jQuery('.gse_below_comments_unreg_custom_radio').val(gse_below_comments_unreg_custom);
	});

	jQuery('.gse_below_comments_reg_custom_text').keyup(function(event){
		var gse_below_comments_reg_custom = jQuery('.gse_below_comments_reg_custom_text').val();
		jQuery('.gse_below_comments_reg_custom_radio').val(gse_below_comments_reg_custom);
	});

	jQuery('.gse_below_profile_custom_text').keyup(function(event){
		var gse_below_profile_custom = jQuery('.gse_below_profile_custom_text').val();
		jQuery('.gse_below_profile_custom_radio').val(gse_below_profile_custom);
	});

	jQuery('.gse_below_registration_custom_text').keyup(function(event){
		var gse_below_registration_custom = jQuery('.gse_below_registration_custom_text').val();
		jQuery('.gse_below_registration_custom_radio').val(gse_below_registration_custom);
	});

	jQuery('.gse_below_ms_signup_custom_text').keyup(function(event){
		var gse_below_ms_signup_custom = jQuery('.gse_below_ms_signup_custom_text').val();
		jQuery('.gse_below_ms_signup_custom_radio').val(gse_below_ms_signup_custom);
	});

	jQuery('.gse_below_bbpress_custom_text').keyup(function(event){
		var gse_below_bbpress_custom = jQuery('.gse_below_bbpress_custom_text').val();
		jQuery('.gse_below_bbpress_custom_radio').val(gse_below_bbpress_custom);
	});
});
</script>

	<?php /* Print Thickbox for video tutorial */ ?>
	<div id="gsevideotutorial" style="display: none;">
		<iframe width="420" height="345" src="https://www.youtube.com/embed/eIvm4rBkxPk?cc_load_policy=1" frameborder="0" allowfullscreen></iframe>
		<p><input type="submit" id="gse_nonstandard_theme_tips_close_button" value="<?php _e( 'Close this video', 'gse_textdomain' ); ?>" onclick="tb_remove()" /></p>
	</div>

	<?php /* At the end, we print Thickboxes for bad themes */ ?>
	<?php
	if ( gravatar_signup_encouragement_is_theme_in_list() ) {
		?>
		<div id="gsenonstandardthemetips" style="display:none">
			<h3 style="text-align: center;"><?php _e( 'Nonstandard default elements on your theme', 'gse_textdomain' ); ?></h3>
			<p id="gse_nonstandard_theme_tips_text">
				<?php _e( 'Some default elements will not work on your theme and they are listed below. You need to add value of element to field <em>Custom element</em>. List below contains element name and value:', 'gse_textdomain' );
				if ( get_stylesheet() == 'mystique' ) {
				?>
				<ul>
					<li><strong><?php _e( 'Comment form (unregistered users)', 'gse_textdomain' ); ?></strong>
						<ul>
							<li><?php _e( 'URL', 'gse_textdomain' ); ?> <input type="text" value="input[name='url']" size="35" /></li>
							<li><?php _e( 'E-mail address', 'gse_textdomain' ); ?> <input type="text" value="input[name='email']" size="35" /></li>
						</ul>
					</li>
				</ul>
				<?php
				} elseif ( get_stylesheet() == 'carrington-blog' ) {
				?>
				<ul>
					<li><strong><?php _e( 'Comment form (unregistered users)', 'gse_textdomain' ); ?></strong>
						<ul>
							<li><?php _e( 'Comment text', 'gse_textdomain' ); ?> <input type="text" value="textarea[name='comment']" size="35" /></li>
							<li><?php _e( 'URL', 'gse_textdomain' ); ?> <input type="text" value="input[name='url']" size="35" /></li>
							<li><?php _e( 'E-mail address', 'gse_textdomain' ); ?> <input type="text" value="input[name='email']" size="35" /></li>
							<li><?php _e( 'Submit button', 'gse_textdomain' ); ?> <input type="text" value="input[name='submit']" size="35" /></li>
						</ul>
					</li>
					<li><strong><?php _e( 'Comment form (registered users)', 'gse_textdomain' ); ?></strong>
						<ul>
							<li><?php _e( 'Comment text', 'gse_textdomain' ); ?> <input type="text" value="textarea[name='comment']" size="35" /></li>
							<li><?php _e( 'Logout URL', 'gse_textdomain' ); ?> <input type="text" value=".logged-in" size="35" /></li>
							<li><?php _e( 'Submit button', 'gse_textdomain' ); ?> <input type="text" value="input[name='submit']" size="35" /></li>
						</ul>
					</li>
				</ul>
				<?php
				}
				?>
			</p>
			<p style="text-align:center" id="gse_nonstandard_theme_tips_buttons">
				<input type="submit" id="gse_nonstandard_theme_tips_close_button" value="<?php _e( 'Close this message', 'gse_textdomain' ); ?>" onclick="tb_remove()" />
			</p> 
		</div>
	<?php
	}
}

?>