<?php

/*
  Plugin Name: App Banners
  Plugin URI: www.emoxie.com
  Description: Ability to promote iOS, Android and MS Applications with an App Banner similar to iOS6 App Banner.  Utilizes jQuery Smart Banner by Arnold Daniels <arnold@jasny.net>
  Version: 1.5.1
  Author: E-Moxie
  Author URI: www.emoxie.com
 */

if ( ! class_exists( 'AppBanners' ) ) :

	class AppBanners {

		/**
		 * Initialization function
		 */
		public static function init() {
			add_action( 'wp_enqueue_scripts', 'AppBanners_enqueue_scripts' );
			add_action( 'wp_footer', 'AppBanners_Scripts' );
			add_action( 'wp_head', 'AppBanners_Meta' );
			add_filter( "plugin_action_links_" . plugin_basename( __FILE__ ), 'AppBanners_settings_link' );

			/**
			 * If logged into administration area call the Admin functions of the AppBanners
			 */

			if ( is_admin() ) {
				require_once dirname( __FILE__ ) . '/appBanners-admin.php';
				App_Banners_Admin::init();
			}
		}

	}

	/*
	 * Scripts to be enqueued into Wordpress.  Making sure that jquery is added as a depenency
	 * for SmartBanner.js
	 */

	function AppBanners_enqueue_scripts() {
		wp_register_style( 'app-banners-styles', plugins_url( '/lib/smartbanner/jquery.smartbanner.css', __FILE__ ) );
		wp_enqueue_style( 'app-banners-styles' );
		wp_register_script( 'app-banners-scripts', plugins_url( '/lib/smartbanner/jquery.smartbanner.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'app-banners-scripts' );
	}


	/*
	 * Function to inject the SmartBanner javascript into the footer of the page
	 * After the wp_footer
	 */

	function AppBanners_Scripts() {
		$author           = get_option( 'APP_BANNERS_author' );
		$price            = get_option( 'APP_BANNERS_price' );
		$title            = get_option( 'APP_BANNERS_title' );
		$icon             = get_option( 'APP_BANNERS_icon' );
		$button           = get_option( 'APP_BANNERS_button' );
		$daysHidden       = get_option( 'APP_BANNERS_daysHidden' );
		$daysReminder     = get_option( 'APP_BANNERS_daysReminder' );
		$speedOut         = get_option( 'APP_BANNERS_speedOut' );
		$speedIn          = get_option( 'APP_BANNERS_speedIn' );
		$iconGloss        = get_option( 'APP_BANNERS_iconGloss' );
		$inAppStore       = get_option( 'APP_BANNERS_inAppStore' );
		$inGooglePlay     = get_option( 'APP_BANNERS_inGooglePlay' );
		$appStoreLanguage = get_option( 'APP_BANNERS_appStoreLanguage' );

		/*
		 * Future plans to incorporate all of the options into the Settings of plugin
		 * for this moment though I just needed a few.
		 */
		echo "
                <script type='text/javascript'>

				jQuery.smartbanner({
				  title: '" . htmlspecialchars( $title, ENT_QUOTES ) . "', // What the title of the app should be in the banner (defaults to <title>)
				  author: '" . htmlspecialchars( $author, ENT_QUOTES ) . "', // What the author of the app should be in the banner (defaults to <meta name='author'> or hostname)
				  price: '" . $price . "', // Price of the app
				  appStoreLanguage: '" . $appStoreLanguage . "', // Language code for App Store
				  inAppStore: '" . htmlspecialchars( $inAppStore, ENT_QUOTES ) . "', // Text of price for iOS
				  inGooglePlay: '" . htmlspecialchars( $inGooglePlay, ENT_QUOTES ) . "', // Text of price for Android
				  inAmazonAppStore: 'In the Amazon Appstore',
				  inWindowsStore: 'In the Windows Store', // Text of price for Windows
				  GooglePlayParams: null, // Additional parameters for the market
				  icon: '" . $icon . "', // The URL of the icon (defaults to <meta name='apple-touch-icon'>)
				  iconGloss: " . $iconGloss . ", // Force gloss effect for iOS even for precomposed
				  url: null, // The URL for the button. Keep null if you want the button to link to the app store.
				  button: '" . htmlspecialchars( $button, ENT_QUOTES ) . "', // Text for the install button
				  scale: 'auto', // Scale based on viewport size (set to 1 to disable)
				  speedIn: " . $speedIn . ", // Show animation speed of the banner
				  speedOut: " . $speedOut . ", // Close animation speed of the banner
				  daysHidden: " . $daysHidden . ", // Duration to hide the banner after being closed (0 = always show banner)
				  daysReminder: " . $daysReminder . ", // Duration to hide the banner after 'VIEW' is clicked *separate from when the close button is clicked* (0 = always show banner)
				  force: null, // Choose 'ios', 'android' or 'windows'. Don't do a browser check, just always show this banner
				  hideOnInstall: true, // Hide the banner after 'VIEW' is clicked.
				  layer: false, // Display as overlay layer or slide down the page
				  iOSUniversalApp: true, // If the iOS App is a universal app for both iPad and iPhone, display Smart Banner to iPad users, too.
				  appendToSelector: 'body' //Append the banner to a specific selector
				})
                </script>
                " . PHP_EOL;
	}


	/*
	 * Function to inject the default app banner meta tags into the head of the
	 * site.  Utilizing wp_head action.
	 */
	function AppBanners_Meta() {
		$appleID                  = get_option( 'APP_BANNERS_apple_id' );
		$androidID                = get_option( 'APP_BANNERS_android_id' );
		$author                   = get_option( 'APP_BANNERS_author' );
		$msApplicationID          = get_option( 'APP_BANNERS_ms_application_id' );
		$msApplicationPackageName = get_option( 'APP_BANNERS_ms_application_package_name' );

		if ( $appleID ) {
			echo '<meta name="apple-itunes-app" content="app-id=' . $appleID . '">' . PHP_EOL;
		}
		if ( $androidID ) {
			echo '<meta name="google-play-app" content="app-id=' . $androidID . '">' . PHP_EOL;
		}
		if ( $msApplicationID ) {
			echo '<meta name="msApplication-ID" content="' . $msApplicationID . '"/>' . PHP_EOL;
		}
		if ( $msApplicationPackageName ) {
			echo '<meta name="msApplication-PackageFamilyName" content="' . $msApplicationPackageName . '"/>' . PHP_EOL;
		}
		if ( $author ) {
			echo '<meta name="author" content="' . $author . '">' . PHP_EOL;
		}
		echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . PHP_EOL;

	}


	/**
	 * Add in Settings link to plugin details.
	 * @param $links
	 *
	 * @return mixed
	 */
	function AppBanners_settings_link( $links ) {
		$settings_link = '<a href="options-general.php?page=app-banners-plugin-options_options">Settings</a>';
		array_unshift( $links, $settings_link );

		return $links;
	}

	AppBanners::init();

endif;