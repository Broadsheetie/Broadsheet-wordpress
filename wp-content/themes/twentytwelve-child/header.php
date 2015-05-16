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
<meta name="apple-itunes-app" content="app-id=413093424  " />
<meta name="google-play-app" content="app-id=ie.broadsheet.app">
<link rel="apple-touch-icon" href="/images/icon.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/images/icon@2x.png" />
<link rel="stylesheet" href="/css/jquery.smartbanner.css" type="text/css" media="screen">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<link rel='stylesheet' id='sharedaddy-css'  href='http://broadsheet.ie/wp-content/plugins/jetpack/modules/sharedaddy/sharing.css?ver=2.3' type='text/css' media='all' />
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
    
    headerDiv  = document.getElementById("masthead");
    pageWidth  = headerDiv.offsetWidth;

    if (pageWidth >= 728) {
        googletag.defineSlot('/20132202/Broadsheet_Filmstrip', [300, 600], 'div-gpt-ad-1373919543635-0').addService(googletag.pubads());
        googletag.defineSlot('/20132202/BroadsheetTakeover', [1, 1], 'div-gpt-ad-1349021718141-3').addService(googletag.pubads());
        googletag.defineSlot('/20132202/BS-1-HP-Flex-Billboard', [[728, 90], [970, 250], [970, 90]], 'div-gpt-ad-1431772366166-2').addService(googletag.pubads());
    } else {
		googletag.defineSlot('/20132202/Broadsheet_Mini_Leaderboard', [320, 50], 'div-gpt-ad-1397509779716-0').addService(googletag.pubads());
    }
	googletag.defineSlot('/20132202/BroadsheetMPU', [300, 250], 'div-gpt-ad-1348854553033-1').addService(googletag.pubads());
	googletag.defineSlot('/20132202/BroadsheetMPU2', [300, 250], 'div-gpt-ad-1392892360823-0').addService(googletag.pubads());
	googletag.pubads().enableSingleRequest();
	googletag.pubads().collapseEmptyDivs();
	googletag.enableServices();
});
</script>
<script language="javascript" type="text/javascript" async="async" src="http://widgets.kiosked.com/sniffer/get-script/sign/35d9b8879227fbd7ec7339c78664c02c/albumid/10541/co/10913.js"></script>
</head>

<body <?php body_class(); ?> id="body_id">
<center>
<!-- Broadsheet_Mini_Leaderboard -->
<div id='div-gpt-ad-1397509779716-0' style='width:320px; height:50px; display:none'>
<script type='text/javascript'>
googletag.cmd.push(function() { googletag.display('div-gpt-ad-1397509779716-0'); });
</script>
</div>
</center>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
        <center>
			<!-- /20132202/BS-1-HP-Flex-Billboard -->
			<div id='div-gpt-ad-1431772366166-2'>
			<script type='text/javascript'>
			googletag.cmd.push(function() { googletag.display('div-gpt-ad-1431772366166-2'); });
			</script>
			</div>
        </center>
        <center>
            <a href="/"><img class="hide-small" src="/logo/header_logo.png?v=<?php echo time(); ?>" alt="Broadsheet.ie" width="624" height="127" /><img class="show-large" src="/images/Chompsky_163x127.png" alt="Broadsheet.ie" width="163" height="127" /></a>
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