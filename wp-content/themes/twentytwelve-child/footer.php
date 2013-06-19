<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'twentytwelve_credits' ); ?>
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-5653857-3']);
  _gaq.push(['_trackPageview']);

  setTimeout("_gaq.push(['_trackEvent', '15_seconds', 'read'])", 15000);

    (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                  })();

   (function() {
       function async_load(){
           var protocol = ('https:' == document.location.protocol ? 'https://' : 'http://');
           var s = document.createElement('script');
           s.src = protocol + 'blockmetrics.com/static/adblock_detection/js/d.min.js';
           var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
       }
       bm_website_code = 'B12F5E3C6F0911E2';
       jQuery(document).ready(async_load);
   })();
</script>

<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
  FB.init({
          xfbml  : true  // parse XFBML
                });
</script>

<script src="http://www.newswhip.com/WidgetJavaScriptAction?style=newswhip&widgetRequested=Ireland&count=5" type="text/javascript"></script>
</body>
</html>
