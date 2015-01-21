<?php

/*
 * Administration functionality for App Banners Plugin
 * Author: Matt Pramschufer of E-Moxie
 * URL: www.emoxie.com
 * Date: 10/2/2013
 */

define('APP_BANNERS_ID', 'app-banners-plugin-options');
define('APP_BANNERS_NICK', 'App Banners');

class App_Banners_Admin {

    public static function init() {
        add_action('admin_init', array(__CLASS__, 'register'));
        add_action('admin_menu', array(__CLASS__, 'menu'));
    }

    public static function register() {
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_apple_id');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_android_id');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_author');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_price');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_title');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_icon');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_button');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_daysHidden');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_daysReminder');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_speedOut');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_speedIn');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_iconGloss');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_inAppStore');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_inGooglePlay');
        register_setting(APP_BANNERS_ID . '_options', 'APP_BANNERS_appStoreLanguage');
    }

    public static function menu() {
        // Create menu tab
        add_options_page(APP_BANNERS_NICK . ' Plugin Options', APP_BANNERS_NICK, 'manage_options', APP_BANNERS_ID . '_options', array('App_Banners_Admin', 'options_page'));
    }

    public static function options_page() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        $plugin_id = APP_BANNERS_ID;
        // display options page
        $appleID = get_option('APP_BANNERS_apple_id');
        $androidID = get_option('APP_BANNERS_android_id');
        $author = get_option('APP_BANNERS_author');
        $price = get_option('APP_BANNERS_price');
        $title = get_option('APP_BANNERS_title');
        $icon = get_option('APP_BANNERS_icon');
        $button = get_option('APP_BANNERS_button');
        $daysHidden = get_option('APP_BANNERS_daysHidden');
        $daysReminder = get_option('APP_BANNERS_daysReminder');
        $speedOut = get_option('APP_BANNERS_speedOut');
        $speedIn = get_option('APP_BANNERS_speedIn');
        $iconGloss = get_option('APP_BANNERS_iconGloss');
        $inAppStore = get_option('APP_BANNERS_inAppStore');
        $inGooglePlay = get_option('APP_BANNERS_inGooglePlay');
        $appStoreLanguage = get_option('APP_BANNERS_appStoreLanguage');

        require_once dirname(__FILE__) . '/tpl/admin-options.php';
    }

}
