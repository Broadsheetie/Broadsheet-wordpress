<?php
/*
Plugin Name: Most Comments Widget
Plugin URI: http://www.brandinfection.com
Description: Most Comments as a function and in a Widget 
Version: 1.1
Author: Nader Cserny
Author URI: http://www.brandinfection.com/
*/


function widget_most_comments_init() {
	if (!function_exists('register_sidebar_widget')) {
		return;
	}
	
	function widget_most_comments($args) {
		extract($args);
		$options = get_option('widget_most_comments');
		$title = htmlspecialchars(stripslashes($options['title']));
		if (function_exists('most_comments')) {
			echo $before_widget.$before_title.$title.$after_title;
			echo '<ul>'."\n";
			most_comments($options['limit'], $options['show_pass_post'], $options['duration']);
			echo '</ul>'."\n";
			echo $after_widget;
		}
	}
	
	function widget_most_comments_options() {
		$options = get_option('widget_most_comments');
		if (!is_array($options)) {
			$options = array('title' => __('Most Comments', 'most-comments'), 'limit' => 5, 'duration' => 30);
		}
		if ($_POST['most_comments-submit']) {
			$options['title'] = strip_tags($_POST['most_comments-title']);
			$options['limit'] = intval($_POST['most_comments-limit']);
			$options['duration'] = intval($_POST['most_comments-duration']);
			update_option('widget_most_comments', $options);
		}
		
		echo '<p style="text-align: left;"><label for="most_comments-title">';
		_e('Title', 'most-comments');
		echo ': </label><br /><input type="text" id="most_comments-title" name="most_comments-title" value="'.htmlspecialchars(stripslashes($options['title'])).'" /></p>'."\n";
		echo '<p style="text-align: left;"><label for="most_comments-limit">';
		_e('Number of Posts (0: no filter)', 'most-comments');
		echo ': </label><br /><input type="text" id="most_comments-limit" name="most_comments-limit" value="'.htmlspecialchars(stripslashes($options['limit'])).'" /></p>'."\n";
		echo '<p style="text-align: left;"><label for="most_comments-duration">';
		_e('Time Range (last XX days, 0: no filter)', 'most-comments');
		echo ': </label><br /><input type="text" id="most_comments-duration" name="most_comments-duration" value="'.htmlspecialchars(stripslashes($options['duration'])).'" /></p>'."\n";
		echo '<input type="hidden" id="most_comments-submit" name="most_comments-submit" value="1" />'."\n";
	}
	
	// Register Widgets
	register_sidebar_widget(array('Most Comments', 'most-comments'), 'widget_most_comments');
	register_widget_control(array('Most Comments', 'most-comments'), 'widget_most_comments_options');
}

### Function: Load the Most Comments Widget
add_action('plugins_loaded', 'widget_most_comments_init');