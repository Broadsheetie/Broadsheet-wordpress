<?php
/*
Plugin Name: Most Comments
Plugin URI: http://www.brandinfection.com
Description: Most Comments as a function and in a Widget
Version: 1.1
Author: Nader Cserny
Author URI: http://www.brandinfection.com/
*/


### Use WordPress 2.6 Constants
if (!defined('WP_CONTENT_DIR')) {
	define( 'WP_CONTENT_DIR', ABSPATH.'wp-content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', get_option('siteurl').'/wp-content');
}
if (!defined('WP_PLUGIN_DIR')) {
	define('WP_PLUGIN_DIR', WP_CONTENT_DIR.'/plugins');
}
if (!defined('WP_PLUGIN_URL')) {
	define('WP_PLUGIN_URL', WP_CONTENT_URL.'/plugins');
}


### Function: Most Comments Option Menu
add_action('admin_menu', 'most_comments_menu');
function most_comments_menu() {
	if (function_exists('add_options_page')) {
		add_options_page(__('Most Comments', 'most_comments'), __('Most Comments', 'most_comments'), 'manage_options', 'most-comments/most-comments-options.php') ;
	}
}


function most_comments($limit = 5, $show_pass_post = 0, $duration = 0, $exclude_nocomments = 1, $display = true, $category = 0) {
    global $wpdb;
	$most_comments_options = get_option('most_comments_options');
	$temp = '';
	
	$category = $most_comments_options['from_category'];
	
	$most_comments = wp_cache_get('most_comments');
	if ($most_comments === false) {
		
		if ($category == 0) {
			$request = "SELECT ID, post_title, comment_count FROM $wpdb->posts";
			$request .= " WHERE post_status = 'publish'";
			if ($show_pass_post != 0) $request .= " AND post_password =''";
	
			if ($duration != "" || $duration > 0) $request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < post_date ";
		
		} else {
			$request = "SELECT * FROM $wpdb->posts
			LEFT JOIN $wpdb->term_relationships ON
			($wpdb->posts.ID = $wpdb->term_relationships.object_id)
			LEFT JOIN $wpdb->term_taxonomy ON
			($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)
			WHERE $wpdb->posts.post_status = 'publish'
			AND $wpdb->term_taxonomy.taxonomy = 'category'
			AND $wpdb->term_taxonomy.term_id = $category";
			
			if ($show_pass_post != 0) $request .= " AND $wpdb->posts.post_password =''";
	
			if ($duration != "" || $duration > 0) $request .= " AND DATE_SUB(CURDATE(),INTERVAL ".$duration." DAY) < $wpdb->posts.post_date ";
		}
		
		$request .= " ORDER BY comment_count DESC";
		
		if ($limit != 0) {
			$request .= " LIMIT $limit";
		}
		
		$posts = $wpdb->get_results($request);

		if ($posts) {

			foreach ($posts as $post) {
				$post_title = stripslashes($post->post_title);
				$comment_count = $post->comment_count;
				$permalink = get_permalink($post->ID);
				
				if ($most_comments_options['exclude_nocomments'] == 0) {
					$temp = stripslashes($most_comments_options['most_comments_template']);
					$temp = str_replace("%COMMENT_COUNT%", $comment_count, $temp);
					$temp = str_replace("%POST_TITLE%", $post_title, $temp);
					$temp = str_replace("%POST_URL%", $permalink, $temp);
				} else {
					if ($comment_count != 0) {
						$temp = stripslashes($most_comments_options['most_comments_template']);
						$temp = str_replace("%COMMENT_COUNT%", $comment_count, $temp);
						$temp = str_replace("%POST_TITLE%", $post_title, $temp);
						$temp = str_replace("%POST_URL%", $permalink, $temp);
					} else {
						$temp = '';
					}
				}
				
				$most_comments .= $temp;
				
			}
		} else {
			$most_comments .= '<li>None found</li>';
		}
	
		wp_cache_set('most_comments', $most_comments);
	} 

    if($display) {
		echo $most_comments;
	} else {
		return $most_comments;
	}
}


### Function: Post Views Options
add_action('activate_most-comments/most-comments.php', 'most_comments_init');
function most_comments_init() {
	// Add Options
	$most_comments_options = array();
	$most_comments_options['limit'] = 5;
	$most_comments_options['duration'] = 30;
	$most_comments_options['show_pass_post'] = 0;
	$most_comments_options['exclude_nocomments'] = 1;
	$most_comments_options['from_category'] = 0;
	$most_comments_options['most_comments_template'] = '<li><a href="%POST_URL%"  title="%POST_TITLE%">%POST_TITLE%</a> - %COMMENT_COUNT% '.__('comments', 'most-comments').'</li>';
	add_option('most_comments_options', $most_comments_options, 'Most Comments Options');
}
