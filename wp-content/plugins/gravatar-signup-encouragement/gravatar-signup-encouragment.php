<?php
/*
Plugin Name: Gravatar Signup Encouragement
Plugin URI: http://blog.milandinic.com/wordpress/plugins/gravatar-signup-encouragement/
Description: Displays message to users without gravatar that they don't have one with link to Gravatar's sign-up page (e-mail included).
Version: 3.1
Author: Milan Dinić
Author URI: http://blog.milandinic.com/
Text Domain: gse_textdomain
Domain Path: /translations/
License: GPL
*/

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Add default options on activation of plugin
 *
 * @since 1.0
 */
function gravatar_signup_encouragement_activate() {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* If no options, add default */
	if ( ! $gse_options ) {
		gravatar_signup_encouragement_add_default_options();
	}
}
register_activation_hook( __FILE__, 'gravatar_signup_encouragement_activate' );

/**
 * Remove options on uninstallation of plugin
 *
 * @since 1.0
*/
function gravatar_signup_encouragement_uninstall() {
	delete_option( 'gravatar_signup_encouragement_settings' );
}
register_uninstall_hook( __FILE__, 'gravatar_signup_encouragement_uninstall' );

/**
 * Load GSE actions at init
 *
 * @since 3.0
 */
function gravatar_signup_encouragement_init() {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* Load plugin textdomain */
	gravatar_signup_encouragement_textdomain();

	/* 
	 * Load modal if needed
	 * via http://themehybrid.com/support/topic/adding-jquery-ui-using-wp_enqueue_script-and-firing-onload-events
	 */
	if ( isset( $_REQUEST['gseaftercommentingmodal'] ) ) {
		add_action( 'template_redirect', 'show_gravatar_signup_encouragement_after_commenting_modal' );
	}

	/* Load custom script on profile page if needed */
	if ( $gse_options['show_profile'] ) {
		add_action( 'show_user_profile', 'show_gravatar_signup_encouragement_profile' );
	}

	/* Enqueue jQuery and load custom script on registration page if needed */
	if ( $gse_options['show_registration'] ) {
		add_action( 'login_head', 'gravatar_signup_encouragement_enqueing_registration' );
		add_action( 'login_head', 'wp_print_scripts', 11 );
		add_action( 'register_form', 'show_gravatar_signup_encouragement_registration' );
	}

	/* Enqueue jQuery on multisite signup page if needed */
	if ( $gse_options['show_ms_signup'] ) {
		add_action( 'template_redirect', 'gravatar_signup_encouragement_enqueing_ms_signup' );
		add_action( 'signup_extra_fields', 'show_gravatar_signup_encouragement_ms_signup' );
	}

	/* Show encouragement in admin bar if needed */
	if ( $gse_options['show_in_admin_bar'] ) {
		add_action( 'admin_bar_menu', 'gravatar_signup_encouragement_admin_bar', 1 ); // Load early before user's gravatar
	}

	/* Show encouragement in admin notices if needed */
	if ( $gse_options['show_in_admin_notices'] ) {
		add_action( 'admin_notices', 'show_gravatar_signup_encouragement_admin_notice' );
	}

	/* Show encouragement in bbPress reply form if needed */
	if ( $gse_options['show_bbpress'] ) {
		add_action( 'bbp_theme_after_reply_form', 'gravatar_signup_encouragement_bbpress' );
		add_action( 'bbp_theme_after_topic_form', 'gravatar_signup_encouragement_bbpress' );
	}

	/* Add action for handler of remover of notice after upgrade to version 2.0+ */
	if ( isset( $_GET['gse_notice_1_to_2'] ) ) {
		add_action( 'admin_init', 'gravatar_signup_encouragement_notice_upgrade_1_to_2_handler' );
	}
}
add_action( 'init', 'gravatar_signup_encouragement_init' );

/**
 * Load GSE actions at admin_init
 *
 * @since 2.0
*/
function gravatar_signup_encouragement_action_admin_init() {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* If no options, or version <2.0, upgrade */
	if ( ! $gse_options || ! $gse_options['version'] || $gse_options['version'] == '2.0' ) {
		gravatar_signup_encouragement_upgrade();
	}

	/* Add settings fields */
	add_gravatar_signup_encouragement_settings_field();
}
add_action( 'admin_init', 'gravatar_signup_encouragement_action_admin_init' );

/**
 * Load GSE actions at template_redirect
 *
 * @since 3.0
 */
function gravatar_signup_encouragement_template_redirect() {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* Show encouragement in comment form if needed */
	if ( is_singular() && comments_open() ) {
		if ( ! is_user_logged_in() && $gse_options['show_comments_unreg'] ) {
			wp_enqueue_script( 'jquery' );
			add_action( 'comment_form', 'show_gravatar_signup_encouragement_com_unreg' );
		} elseif ( is_user_logged_in() && $gse_options['show_comments_reg'] ) {
			wp_enqueue_script( 'jquery' );
			add_action( 'comment_form', 'show_gravatar_signup_encouragement_com_reg' );
		}
	}
}
add_action( 'template_redirect', 'gravatar_signup_encouragement_template_redirect' );

/**
 * Add action links to plugins page
 *
 * Thanks to Dion Hulse for guide
 * and Adminize plugin for implementation
 *
 * @link http://dd32.id.au/wordpress-plugins/?configure-link
 * @link http://bueltge.de/wordpress-admin-theme-adminimize/674/
 *
 * @since 1.0
 *
 * @param array $links Default links of plugin
 * @param string $file Name of plugin's file
 * @return array $links New & old links of plugin
 */
function gravatar_signup_encouragement_filter_plugin_actions( $links, $file ){
	static $this_plugin;

	if ( ! $this_plugin )
		$this_plugin = plugin_basename( __FILE__ );

	if ( $file == $this_plugin ) {
		$settings_link = '<a href="' . admin_url( 'options-discussion.php' ) . '#gravatar_signup_encouragement_form' . '">' . __( 'Settings', 'gse_textdomain' ) . '</a>';
		$donate_link = '<a href="http://blog.milandinic.com/donate/">' . __( 'Donate', 'gse_textdomain' ) . '</a>';
		$links = array_merge( array( $settings_link, $donate_link ), $links ); // Before other links
	}

	return $links;
}
add_filter( 'plugin_action_links', 'gravatar_signup_encouragement_filter_plugin_actions', 10, 2 );

/**
 * Load contextual help
 *
 * @link http://forum.milo317.com/topic/hacks/page/30#post-1531
 *
 * @since 2.0
 */
function add_gravatar_signup_encouragement_contextual_help() {
	global $wp_version;
	/* For post-3.3, use new API */
	if ( version_compare( $wp_version, 3.3, '>=' ) ) {
		$screen = get_current_screen();
		$screen->add_help_tab( array(
			'id'      => 'gravatar-signup-encouragement-help',
			'title'   => __( "Gravatar Signup Encouragement", "gse_textdomain" ),
			'content' => "<p>" . __( "<a href='http://blog.milandinic.com/wordpress/plugins/gravatar-signup-encouragement/' target='_blank'>Gravatar Signup Encouragement Settings Documentation</a>", "gse_textdomain" ) . "</p>" .
				"<p>" . __( '<a href="http://wordpress.org/tags/gravatar-signup-encouragement" target="_blank">Gravatar Signup Encouragement Support Forums</a>', 'gse_textdomain' ) . "</p>"
		) );
	/* Otherwise, hook in the contextual help filter */
	} else {
		add_filter( 'contextual_help', 'gravatar_signup_encouragement_contextual_help' );
	}
}
add_action( 'load-options-discussion.php','add_gravatar_signup_encouragement_contextual_help' );

/**
 * Load Thickbox files on Discussion options page
 *
 * @since 2.0
 */
function gravatar_signup_encouragement_load_thickbox_admin() {
	add_thickbox();
}
add_action( 'admin_print_styles-options-discussion.php', 'gravatar_signup_encouragement_load_thickbox_admin' );

/**
 * Filter email text field element for bad themes
 *
 * @since 2.0
 * @param string $element Original element
 * @return string $element New element
 */
function gravatar_signup_encouragement_filter_email_source( $element ) {
	/* Check if current theme is bad */
	if ( gravatar_signup_encouragement_is_theme_in_list() ) {
		return "input[name='email']";
	} else {
		return $element;
	}
}
add_filter( "gse_get_email_value_com_unreg", "gravatar_signup_encouragement_filter_email_source" );

/**
 * Check if allow_url_fopen is allowed
 *
 * @since 3.1
 * @return bool
 */
function gravatar_signup_encouragement_allow_url_fopen() {
	if ( ini_get( 'allow_url_fopen' ) )
		return true;
	else
		return false;
}

/**
 * Get URL of gravatar existence check
 *
 * @since 2.0
 *
 * @return string URL of gravatar-check.php file
 */
function gravatar_signup_encouragement_check_url() {
	if ( gravatar_signup_encouragement_allow_url_fopen() ) {
		$url = plugins_url( 'gravatar-check.php', __FILE__ );

		/* Pass rating if not G */
		if ( 'G' != get_option( 'avatar_rating' ) )
			$url = add_query_arg( 'r', get_option( 'avatar_rating' ), $url );

		return $url;
	} else {
		return admin_url( 'admin-ajax.php' );
	}
}

/**
 * Load textdomain for internationalization
 *
 * @since 1.0
 */
function gravatar_signup_encouragement_textdomain() {
	load_plugin_textdomain( 'gse_textdomain', false, dirname( plugin_basename( __FILE__ ) ) . '/translations' );
}

/**
 * Load options from database
 *
 * @since 3.0
 *
 * @return array Array of options values.
 */
function gravatar_signup_encouragement_get_option() {
	$gse_options = get_option( 'gravatar_signup_encouragement_settings' );
	return $gse_options;
}

/**
 * Get default encouragement message
 *
 * @since 2.0
 *
 * @return string Default encouragement message
 */
function gravatar_signup_encouragement_default_message() {
	/* Load plugin textdomain since maybe it's not loaded already */
	gravatar_signup_encouragement_textdomain();

	$message = sprintf( __( "You do not appear to have a registered Gravatar. Therefore, the default avatar will be shown with your comments on this site.

If you would like your own Gravatar, click <a href='%s' target='_blank'>here</a> to create one (link opens in new tab/window).", "gse_textdomain" ), "URL" );

	return $message;	
}

/**
 * Save default options to database
 *
 * @since 3.0
 */
function gravatar_signup_encouragement_add_default_options() {
	/* Setup variable */
	$gse_options = array();

	/*
	 * By default, show message to unregistered commenters
	 * and show below: comment field (for comments), “Profile” header (profile), e-mail address (registration & signup)
	 */
	$gse_options['show_comments_unreg'] = '1';
	$gse_options['below_comments_unreg'] = '#comment';
	$gse_options['below_comments_reg'] = '#comment';
	$gse_options['below_profile'] = 'h2';
	$gse_options['below_registration'] = '#user_email';
	if ( function_exists('is_multisite') && is_multisite() && is_main_site() ) {
		$gse_options['below_ms_signup'] = '#user_email';
	}

	/* Add version number */
	$gse_options['version'] = '3.0';

	/* Load plugin textdomain since maybe it's not loaded already */
	gravatar_signup_encouragement_textdomain();

	/* Add default message */
	$gse_options['tip_text'] = gravatar_signup_encouragement_default_message();

	/* Save options to the database */
	add_option( 'gravatar_signup_encouragement_settings', $gse_options );
}

/**
 * Update or add default options.
 *
 * Runs on admin_init to see what should do.
 *
 * @since 2.0
 */
function gravatar_signup_encouragement_upgrade() {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* If no options, add default */
	if ( ! $gse_options ) {
		gravatar_signup_encouragement_add_default_options();
	/* Else update to version 3.0 */
	} else {
		/* Update from 1.0 */
		if ( ! $gse_options['version'] ) {
			/* Make array with names of options */
			$elements = array( 'below_comments_unreg', 'below_comments_unreg_custom', 'below_comments_reg', 'below_comments_reg_custom', 'below_profile', 'below_profile_custom', 'below_registration', 'below_registration_custom' );

			/* Split array into keys with names of options */
			foreach ( $elements as $element ) :
				/* Check if option exists */
				if ( $gse_options[$element] ) {
					/*
					 * Get position of # in option's value.
					 * If it isn't a first character,
					 * add it in front of value and update option.
					 */
					if ( strpos( $gse_options[$element], '#' ) !== 0 ) {
						$gse_options[$element] = '#' . $gse_options[$element];
						update_option( 'gravatar_signup_encouragement_settings', $gse_options );
					}
				}
			endforeach;

			/* Add new version and notice about upgrade	*/
			$gse_options['version'] = '3.0';
			$gse_options['notice_upgrade_1_to_3'] = true;
			update_option( 'gravatar_signup_encouragement_settings', $gse_options );
		/* Update from 2.0+ */
		} elseif ( $gse_options['version'] == '2.0' ) {
			/* Add new version and notice about upgrade	*/
			$gse_options['version'] = '3.0';
			$gse_options['notice_upgrade_2_to_3'] = true;
			unset( $gse_options['notice_upgrade_1_to_2'] );
			update_option( 'gravatar_signup_encouragement_settings', $gse_options );
		}
	}
}

/**
 * Show notice after upgrade to version 2.0
 *
 * @since 2.0
 */
function gravatar_signup_encouragement_notice_upgrade_1_to_2() {
	/* Check if current user can actually manage options */
	if ( ! current_user_can( 'manage_options' ) )
		return;

	echo '<div class="error default-password-nag">';
		echo '<p>';
			echo '<strong>' . __( 'Notice:', 'gse_textdomain' ) . '</strong> ';
			_e( 'The latest version of the Gravatar Signup Encouragement plugin has new options. Default settings have been configured for these options. Would you like to review and update these new options?', 'gse_textdomain' );
		echo '</p>';
		echo '<p>';
			printf( '<a href="%s">' . __( 'Yes (edit Gravatar Signup Encouragement settings)', 'gse_textdomain' ) . '</a> | ', admin_url( 'options-discussion.php' ) . '#gravatar_signup_encouragement_form' );
		printf( '<a href="%s" id="gse-notice-1-to-2-no">' . __( 'No (use pre-configured default settings)', 'gse_textdomain' ) . '</a>', '?gse_notice_1_to_2=0' );
		echo '</p>';
	echo '</div>';
}

/**
 * Remove notice after upgrade to version 2.0
 *
 * @since 2.0
 */
function gravatar_signup_encouragement_notice_upgrade_1_to_2_handler( $errors = false ) {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* Check if user clicked on notice removal */
	if ( isset( $_GET['gse_notice_1_to_2'] ) && '0' == $_GET['gse_notice_1_to_2'] ) {
		unset( $gse_options['notice_upgrade_1_to_3'] );
		unset( $gse_options['notice_upgrade_2_to_3'] );
		update_option( 'gravatar_signup_encouragement_settings', $gse_options );
	}
}

/**
 * Enqueue jQuery
 *
 * @since 2.0
 */
function gravatar_signup_encouragement_enqueing_ms_signup() {
	wp_enqueue_script( 'jquery' );
}

/**
 * Enqueue jQuery on singular page with opened comments
 *
 * @since 1.0
 * @deprecated 3.0.0
 * @deprecated Use gravatar_signup_encouragement_template_redirect()
 * @see gravatar_signup_encouragement_template_redirect()
 */
function gravatar_signup_encouragement_enqueing_comments() {
	_deprecated_function( __FUNCTION__, '3.0', 'gravatar_signup_encouragement_template_redirect()' );
	return gravatar_signup_encouragement_template_redirect();
}

/**
 * Enqueue jQuery
 *
 * @since 1.0
 */
function gravatar_signup_encouragement_enqueing_registration() {
	wp_enqueue_script( 'jquery' );
}

/**
 * Check if current theme doesn't follow standards
 *
 * Themes are: Carrington Blog and Mystique
 *
 * @since 2.0
 * @return bool
*/
function gravatar_signup_encouragement_is_theme_in_list() {
	if ( in_array( get_stylesheet(), array( 'carrington-blog', 'mystique' ) ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Get URL of screenshot
 *
 * @since 2.0
 *
 * @param string $screenshot Filename of screenshot
 * @return string URL of screenshot file
 */
function gravatar_signup_encouragement_screenshot_url( $screenshot ) {
	$gse_screenshot_url = plugins_url( $screenshot, __FILE__ );
	return $gse_screenshot_url;
}

/**
 * Add fields on Discussion Settings page, section Gravatar
 *
 * @link http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
 *
 * @since 1.0
 */
function add_gravatar_signup_encouragement_settings_field() {
 
	/* Register settings field */
	add_settings_field(
		'gravatar_signup_encouragement_settings', // the id the form field will use
		__('Gravatar Signup Encouragement', 'gse_textdomain'), // name to display on the page
		'gravatar_signup_encouragement_field_settings_form', // callback function
		'discussion', // the name of the page
		'avatars' // the section of the page to add the field to
	);
 
	/* Register the setting to make sure options get saved */
	register_setting( 'discussion', 'gravatar_signup_encouragement_settings' );
}

/**
 * Show setting fields
 *
 * @link http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
 *
 * @since 1.0
 */
function gravatar_signup_encouragement_field_settings_form() {
	/* Load file with settings form */
	require_once( dirname( __FILE__ ) . '/settings.php' );
	/* Display form */
	gravatar_signup_encouragement_field_settings_form_display();
}

/**
 * Show contextual help for GSE on settings page
 *
 * Based on code from Adminize plugin
 * @link http://bueltge.de/wordpress-admin-theme-adminimize/674/
 *
 * @since 2.0
 * @param string $help Existing contextual help
 */
function gravatar_signup_encouragement_contextual_help( $help ) {
	/* Show existing help */
	echo $help;

	/* Show GSE help */
	echo "<h5>" . __( "Gravatar Signup Encouragement", "gse_textdomain" ) . "</h5>";
	echo "<p>" . __( "<a href='http://blog.milandinic.com/wordpress/plugins/gravatar-signup-encouragement/' target='_blank'>Gravatar Signup Encouragement Settings Documentation</a>", "gse_textdomain" ) . "</p>";
	echo "<p>" . __( '<a href="http://wordpress.org/tags/gravatar-signup-encouragement" target="_blank">Gravatar Signup Encouragement Support Forums</a>', 'gse_textdomain' ) . "</p>";
}

/**
 * Check if gravatar exists
 *
 * @since 2.0
 * @param string $email Email addresses that is checked
 * @return bool
 */
function gravatar_signup_encouragement_check_gravatar_existence( $email ) {
	$fileUrl = 'http://www.gravatar.com/avatar/' . md5( strtolower( $email ) ) . '?s=2&d=404';

	/* Pass rating if not G */
	if ( 'G' != get_option( 'avatar_rating' ) )
		$fileUrl .= '&r=' . get_option( 'avatar_rating' );

	/* Lets first try with faster method */
	if ( gravatar_signup_encouragement_allow_url_fopen() ) {
		$AgetHeaders = @get_headers( $fileUrl );
		if ( ! preg_match( "|200|", $AgetHeaders[0] ) ) {
			return false;
		} else {
			return true;
		}
	/* Then we try with WordPress HTTP API */
	} else {
		$response = wp_remote_get( $fileUrl );
		/* If there is no error, get response code */
		if ( ! is_wp_error( $response ) ) {
			$response_code = wp_remote_retrieve_response_code( $response );
			if ( 200 == $response_code ) {
				return true;
			} else {
				return false;
			}
		/* Otherwise return true */
		} else {
			return true;
		}
	}
}

/**
 * Get URL to locale gravatar signup page
 *
 * @since 2.0
 * @param string $email Email address that should be apended
 * @return string $gse_url URL of locale signup page
 */
function gravatar_signup_encouragement_locale_signup_url( $email = '' ) {
	/* translators: Locale gravatar.com, e.g. sr.gravatar.com for Serbian */
	$gse_locale_url = _x( 'en.gravatar.com', 'Locale gravatar.com, e.g. sr.gravatar.com for Serbian', 'gse_textdomain' );

	/* Check if it's really locale.gravatar.com */
	if ( preg_match( '|^[A-Z_%+-]+.gravatar+.com|i', $gse_locale_url ) ) {
		$gse_locale_url = $gse_locale_url;
	} else {
		$gse_locale_url = 'en.gravatar.com';
	}

	/* If email exists, append it */
	if ( empty( $email ) ) {
		$gse_url = "http://" . $gse_locale_url . '/site/signup/';
	} else {
		$encoded_email = urlencode( $email );
		$gse_url = "http://" . $gse_locale_url . '/site/signup/' . $encoded_email;
	}

	return $gse_url;
}

/**
 * Get encouragement message
 *
 * @since 1.0
 * @param string $email Email address that should be appended to signup URL
 * @param string $onclick Javascript function name run on click on signup URL
 * @return string $gse_tip_text Encouragement message
 */
function gravatar_signup_encouragement_message( $email = '', $onclick = '') {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* Get appropiate signup URL */	
	if ( empty( $email ) ) {
		$gse_url = gravatar_signup_encouragement_locale_signup_url() . '" + emailValue + "';
	} else {
		$gse_url = gravatar_signup_encouragement_locale_signup_url( $email );
	}

	/* If there is no message, use default */
	if ( ! $gse_options['tip_text']) {
		$gse_options['tip_text'] = gravatar_signup_encouragement_default_message();
	}

	/* Replace placeholder with real URL */
	$gse_tip_text = preg_replace( '/URL/', $gse_url, $gse_options['tip_text'] );

	/* Add onclick if needed */
	if ( ! empty( $onclick ) ) {
		$gse_tip_text = preg_replace( '/a href/', 'a onclick="' . $onclick . '" href', $gse_tip_text );
	}

	/*
	 * Replace new lines with <br />
	 * Code from http://www.projectpier.org/node/771
	 * via http://www.learningjquery.com/2006/11/really-simple-live-comment-preview
	 */
	$gse_tip_text = str_replace( "\r", "", $gse_tip_text );  // Remove \r
	$gse_tip_text = str_replace( "\n", "<br />", $gse_tip_text );  // Replace \n with <br />

	/* Return message */	
	return $gse_tip_text;
}

/**
 * Handle check on admin-ajax.php
 *
 * Used when allow_url_fopen is dissalowed
 *
 * @since 3.1
 */
function gravatar_signup_encouragement_wp_ajax_check() {
	/* Load e-mail address sent via POST */
	$gravatar_email = $_POST['gravmail'];

	/* Echo no if no existence */
	if ( ! gravatar_signup_encouragement_check_gravatar_existence( $gravatar_email ) )
		die ( 'no' );
}
add_action( 'wp_ajax_gse_check', 'gravatar_signup_encouragement_wp_ajax_check' );
add_action( 'wp_ajax_nopriv_gse_check', 'gravatar_signup_encouragement_wp_ajax_check' );

/**
 * Show encouragement on comment form for unregistered users
 *
 * @since 1.0
 */
function show_gravatar_signup_encouragement_com_unreg() {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* Show message if user commented before */
	$gse_current_commenter = wp_get_current_commenter();
	if ( $gse_current_commenter['comment_author_email'] ) {
		?>
<script language="javascript">
jQuery(document).ready(function()
{
	<?php // post and check if gravatar exists or not from ajax ?>
	var emailValue = jQuery("<?php echo apply_filters( 'gse_get_email_value_com_unreg', '#email' ); ?>").val();
	jQuery.post("<?php echo gravatar_signup_encouragement_check_url(); ?>",{ gravmail:emailValue, action:"gse_check" } ,function(data)
	{
	  if (data == 'no') <?php // if gravatar doesn't exist ?>
	  {
		var emailValue = jQuery("<?php echo apply_filters( 'gse_get_email_value_com_unreg', '#email' ); ?>").val(); <?php // pick up e-mail address from field ?>

		emailValue = encodeURIComponent(emailValue); <?php // urlencode e-mail address ?>

		jQuery('#gse_comments_message').hide(); <?php // hide tip if allready shown ?>

		jQuery("<?php echo $gse_options['below_comments_unreg']; ?>").after("<br /><div id='gse_comments_message'><?php echo apply_filters( 'gse_message_com_unreg', gravatar_signup_encouragement_message() ); ?></div>"); <?php // show tip ?>
	  }  	
	  else
	  {
		jQuery('#gse_comments_message').hide(); <?php // hide tip if allready shown ?>
	  }
	});
});
</script>
	<?php
	}

	/* Show message when user leaves email address field */
	?>
<script language="javascript">
jQuery(document).ready(function()
{
	jQuery("<?php echo apply_filters( 'gse_get_email_value_com_unreg', '#email' ); ?>").blur(function() <?php // when user leave #email field ?>
	{		
		<?php // post and check if gravatar exists or not from ajax ?>
		jQuery.post("<?php echo gravatar_signup_encouragement_check_url(); ?>",{ gravmail:jQuery(this).val(), action:"gse_check" } ,function(data)
        {
		  if (data == 'no') <?php // if gravatar doesn't exist ?>
		  {
			var emailValue = jQuery("<?php echo apply_filters( 'gse_get_email_value_com_unreg', '#email' ); ?>").val(); <?php // pick up e-mail address from field ?>

			emailValue = encodeURIComponent(emailValue); <?php // urlencode e-mail address ?>

			jQuery('#gse_comments_message').hide(); <?php // hide tip if allready shown ?>

		  	jQuery("<?php echo $gse_options['below_comments_unreg']; ?>").after("<br /><div id='gse_comments_message'><?php echo apply_filters( 'gse_message_com_unreg', gravatar_signup_encouragement_message() ); ?></div>"); <?php // show tip ?>
          }  	
		  else
		  {
			jQuery('#gse_comments_message').hide(); <?php // hide tip if allready shown ?>
		  }
        });
 
	});
});
</script>
	<?php
}

/**
 * Show encouragement on comment form for registered users
 *
 * @since 1.0
 */
function show_gravatar_signup_encouragement_com_reg() {
	/* Get user's email address */
	global $user_email;
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	?>
<script language="javascript">
jQuery(document).ready(function()
{		
		<?php // post and check if gravatar exists or not from ajax ?>
		jQuery.post("<?php echo gravatar_signup_encouragement_check_url(); ?>",{ gravmail:"<?php echo $user_email; ?>", action:"gse_check" } ,function(data)
        {
		  if (data == 'no') <?php // if gravatar doesn't exist ?>
		  {
			jQuery('#gse_comments_message').hide(); <?php // hide tip if allready shown ?>

		  	jQuery("<?php echo $gse_options['below_comments_reg']; ?>").after("<br /><div id='gse_comments_message'><?php echo apply_filters( 'gse_message_com_reg', gravatar_signup_encouragement_message( $user_email ) ); ?></div>"); <?php // show tip ?>
          }  				
        });
});
</script>
	<?php
}

/**
 * Conditionaly load comment form encouregement
 *
 * @since 1.0
 * @deprecated 3.0.0
 * @deprecated Use gravatar_signup_encouragement_template_redirect()
 * @see gravatar_signup_encouragement_template_redirect()
 */
function gravatar_signup_encouragement_comment_form() {
	_deprecated_function( __FUNCTION__, '3.0', 'gravatar_signup_encouragement_template_redirect()' );
	return gravatar_signup_encouragement_template_redirect();
}

/**
 * Show encouragement modal after comment is posted
 *
 * @since 2.0
 */
function show_gravatar_signup_encouragement_after_commenting_modal() {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* Check to see if we need to show modal */
	if ( ( ! is_user_logged_in() && $gse_options['show_after_commenting_modal_unreg'] ) || ( is_user_logged_in() && $gse_options['show_after_commenting_modal_reg'] ) ) {
		/* Load Thickbox files */
		function gravatar_signup_encouragement_load_thickbox() {
			add_thickbox();
			?>
				<script type="text/javascript">
					/* <![CDATA[ */
					var tb_pathToImage = '<?php echo esc_js( includes_url( '/js/thickbox/loadingAnimation.gif' ) ); ?>';
					var tb_closeImage = '<?php echo esc_js( includes_url( '/js/thickbox/tb-close.png' ) ); ?>';
					/* ]]> */    
				</script>
			<?php
		}
		add_action( 'wp_head', 'gravatar_signup_encouragement_load_thickbox', 0 );

		/* Load inline Thickbox code */
		function gravatar_signup_encouragement_inline_thickbox() {
			/* Get user's email address */
			global $user_email;
			if ( is_user_logged_in() ) {
				$commenter_email = $user_email;
			} else {
				$commenter = wp_get_current_commenter();
				$commenter_email = $commenter['comment_author_email'];
			}

			/* 
			 * Show modal when page is loaded
			 * Thank to these tutorials:
			 * http://www.rahulsingla.com/blog/2010/02/thickbox-show-on-page-load
			 * http://hobione.wordpress.com/2007/12/28/jquery-thickbox/ via http://www.webmasterworld.com/javascript/3843343.htm
			 */
			?>
			<script type="text/javascript">
				jQuery(document).ready(function(){   
					tb_show('<?php _e( 'Signup to Gravatar', 'gse_textdomain' ); ?>', '#TB_inline?width=<?php echo apply_filters( 'gse_after_commenting_modal_width', '450' ); ?>&height=<?php echo apply_filters( 'gse_after_commenting_modal_height', '435' ); ?>&inlineId=gseaftercommenting&modal=true', false);
				});
			</script>

			<?php
			/* Modal's content
			 * via http://jquery.com/demo/thickbox/
			 */
			 ?>
			<div id="gseaftercommenting" style="display:none">
				<div style="text-align: center;" id="gse_after_commenting_modal_avatar"><?php echo get_avatar( $commenter_email ); ?></div>
				<p id="gse_after_commenting_modal_text"><?php echo apply_filters( 'gse_message_after_commenting_modal', gravatar_signup_encouragement_message( $commenter_email, 'tb_remove()' ), $commenter_email ); ?></p>
				<p style="text-align:center" id="gse_after_commenting_modal_buttons">
					<input type="submit" id="gse_after_commenting_modal_signup_button" value="<?php _e( 'Get a new avatar', 'gse_textdomain' ); ?>" onclick="window.open('<?php echo gravatar_signup_encouragement_locale_signup_url( $commenter_email ); ?>'); tb_remove()" />
					<input type="submit" id="gse_after_commenting_modal_close_button" value="<?php _e( 'Close this message', 'gse_textdomain' ); ?>" onclick="tb_remove()" />
				</p> 
			</div>
			<?php
		}
		add_action( 'wp_footer', 'gravatar_signup_encouragement_inline_thickbox', 20 );
	}
}

/**
 * Add query argument to URL in comment redirect
 *
 * @since 2.0
 * @param string $url Original URL where to redirect
 * @param object $comment Comment that is posted
 * @return string $url New URL with query argument
*/
function gravatar_signup_encouragement_after_commenting_redirect( $url, $comment ) {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	/* Check to see if we need to add query argument */
	if ( ( $gse_options['show_after_commenting_modal_unreg'] && ! is_user_logged_in() ) || ( $gse_options['show_after_commenting_modal_reg'] && is_user_logged_in() ) ) {
		/* Check to see if commenter has gravatar */
		if ( ! gravatar_signup_encouragement_check_gravatar_existence( $comment->comment_author_email ) ) {
			$new_url = add_query_arg( 'gseaftercommentingmodal', '', $url );
			return $new_url;
		} else {
			return $url;
		}
	} else {
		return $url;
	}
}
add_filter( 'comment_post_redirect', 'gravatar_signup_encouragement_after_commenting_redirect', 10, 2 );

/**
 * Show encouragement in admin notices
 *
 * @since 2.0
 */
function show_gravatar_signup_encouragement_admin_notice() {
	/* Get user's email address */
	global $user_email;
	
	/* Check to see if user has gravatar */
	if ( ! gravatar_signup_encouragement_check_gravatar_existence( $user_email ) ) {
		echo '<div class="update-nag" id="gse_admin_notice">' . gravatar_signup_encouragement_message( $user_email ) . '</div>';
	}
}

/**
 * Show encouragement on profile page
 *
 * @since 1.0
 */
function show_gravatar_signup_encouragement_profile() {
	/* Get user's email address */
	global $user_email;
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	?>
<script language="javascript">
jQuery(document).ready(function()
{
		<?php // post and check if gravatar exists or not from ajax ?>
		jQuery.post("<?php echo gravatar_signup_encouragement_check_url(); ?>",{ gravmail:"<?php echo $user_email; ?>", action:"gse_check" } ,function(data)
        {
		  if (data == 'no') <?php // if gravatar doesn't exist ?>
		  {
			jQuery('#gse_profile_message').hide(); <?php // hide tip if allready shown ?>

		  	jQuery("<?php echo $gse_options['below_profile']; ?>").after("<br /><div id='gse_profile_message'><?php echo apply_filters( 'gse_message_profile', gravatar_signup_encouragement_message( $user_email ) ); ?></div>"); <?php // show tip ?>
          }  				
        });
});
</script>
	<?php
}

/**
 * Show encouragement on registration page
 *
 * Actions based on plugin Gravajax Registration by Alex Cragg
 * @link http://www.epicalex.com/gravajax-registration/
 *
 * @since 1.0
 */
function show_gravatar_signup_encouragement_registration() {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	?>
<script language="javascript">
jQuery(document).ready(function()
{
	<?php
	/*
	 * Hack for delaying keyup event
	 * Based on script from jQuery's mailing list by Klaus Hartl (  http://www.nabble.com/how-to-delay-a-event--td12288007s27240.html#a12291809 )
	 */
	?>
	var delayed; 
	jQuery("#user_email").keyup(function() <?php // when user leave #user_email field ?>
	{		
		clearTimeout(delayed);
		var value = this.value; delayed = setTimeout(function() { 
			<?php // post and check if gravatar exists or not from ajax ?>
			jQuery.post("<?php echo gravatar_signup_encouragement_check_url(); ?>",{ gravmail:value, action:"gse_check" } ,function(data)
			{
			  if (data == 'no') <?php // if gravatar doesn't exist ?>
			  {
				var emailValue = jQuery("#user_email").val(); <?php // pick up e-mail address from field ?>

				emailValue = encodeURIComponent(emailValue); <?php // urlencode e-mail address ?>

				jQuery('#gse_registration_message').hide(); <?php // hide tip if allready shown ?>

				jQuery("<?php echo $gse_options['below_registration']; ?>").after("<div id='gse_registration_message'><?php echo apply_filters( 'gse_message_after_commenting_modal', gravatar_signup_encouragement_message() ); ?></div>"); <?php // show tip ?>
			  }
			  else
			  {
				jQuery('#gse_registration_message').hide(); <?php // hide tip if allready shown ?>
			  }
			});
		}, <?php echo apply_filters( 'gse_timeout_registration', '1000' ); ?>); 
 
	});
});
</script>
	<?php	
}

/**
 * Show encouragement in admin bar
 *
 * @since 3.0
 */
function gravatar_signup_encouragement_admin_bar() {
	/* Get user's email address & admin bar object */
	global $wp_admin_bar, $user_email;

	/* If user has an gravatar, return empty */
	if ( gravatar_signup_encouragement_check_gravatar_existence( $user_email ) )
		return;

	$wp_admin_bar->add_menu( 
		array(
			'id' => 'gse-tip',
			'title' => __( 'Signup to Gravatar', 'gse_textdomain' ),
			'href' => gravatar_signup_encouragement_locale_signup_url( $user_email )
		)
	);
}

/**
 * Show encouragement in bbPress reply form
 *
 * @since 3.0
 */
function gravatar_signup_encouragement_bbpress() {
	/* Get user's email address */
	global $user_email;
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();
	/* Load jQuery */
	wp_print_scripts( 'jquery' );
	?>
<script language="javascript">
jQuery(document).ready(function()
{		
		<?php // post and check if gravatar exists or not from ajax ?>
		jQuery.post("<?php echo gravatar_signup_encouragement_check_url(); ?>",{ gravmail:"<?php echo $user_email; ?>", action:"gse_check" } ,function(data)
        {
		  if (data == 'no') <?php // if gravatar doesn't exist ?>
		  {
			jQuery('#gse_bbpress_message').hide(); <?php // hide tip if allready shown ?>

		  	jQuery("<?php echo $gse_options['below_bbpress']; ?>").after("<br /><div id='gse_bbpress_message'><?php echo apply_filters( 'gse_message_bbpress', gravatar_signup_encouragement_message( $user_email ) ); ?></div>"); <?php // show tip ?>
          }  				
        });
});
</script>
	<?php
}

/**
 * Show encouragement on signup page (multisite)
 *
 * @since 2.0
*/
function show_gravatar_signup_encouragement_ms_signup() {
	/* Load options */
	$gse_options = gravatar_signup_encouragement_get_option();

	?>
<script language="javascript">
jQuery(document).ready(function()
{
	<?php
	/*
	 * Hack for delaying keyup event
	 * Based on script from jQuery's mailing list by Klaus Hartl (  http://www.nabble.com/how-to-delay-a-event--td12288007s27240.html#a12291809 )
	 */
	?>
	var delayed; 
	jQuery("#user_email").keyup(function() <?php // when user leave #user_email field ?>
	{		
		clearTimeout(delayed);
		var value = this.value; delayed = setTimeout(function() { 
			<?php // post and check if gravatar exists or not from ajax ?>
			jQuery.post("<?php echo gravatar_signup_encouragement_check_url(); ?>",{ gravmail:value, action:"gse_check" } ,function(data)
			{
			  if (data == 'no') <?php // if gravatar doesn't exist ?>
			  {
				var emailValue = jQuery("#user_email").val(); <?php // pick up e-mail address from field ?>

				emailValue = encodeURIComponent(emailValue); <?php // urlencode e-mail address ?>

				jQuery('#gse_ms_signup_message').hide(); <?php // hide tip if allready shown ?>

				jQuery("<?php echo $gse_options['below_ms_signup']; ?>").after("<div id='gse_ms_signup_message'><?php echo apply_filters( 'gse_message_after_commenting_modal', gravatar_signup_encouragement_message() ); ?></div>"); <?php // show tip ?>
			  }
			  else
			  {
				jQuery('#gse_ms_signup_message').hide(); <?php // hide tip if allready shown ?>
			  }
			});
		}, <?php echo apply_filters( 'gse_timeout_ms_signup', '1000' ); ?>); 
 
	});
});
</script>
	<?php	
}

?>