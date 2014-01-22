<?php
/*
Plugin Name: Tagged Recent Comments
Description: Shows the most recent comments with campaign tracking in the link
Version: 1.0.0
Text Domain: tagged_recent_comments
Author: Karl Monaghan
Author URI: http://karlmonaghan.com.com
License: GPL3
*/

class Widget_Tagged_Recent_Comments extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_tagged_recent_comments', 'description' => __( 'Your site&#8217;s most recent comments with tracking tag.' ) );
		parent::__construct('tagged-recent-comments', __('Tagged Recent Comments'), $widget_ops);
		$this->alt_option_name = 'widget_tagged_recent_comments';

		if ( is_active_widget(false, false, $this->id_base) )
			add_action( 'wp_head', array($this, 'recent_comments_style') );

		add_action( 'comment_post', array($this, 'flush_widget_cache') );
		add_action( 'edit_comment', array($this, 'flush_widget_cache') );
		add_action( 'transition_comment_status', array($this, 'flush_widget_cache') );
	}

	function recent_comments_style() {
		if ( ! current_theme_supports( 'widgets' ) // Temp hack #14876
			|| ! apply_filters( 'show_recent_comments_widget_style', true, $this->id_base ) )
			return;
		?>
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<?php
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_comments', 'widget');
	}

	function widget( $args, $instance ) {
		global $comments, $comment;

		$cache = wp_cache_get('widget_recent_comments', 'widget');

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( ! isset( $args['widget_id'] ) )
			$args['widget_id'] = $this->id;

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

 		extract($args, EXTR_SKIP);
 		$output = '';

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Comments' );
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
 			$number = 5;

		$comments = get_comments( apply_filters( 'widget_comments_args', array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish' ) ) );
		$output .= $before_widget;
		if ( $title )
			$output .= $before_title . $title . $after_title;

		$output .= '<ul id="recentcomments">';
		if ( $comments ) {
			// Prime cache for associated posts. (Prime post term cache if we need it for permalinks.)
			$post_ids = array_unique( wp_list_pluck( $comments, 'comment_post_ID' ) );
			_prime_post_caches( $post_ids, strpos( get_option( 'permalink_structure' ), '%category%' ), false );

			foreach ( (array) $comments as $comment) {
				$output .=  '<li class="recentcomments">' . /* translators: comments widget: 1: comment author, 2: post link */ sprintf(_x('%1$s on %2$s', 'widgets'), get_comment_author_link(), '<a href="' . esc_url( $this->get_tagged_comment_link($comment->comment_ID) ) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
			}
 		}
		$output .= '</ul>';
		$output .= $after_widget;

		echo $output;
		$cache[$args['widget_id']] = $output;
		wp_cache_set('widget_recent_comments', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = absint( $new_instance['number'] );
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_comments']) )
			delete_option('widget_recent_comments');

		return $instance;
	}

	function form( $instance ) {
		$title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of comments to show:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
	
	function get_tagged_comment_link( $comment = null, $args = array() ) {
		global $wp_rewrite, $in_comment_loop;

		$comment = get_comment($comment);

		// Backwards compat
		if ( !is_array($args) ) {
			$page = $args;
			$args = array();
			$args['page'] = $page;
		}

		$defaults = array( 'type' => 'all', 'page' => '', 'per_page' => '', 'max_depth' => '' );
		$args = wp_parse_args( $args, $defaults );

		if ( '' === $args['per_page'] && get_option('page_comments') )
			$args['per_page'] = get_option('comments_per_page');

		if ( empty($args['per_page']) ) {
			$args['per_page'] = 0;
			$args['page'] = 0;
		}

		if ( $args['per_page'] ) {
			if ( '' == $args['page'] )
				$args['page'] = ( !empty($in_comment_loop) ) ? get_query_var('cpage') : get_page_of_comment( $comment->comment_ID, $args );

			if ( $wp_rewrite->using_permalinks() )
				$link = user_trailingslashit( trailingslashit( get_permalink( $comment->comment_post_ID ) ) . 'comment-page-' . $args['page'], 'comment' );
			else
				$link = add_query_arg( 'cpage', $args['page'], get_permalink( $comment->comment_post_ID ) );
		} else {
			$link = get_permalink( $comment->comment_post_ID );
		}

		$link = $link . '?utm_source=internal&utm_medium=web&utm_content=latest_comments#comment-' . $comment->comment_ID;
		/**
		 * Filter the returned single comment permalink.
		 *
		 * @since 2.8.0
		 *
		 * @param string $link    The comment permalink with '#comment-$id' appended.
		 * @param object $comment The current comment object.
		 * @param array  $args    An array of arguments to override the defaults. @see get_page_of_comment()
		 */
		return apply_filters( 'get_comment_link', $link, $comment, $args );
	}
}

add_action( 'widgets_init', 'register_tagged_recent_comments_widget' );
function register_tagged_recent_comments_widget() {
     register_widget ( Widget_Tagged_Recent_Comments );
}