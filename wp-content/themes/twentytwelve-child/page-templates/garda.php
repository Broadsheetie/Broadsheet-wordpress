<?php
/**
 * Template Name: Garda 
 *
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>
			<!-- BEGIN Timeline Embed -->
<div id="timeline-embed"></div><script type="text/javascript">
//<![CDATA[
    var timeline_config = {

     width: "100%",
     height: "640",
     source: 'https://docs.google.com/spreadsheet/pub?key=0AubfDbShmJ4AdEpqRElUbWFSTGt6dll1TFhuLUNPRFE&output=html',
         start_zoom_adjust:  '1'
    }
    //]]>
</script>
<script src="/gardatimeline/compiled/js/storyjs-embed.js" type="text/javascript"></script><!-- END Timeline Embed-->



		<div class="entry-content">
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	</article><!-- #post -->
    
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>
    
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>