<?php
/*
Plugin Name: JM Twitter Cards
Plugin URI: http://www.tweetpress.fr
Description: Meant to help users to implement and customize Twitter Cards easily
Author: Julien Maury
Author URI: http://www.tweetpress.fr
Version: 5.2.2
License: GPL2++

JM Twitter Cards Plugin
Copyright (C) 2013-2014, Julien Maury - contact@tweetpress.fr

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.


*    Sources: 
* - https://dev.twitter.com/docs/cards
* - https://dev.twitter.com/docs/cards/getting-started#open-graph
* - https://dev.twitter.com/docs/cards/markup-reference
* - https://dev.twitter.com/docs/cards/types/player-card
* - https://dev.twitter.com/docs/cards/app-installs-and-deep-linking [GREAT]
* - http://highlightjs.org/
* - https://dev.twitter.com/discussions/17878
* - https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress
* - https://about.twitter.com/fr/press/brand-assets
* - http://www.jqeasy.com/jquery-character-counter
* - https://trepmal.com/2011/04/03/change-the-virtual-robots-txt-file/
* - http://perishablepress.com/5-easy-ways-to-display-syntax-highlighted-php-code/
*/


//Add some security, no direct load !
defined('ABSPATH') 
or die('What we\'re dealing with here is a total lack of respect for the law !');


//Constantly constant
define( 'JM_TC_VERSION', '5.2.2' );
define( 'JM_TC_DIR', plugin_dir_path( __FILE__ )  );
define( 'JM_TC_INC_DIR', trailingslashit(JM_TC_DIR . 'inc') );
define( 'JM_TC_ADMIN_DIR', trailingslashit(JM_TC_DIR . 'inc/admin') );
define( 'JM_TC_ADMIN_PAGES_DIR', trailingslashit(JM_TC_INC_DIR . 'admin/pages') );
define( 'JM_TC_METABOX_DIR', trailingslashit(JM_TC_INC_DIR . 'admin/meta-box') );
define( 'JM_TC_LANG_DIR', dirname(plugin_basename(__FILE__)) . '/languages/' );
define( 'JM_TC_URL', trailingslashit(plugin_dir_url( __FILE__ ).'inc/admin') );
define( 'JM_TC_METABOX_URL', trailingslashit(JM_TC_URL.'admin/meta-box') );
define( 'JM_TC_IMG_URL', trailingslashit(JM_TC_URL.'img') );
define( 'JM_TC_CSS_URL', trailingslashit(JM_TC_URL.'css') );
define( 'JM_TC_JS_URL', trailingslashit(JM_TC_URL.'js') );				
	
	
//Call admin pages
function jm_tc_subpages(){
if ( isset( $_GET['page'] ) ) {
		switch ( $_GET['page'] ) {
			case 'jm_tc_cf':
				require( JM_TC_ADMIN_PAGES_DIR .'custom_fields.php' );
				break;

			case 'jm_tc_images':
				require( JM_TC_ADMIN_PAGES_DIR .'images.php' );	
				break;
				
			case 'jm_tc_meta_box':
				require( JM_TC_ADMIN_PAGES_DIR .'meta_box.php' );	
				break;

			case 'jm_tc_multi_author':
				require( JM_TC_ADMIN_PAGES_DIR .'multi_author.php' );
				break;

			case 'jm_tc_home':
				require( JM_TC_ADMIN_PAGES_DIR .'home.php' );	
				break;

			case 'jm_tc_robots':
				require( JM_TC_ADMIN_PAGES_DIR .'robots.php' );
				break;

			case 'jm_tc_deep_linking':
				require( JM_TC_ADMIN_PAGES_DIR .'deep_linking.php' );
				break;

			case 'jm_tc_analytics':
				require( JM_TC_ADMIN_PAGES_DIR .'analytics.php' );
				break;

			case 'jm_tc_doc':
				require( JM_TC_ADMIN_PAGES_DIR .'documentation.php' );
				break;

			case 'jm_tc_about':
				require( JM_TC_ADMIN_PAGES_DIR .'about.php' );
				break;
				
			case 'jm_tc_tutorial':
				require( JM_TC_ADMIN_PAGES_DIR .'tutorial.php' );
				break;

		}
	}
}		


//Call modules 
require( JM_TC_INC_DIR . 'utilities.php' ); 
require( JM_TC_ADMIN_DIR . 'author.php' );
require( JM_TC_INC_DIR . 'thumbs.php' );
require( JM_TC_INC_DIR . 'disable.php' );
require( JM_TC_INC_DIR . 'markup.php' ); 

if( is_admin() ) {
	require( JM_TC_ADMIN_DIR. 'tabs.php' );
	require( JM_TC_ADMIN_DIR. 'admin-tc.php' );
	require( JM_TC_ADMIN_DIR . 'meta-box.php' );	

}


// Add a "Settings" link in the plugins list
function jm_tc_settings_action_links($links, $file)
{
	$settings_link = '<a href="' . admin_url('admin.php?page=jm_tc') . '">' . __("Settings") . '</a>';
	array_unshift($links, $settings_link);
	
	return $links;
}


// Init meta box
function jm_tc_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
	require_once JM_TC_METABOX_DIR . 'init.php';

}

// Robots.txt with magic filter
function jm_tc_robots_mod( $output, $public ) {

	$opts = get_option('jm_tc');
	
	if( $opts['twitterCardRobotsTxt'] == 'yes' ) {
		$output .= "User-agent: Twitterbot" ."\n";
		$output .= "Disallow: ";
	}
	
	return $output;
}


/******************

INIT

******************/
add_action('plugins_loaded', 'jm_tc_init');
function jm_tc_init()
{
	//lang
	load_plugin_textdomain('jm-tc', false, JM_TC_LANG_DIR);
	
	//settings link
	add_filter('plugin_action_links_' . plugin_basename(__FILE__) , 'jm_tc_settings_action_links', 10, 2);
	
	//meta box
	add_action( 'init', 'jm_tc_initialize_cmb_meta_boxes');
	
	//robots.txt
	add_filter( 'robots_txt', 'jm_tc_robots_mod', 10, 2 );
	
	
	//check if Twitter cards is activated in Yoast and deactivate it
	new JM_TC_Disable;
	
	//admin classes
	if( is_admin() ) {
	
		 new JM_TC_Utilities;
		 new JM_TC_Tabs;
		 new JM_TC_Admin; 
		 new JM_TC_Metabox;
		 new JM_TC_Author;

	}
	
	/* Thumbnails */
	$opts = get_option('jm_tc');
	$crop = ( $opts['twitterCardCrop'] == 'yes' ) ? true : false;

	if (function_exists('add_theme_support')) add_theme_support('post-thumbnails');
	
	add_image_size('jmtc-small-thumb', 280, 150, $crop);/* the minimum size possible for Twitter Cards */
	add_image_size('jmtc-max-web-thumb', 435, 375, $crop);/* maximum web size for photo cards */
	add_image_size('jmtc-max-mobile-non-retina-thumb', 280, 375, $crop);/* maximum non retina mobile size for photo cards  */
	add_image_size('jmtc-max-mobile-retina-thumb', 560, 750, $crop);/* maximum retina mobile size for photo cards  */
	
}


//Plugin install : update options
register_activation_hook(__FILE__, 'jm_tc_on_activation');
function jm_tc_on_activation()
{
	$opts = get_option('jm_tc');	
	if (!is_array($opts)) update_option('jm_tc', jm_tc_get_default_options());
}


// Return default options
function jm_tc_get_default_options()
{
	return array(
		'twitterCardType' => 'summary',
		'twitterCreator' => 'TweetPressFr',
		'twitterSite' => 'TweetPressFr',
		'twitterImage' => 'https://g.twimg.com/Twitter_logo_blue.png',
		'twitterImageWidth' => '280',
		'twitterImageHeight' => '150',
		'twitterCardMetabox' => 'yes',
		'twitterProfile' => 'yes',
		'twitterPostPageTitle' => get_bloginfo('name') , // filter used by plugin to customize title
		'twitterPostPageDesc' => __('Welcome to', 'jm-tc') . ' ' . get_bloginfo('name') . ' - ' . __('see blog posts', 'jm-tc') ,
		'twitterCardImgSize' => 'small',
		'twitterCardTitle' => '',
		'twitterCardDesc' => '',
		'twitterCardCrop' => 'yes',
		'twitterUsernameKey' => 'jm_tc_twitter',
		'twitteriPhoneName' => '',
		'twitteriPadName' => '',
		'twitterGooglePlayName' => '',
		'twitteriPhoneUrl' => '',
		'twitteriPadUrl' => '',
		'twitterGooglePlayUrl' => '',
		'twitteriPhoneId' => '',
		'twitteriPadId' => '',
		'twitterGooglePlayId' => '',
		'twitterCardRobotsTxt' => 'no',
		'twitterAppCountry' => '',
	);
}

	
/******************

AFTER WP HAS LOADED

******************/
add_action('wp', 'jm_tc_after_wp_loaded');
function jm_tc_after_wp_loaded()
{		
	new JM_TC_Thumbs;
	new JM_TC_Markup;
	
}

// Plugin uninstall: delete option
register_uninstall_hook(__FILE__, 'jm_tc_uninstall');
function jm_tc_uninstall()
{
	delete_option('jm_tc');
}
