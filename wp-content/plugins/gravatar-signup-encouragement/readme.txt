=== Gravatar Signup Encouragement ===
Contributors: dimadin
Donate link: http://blog.milandinic.com/donate/
Tags: Gravatar, gravatar, gravatars, avatar, avatars, comment, comments, bbPress
Requires at least: 2.8
Tested up to: 3.4.1
Stable tag: 3.1

Shows a message with link to Gravatar's signup page to commenters and/or users without gravatar.

== Description ==

[Plugin homepage](http://blog.milandinic.com/wordpress/plugins/gravatar-signup-encouragement/) | [Plugin author](http://blog.milandinic.com/) | [Donate](http://blog.milandinic.com/donate/)

This plugin shows a message with link to signup page of Gravatar (pre-filled with e-mail address) to commenters and/or users who don't have gravatar. 

Message can be shown to:

*   unregistered commenters when they leave text input field for e-mail address
*   registered commenters to whom their registered e-mail address is checked
*	unregistered commenters after they post a comment in a dialog, to whom their entered e-mail address is checked
*	registered commenters after they post a comment in a dialog, to whom their registered e-mail address is checked
*	registered users in administration notices, to whom their registered e-mail address is checked
*	registered users in admin bar, to whom their registered e-mail address is checked
*   registered users on their profile page, to whom their registered e-mail address is checked
*   users who fill registration form when they leave text input field for e-mail address

Options are fully customizable. See FAQ for more information.

This plugin is lightweight, it adds only one field in database which is deleted if you uninstall plugin using WordPress' built-in feature for deletion of plugins. Also it will only load jQuery file to head of your page if it wasn't already loaded by theme or other plugin(s). Checks for gravatar are done via simple AJAX.
If you want to speed up your web site and save on bandwidth and server resources, it is recommended that you also install plugin [Use Google Libraries](http://jasonpenney.net/wordpress-plugins/use-google-libraries/) which will load jQuery file from [Google AJAX Libraries](http://code.google.com/apis/ajaxlibs/).

In order to plugin works, it needs to be on server with PHP 5 and on WordPress 2.8 or above.

http://www.youtube.com/watch?v=eIvm4rBkxPk&cc_load_policy=1

== Installation ==

1. Upload `gravatar-signup-encouragement` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. You can change default options on 'Discussion Settings' page

== Frequently Asked Questions ==

= Do I need to show message in all cases (comments, profile, registration)? =

No, you can select where you want to show message, you can select all cases or just one.

= Can I choose where on page to show message? =

Yes, you can choose below which elements on page to show message. There are several elements already available to choose for all cases and you can alternatively add custom element by providing it's id. Since this plugin uses [jQuery selectors](http://docs.jquery.com/Selectors) to find element, you can add even more advanced filters for selecting. Note that all selectors start with # . Also be aware that display of message may not look good with your theme.

= Can I customize style of message? =

Yes, you can add styles for message. Whole message is wrapped with div with ID depending on case:

*   `gse_comments_message` for comment form
*   `gseaftercommenting` for modal
*   `gse_admin_notice` for administration notice
*   `gse_profile_message` for profile page
*   `gse_registration_message` for registration page
*   `gse_ms_signup_message` for signup page on multisite
*   `gse_bbpress_message` for bbPress

= Can I customize text of message? =

Yes, you can write any message you want, even use HTML tags you want. Note that you should leave link with URL placeholder if you want to show link to Gravatar's signup page pre-filled with user's e-mail address.

= Can I have different message for all cases? =

Yes, if you use filters.

= Can I translate plugin to language other than English? =

Yes, this plugin is fully internationalized, you can translate all text and link to locale version of Gravatar's site. You can find .pot file in root folder and you should place your translation in`translations` folder. Please make a [contact](http://blog.milandinic.com/contact/) for sending your translation so that it can be included in official realease.

Currently, plugin includes following translations:

* [Serbian](http://www.milandinic.com/2009/11/07/podstaknite-korisiscenje-gravatara/), by author himself
* [Danish](http://wordpress.blogos.dk/s%C3%B8g-efter-downloads/?did=224), thanks to GeorgWP

= Will this plugin enable use og Gravatar's API for managing avatars directly from WordPress installation? =

No, this plugin will never add that feature since author of this plugin is against managing of account on Gravatar from remote site.

== Screenshots ==

1. Settings form with all expanded options
2. Message shown to unregistered commenter on default theme with default settings
3. Message shown to registered commenter on default theme with default settings
4. Message shown in a dialog to unregistered commenter on default theme with default settings after posted comment
5. Message shown in a dialog to registered commenter on default theme with default settings after posted comment
6. Message shown in admin bar
7. Message shown in administration notices
8. Message shown on a profile page with option to show below “Profile” header
9. Message shown on a registration page with default settings
10. Message shown on a registration page (multisite) with default theme and default settings
11. Message shown in a bbPress reply form of a Twenty Eleven theme in line with avatar

== Changelog ==

= 3.1 =
* Released on 11th July 2012
* Used new API for help for post-3.3 versions.
* Made it possible to check for gravatar existence even when allow_url_fopen isn't allowed. Thanks wp.org user jlencion for report and initial patch.
* Rating is now passed to checker if it's different than G. Thanks wp.org user Parakoos for report.

= 3.0 =
* Released on 9th October 2011
* Introduced gravatar_signup_encouragement_get_option() function as a replacement for global variable with options
* Moved all code inside add_action() function so we don't have anything before init hook
* Added hidden field inside settings form that contains options version
* Removed notice about upgrade from admin_notices
* Moved encouragement to install Use Google Libraries plugin to the bottom of a setting form
* Added support for showing encouragement in admin bar
* Added support for showing encouragement in bbPress reply form
* Added donate links to a plugin and readme.txt
* Added links to author's site in readme.txt description
* Moved default options setup to separate function gravatar_signup_encouragement_add_default_options()
* Replaced several load_plugin_textdomain() calls with own function gravatar_signup_encouragement_textdomain() that already calls load_plugin_textdomain()
* Complete code beautification
* Added basic documentation to all functions
* Updated screenshots with one from Twenty Eleven theme
* Added urlencoding of email addresses so that “@” is still in address after redirection on gravatar.com
* Moved settings form to other file which is loaded conditionaly. Size of main file is reduced by half which means better performance.
* Added license to plugin meta

= 2.0.1 =
* Released on 22nd October 2010
* Fixed issue when blank page was shown after comment is submitted

= 2.0 =
* Released on 8th October 2010
* [Announcement](http://blog.milandinic.com/2010/10/08/gravatar-signup-encouragement-2-0/)
* Updated "Tested up to" to version 3.0.1
* Show message to commenter who already left comment(s) before
* Added a security check for localized URL to gravatar.com
* Added new default message
* Moved localized URL forming to its own function
* Improved function for returning message with better handling of line breaks, different cases of usage of email address
* Added support for dialog after commenting
* Added support for message in admin notices
* Made function for checking existence of gravatar
* Added links in contextual help to documentation and support forum
* Added admin_url for settings link on plugins page
* Replaced previous URL tp gravatar-check.php with one that uses plugins_url
* Removed global $gse_plugin_dir and use dirname( plugin_basename( __FILE__ ) ) inside load_plugin_textdomain functions
* Added version in database for easier future upgrades
* Replaced ID selectors with any type of selectors and migrate old selectors to new format
* Replaced hard-coded curly quotes with HTML entities
* Added filter gse_get_email_value_com_unreg for source of email address on comment forms in themes that don't follow standard naming
* Removeed global $gse_grav_check_url and use function gravatar_signup_encouragement_check_url instead
* Added support for message on wp-signup.php page (multisite)
* Added filters for message in every case
* Added filter for timeout on registration
* Show message to those who upgraded from older version with information about updates
* Added two new elements on profile page: header "Profile" and last input
* Show message if plugin Use Google Libraries isn't installed
* Moved default message to its own function
* Added new screenshot
* Added text 'example of how this looks' which opens thickbox with screenshot of current case in usage
* Replaced get_header action with template_redirect
* Added filters so that plugin can work with comment forms on Carrington Blog and Mystique themes
* Added notices in options when site is using Carrington Blog or Mystique themes with link that opens thickbox with list of default values
* Moved upgrade out of activation hook to new function used on admin_init

= 1.0 =
* Moved URL localization and message preparation to function so that URL localization could work and to improve performance, as per [suggestion](http://groups.google.com/group/wp-hackers/browse_thread/thread/4fdc895360c3b087#) from Otto
* Added load_plugin_textdomain function in register_activation_hook so that default message can be localized on activation, as per confirmation from Otto
* Fixed issue with showing of message on registration page when user change e-mail address to one that does have a gravatar
* Added Danish translation; thanks to [GeorgWP](http://wordpress.org/support/topic/326328)
* Moved .pot file to root folder
* Several small cleanups and moves of code

= 0.94.8 =
* Fixed issue with showing of message to unregistered commenters who changed e-mail address to one that does have a gravatar

= 0.94.2 =
* Updated plugin's meta-data

= 0.94.1 =
* Fixed some grammar and spelling errors and changing several text strings.

= 0.94 =
* First alpha version in SVN.
