<?php
  /*
  Plugin Name: WP images lazy loading
  Plugin URI: http://www.petrichorpost.com
  Description: a WordPress optimiztion plugin to enable jQuery image lazy loading.
  Version: 1.2.3
  Author: Petrichorpost
  Author URI: http://www.petrichorpost.com
  */

class jQueryLazyLoad {
	var $do_footer = false;

	function __construct() {
		add_action('wp_head', array($this, 'action_header'));
		add_action('wp_enqueue_scripts', array($this, 'action_enqueue_scripts'));
		add_filter('the_content', array($this, 'filter_the_content'));
		add_filter('wp_get_attachment_link', array($this, 'filter_the_content'));
		add_action('wp_footer', array($this, 'action_footer'));
	}

	function action_header() {
		echo <<<EOF
<style type='text/css'>
img.lazy { display: none; }
</style>

EOF;
	}

	function action_enqueue_scripts() {
		wp_enqueue_script(
			'jquery_lazy_load',
			plugins_url('/js/jquery.lazyload.min.js', __FILE__),
			array('jquery'),
			'1.9.1' // version of the lazyload script from https://github.com/tuupola/jquery_lazyload
		);
	}

	function filter_the_content($content) {
		if (is_feed()) return $content;
		return preg_replace_callback('/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', array($this, 'preg_replace_callback'), $content);
	}

	function preg_replace_callback($matches) {
		// set flag indicating there are images to be replaced
		$this->do_footer = true;

		// alter original img tag:
		//   - add empty class attribute if no existing class attribute
		//   - set src to placeholder image
		//   - add back original src attribute, but rename it to "data-original"
		if (!preg_match('/class\s*=\s*"/i', $matches[0])) {
			$class_attr = 'class="" ';
		}
		$replacement = $matches[1] . $class_attr . 'src="' . plugins_url('/images/grey.gif', __FILE__) . '" data-original' . substr($matches[2], 3) . $matches[3];

		// add "lazy" class to existing class attribute
		$replacement = preg_replace('/class\s*=\s*"/i', 'class="lazy ', $replacement);

		// add noscript fallback with original img tag inside
		$replacement .= '<noscript>' . $matches[0] . '</noscript>';
		return $replacement;
	}

	function action_footer() {
		if (!$this->do_footer) {
			return;
		}

		echo <<<EOF
<script type="text/javascript">
(function($){
  $("img.lazy").show().lazyload({effect: "fadeIn", threshold : 0});
})(jQuery);
</script>

EOF;
	}
}

if (!isset($_COOKIE["no_lazy_load"]))
{
	$jQueryLazyLoad = new jQueryLazyLoad();
}
?>