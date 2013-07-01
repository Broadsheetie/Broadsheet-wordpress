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
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
        <center class="hide-small">
<script type="text/javascript"><!--
var width = window.innerWidth || document.documentElement.clientWidth;
if (width >= 800) {
google_ad_client = "ca-pub-1189639444988756";
/* TaxCalc Leaderboard */
google_ad_slot = "1652234392";
google_ad_width = 728;
google_ad_height = 90;
}
//-->
</script>
<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
        </center>
        <center class="hide-small">
            <a href="/"><img src="/logo/header_logo.png" alt="Broadsheet.ie" width="624" height="127" /></a>
            <img class="hide-medium" src="/images/Chompsky_163x127.png" alt="Broadsheet.ie" width="163" height="127" />
        </center>
        <center class="show-small hide-large">
            <a href="/"><img src="/images/Chompsky_163x127.png" alt="Broadsheet.ie" width="163" height="127" /></a>
        </center>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">
