<?php
/**
 * Template Name: Contributors Template
 *
 * Description: A page template to show a list of contributors
 *
 * @package WordPress
 * @subpackage Broadsheet_Twenty_Twelve
 * @since BS 3.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<div id="authorlist"><ul><?php contributors(); ?></ul></div>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>