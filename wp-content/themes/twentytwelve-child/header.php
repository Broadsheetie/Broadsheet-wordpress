<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<link rel='stylesheet' id='sharedaddy-css'  href='http://broadsheet.karlmonaghan.com/wp-content/plugins/jetpack/modules/sharedaddy/sharing.css?ver=2.3' type='text/css' media='all' />
<script type='text/javascript'>
  function recordOutboundLink(link, category, action) {
    _gat._getTrackerByName()._trackEvent(category, action);
    setTimeout('window.open("' + link + '")', 100);
  }

var googletag = googletag || {};
googletag.cmd = googletag.cmd || [];
(function() {
var gads = document.createElement('script');
gads.async = true;
gads.type = 'text/javascript';
var useSSL = 'https:' == document.location.protocol;
gads.src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
var node = document.getElementsByTagName('script')[0];
node.parentNode.insertBefore(gads, node);
})();

googletag.cmd.push(function() {
googletag.defineSlot('/20132202/BroadsheetLeaderboard', [728, 90], 'div-gpt-ad-1348854553033-0').addService(googletag.pubads());
googletag.defineSlot('/20132202/Broadsheet_Mobile_Leaderboard', [320, 50], 'div-gpt-ad-1373919137130-0').addService(googletag.pubads());
googletag.defineSlot('/20132202/BroadsheetMPU', [300, 250], 'div-gpt-ad-1348854553033-1').addService(googletag.pubads());
googletag.defineSlot('/20132202/BroadsheetMPU2', [300, 250], 'div-gpt-ad-1348854553033-2').addService(googletag.pubads());
googletag.defineSlot('/20132202/BroadsheetTakeover', [1, 1], 'div-gpt-ad-1349021718141-3').addService(googletag.pubads());
<?php if  ( is_home() || is_front_page() ) : ?>
googletag.defineSlot('/20132202/BroadsheetBillboard', [950, 260], 'div-gpt-ad-1371379584892-0').addService(googletag.pubads());
<?php endif; ?>
googletag.defineSlot('/20132202/Broadsheet_Filmstrip', [300, 600], 'div-gpt-ad-1373919543635-0').addService(googletag.pubads());
googletag.pubads().enableSingleRequest();
googletag.pubads().collapseEmptyDivs();
googletag.enableServices();
});
</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
        <center>
			<!-- BroadsheetLeaderboard -->
			<div id='div-gpt-ad-1348854553033-0' style='width:728px; height:90px;display:none'>
			<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1348854553033-0'); });
			</script>
			</div>
			<!-- BroadsheetBillboard -->
			<div id='div-gpt-ad-1371379584892-0' style='width:950px; height:260px;display:none'>
			<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1371379584892-0'); });
			</script>
			</div>
			<!-- Broadsheet_Mobile_Leaderboard -->
			<div id='div-gpt-ad-1373919137130-0' style='width:320px; height:50px;display:none'>
			<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1373919137130-0'); });
			</script>
			</div>
        </center>
        <center>
            <a href="/"><img class="hide-small" src="/logo/header_logo.png" alt="Broadsheet.ie" width="624" height="127" /><img class="show-large" src="/images/Chompsky_163x127.png" alt="Broadsheet.ie" width="163" height="127" /></a>
        </center>
        <div class="header-bar">
        	<div class="strapline alignleft">
        		Everything. As It Happens.
        	</div>
            <div class="alignright">
                <a href="/contact/"><img src="/images/mail-29x29.png" width="29" height="29" alt="Contact Broadsheet" /></a><a href="http://twitter.com/broadsheet_ie"><img src="/images/twitter-29x29.png" width="29" height="29" alt="Broadsheet on Twitter" /></a><a href="http://www.facebook.com/broadsheet.ie"><img src="/images/facebook-29x29.png" width="29" height="29" alt="Broadsheet on Facebook" /></a>
            </div>
        </div>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">
