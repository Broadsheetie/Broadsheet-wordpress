<?php 
/*
YARPP Template: Broadsheet
Author: Karl Monaghan
Description: A simple YARPP template for BS.
*/

$options = array( 'thumbnails_heading', 'thumbnails_default', 'no_results' );
extract( $this->parse_args( $args, $options ) );

// a little easter egg: if the default image URL is left blank,
// default to the theme's header image. (hopefully it has one)
if ( empty($thumbnails_default) )
	$thumbnails_default = get_header_image();

$dimensions = $this->thumbnail_dimensions();

if (have_posts()) {
	$output .= '<h3>' . $thumbnails_heading . '</h3>' . "\n";

	$output .= '<div class="yarpp-thumbnails-horizontal">' . "\n";
	while (have_posts()) {
		the_post();

		$output .= "<a class='yarpp-thumbnail' href='" . get_permalink() . "?utm_source=internal&utm_medium=web&utm_content=related_posts' title='" . the_title_attribute('echo=0') . "'>" . "\n";

		$post_thumbnail_html = '';
		if ( has_post_thumbnail() ) {
			if ( $this->diagnostic_generate_thumbnails() )
				$this->ensure_resized_post_thumbnail( get_the_ID(), $dimensions );
			$post_thumbnail_html = get_the_post_thumbnail( null, $dimensions['size'] );
		}
		
		if ( trim($post_thumbnail_html) != '' )
			$output .= $post_thumbnail_html;
		else
			$output .= '<span class="yarpp-thumbnail-default"><img src="' . esc_url($thumbnails_default) . '"/></span>';

		$output .= '<span class="yarpp-thumbnail-title">' . get_the_title() . '</span>';
		$output .= '</a>' . "\n";

	}
	$output .= "</div>\n";
} else {
	$output .= $no_results;
}

$this->enqueue_thumbnails( $dimensions );
