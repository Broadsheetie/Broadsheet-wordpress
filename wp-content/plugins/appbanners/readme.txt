=== AppBanners ===
Contributors: mattpramschufer 
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=mattpram%40gmail%2ecom
Tags: iOS App Banner, Android App Banner, Market App, MS App Banner
Requires at least: 3.5
Tested up to: 4.2.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Ability to promote iOS, Android and MS Applications with an App Banner similar to iOS6 App Banner.

== Description ==

Marketing an iOS App, Android App or MS App within your Wordpress site never got easier.  This plugin will allow you to put in your App IDs and automatically generate the proper meta tags to utilize Apple's App Banner as specified  <a href="http://developer.apple.com/library/ios/#documentation/AppleApplications/Reference/SafariWebContent/PromotingAppswithAppBanners/PromotingAppswithAppBanners.html">here</a>.

For older versions of iOS (prior to version 6.0) a jQuery alternative will pop up in similar fashion to the Apple one.  Android devices are supported with links to the Google Play Store.  Windows devices are supported with links to the MS App Store.

This plugin utilizes the SmartBanner jQuery plugin https://github.com/jasny/jquery.smartbanner 

== Installation ==

1. Activate the plugin through the `Plugins` menu in WordPress
1. Go to 'Settings->App Banners' and enter in your:
* Apple App Store App ID (http://linkmaker.itunes.apple.com/us/), 
* Google Play App ID (http://developer.android.com/distribute/googleplay/promote/linking.html)
* For Microsoft Apps: msApplication-ID is found under Package name in your app manifest, and msApplication-PackageFamilyName is found under Package family name in your app manifest
* Author
* App Title
* Price

== Frequently Asked Questions ==

Please send any questions to matt@pramschufer.com

None Yet

== Screenshots ==

1. Settings Screen
2. Apple App Banner
3. Android App Banner

== Changelog ==

= 1.5.1 =
* Fixed issue with passing strings to Javascript instead of integers.  Thanks @michael78au for the heads up.

= 1.5 =
* Fixed issue with close button on Android
* Fixed issue with if user set the banner to always show, it would still set a cookie
* Updated code to only load tags for apps that have app ids filled in.

= 1.4 =
* Updated to latest version of jQuery Smartbanner plugin
* Added in support for Windows Devices
* Various code clean up

= 1.3 =
* Ensured compatibility with WP 4.0
* Added in string escaping for fields to account for quotes and single quotes

= 1.2.1 =
* Hotfix for Android App ID typo in version 1.2

= 1.2 =
* Updated to Wordpress 3.9
* Added in additional options to setting panel

= 1.1 =
* Added number of days to keep banner hidden after closing
* Added number of days to keep banner hidden after clicking view button
* Added ability to change text on button
* Added in Settings link on Plugin Screen

= 1.1 =
* Initial Release