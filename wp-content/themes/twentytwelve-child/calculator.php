<?php
include realpath(dirname(__FILE__)) . '/../../../boot.php';

if ( count( $_GET ) ) {
	$calcYear1 = Tax\Tax::factory( $year1 );

	if ( $calcYear1->setDetails( $_GET ) ) {
		if ( $_GET['tax_benefit'] ) $calcYear1->taxBenefit();
		$calcYear1->calculate();
		$breakdownYear1 = $calcYear1->getBreakdown();
	} else {
		$errors = $calcYear1->getErrors();
	}

	$calcYear2 = Tax\Tax::factory( $year2 );

	if ( $calcYear2->setDetails( $_GET ) ) {
		$calcYear2->calculate();
		$breakdownYear2 = $calcYear2->getBreakdown();
	}

	if ( count( $errors ) ) {
		if ( isset( $errors['salary'] ) ) {
			$basicError = true;
		}
		if ( isset( $errors['pension'] ) || isset( $errors['avc'] ) ) {
			$pensionError = true;
		}
		if ( ( isset( $errors['original-market-value'] ) ) || ( isset( $errors['running-cost'] ) ) || ( isset( $errors['heath-insurance-contribution'] ) ) ) {
			$bikError = true;
		}
		if ( isset( $errors['tuition'] ) ) {
			$reliefError = true;
		}
	}
}

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php if ( ! is_page_template( 'page-templates/front-page.php' ) ) : ?>
					<?php the_post_thumbnail(); ?>
					<?php endif; ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header>

				<div class="entry-content">
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->
				
				<div class="entry-content">
				<?php if ($breakdownYear2) :?>
					<?php include("result-table.php"); ?>
				<?php endif; ?>
				<?php include("tax-form.php"); ?>
				</div><!-- .entry-content -->
				
				<div class="entry-content">
<?php
if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
}
 
if ( class_exists( 'Jetpack_Likes' ) ) {
    $custom_likes = new Jetpack_Likes;
    echo $custom_likes->post_likes( '' );
}
?>
				</div><!-- .entry-content -->
					<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
				</div><!-- .entry-content -->
			</article><!-- #post -->

		</div><!-- #content -->
	</div><!-- #primary -->

<script type="text/javascript" src="/js/taxcalc.js">
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
