<?php
/*
Plugin Name: Scroll To Top
Plugin URI: http://www.cirolini.com.br/wordpress-plugin-scroll-to-top/
Description: Creates a floating box centered in the footer of your site that only appears when you scroll the page down, and when clicked gently roll the site to the top.
Version: 2.1
Author: Rafael Cirolini
Author URI: http://www.cirolini.com.br/
License: GPL2
*/

/*  Copyright 2010  Scroll To Top - Rafael Cirolini  
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

add_action('admin_menu', 'stt_add_menu');
add_action('admin_init', 'stt_reg_function' );
add_action('wp_head', 'stt_add_head');

register_activation_hook( __FILE__, 'stt_activate' );

function stt_activate() {
	add_option('stt_enable','1');
	add_option('stt_text','Scroll to Top');
	add_option('stt_width','110px');
	add_option('stt_color','FFFFFF');
	add_option('stt_background_color','222222');
	
}

function stt_add_menu() {
    $page = add_options_page('Scroll to Top', 'Scroll to Top', 'administrator', 'stt_menu', 'stt_menu_function');
    add_action('admin_print_scripts-' . $page, 'stt_admin_styles');
}

function stt_reg_function() {
	register_setting( 'stt-settings-group', 'stt_enable' );
	register_setting( 'stt-settings-group', 'stt_text' );
	register_setting( 'stt-settings-group', 'stt_width' );
	register_setting( 'stt-settings-group', 'stt_color' );
	register_setting( 'stt-settings-group', 'stt_background_color' );
	wp_register_script('stt_colorpicker', WP_PLUGIN_URL . '/scroll-to-top/picker/colorpicker.js', array('jquery'));
}

function stt_admin_styles() {
	wp_enqueue_script ('jquery');
	wp_enqueue_script('stt_colorpicker');
}

wp_enqueue_script('stt', WP_PLUGIN_URL . '/scroll-to-top/js/stt.js', array('jquery'), '1.0' );

function stt_add_head() {
	$enable = get_option('stt_enable');
	$text = get_option('stt_text');
	$width = get_option('stt_width');
	$color = get_option('stt_color');
	$background_color = get_option('stt_background_color');

	if ($enable == 1) :
	
	echo "	
		<!-- by Scrollto Top -->
		
 		<script type=\"text/javascript\">
 			//<![CDATA[
  			jQuery(document).ready(function(){
    			jQuery(\"body\").append(\"<div id=\\\"scroll_to_top\\\"><a href=\\\"#top\\\">$text</a></div>\");
    			jQuery(\"#scroll_to_top a\").css({	'display' : 'none', 'z-index' : '9', 'position' : 'fixed', 'top' : '100%', 'width' : '$width', 'margin-top' : '-30px', 'right' : '50%', 'margin-left' : '-50px', 'height' : '20px', 'padding' : '3px 5px', 'font-size' : '14px', 'text-align' : 'center', 'padding' : '3px', 'color' : '#$color', 'background-color' : '#$background_color', '-moz-border-radius' : '5px', '-khtml-border-radius' : '5px', '-webkit-border-radius' : '5px', 'opacity' : '.8', 'text-decoration' : 'none'});	
    			jQuery('#scroll_to_top a').click(function(){
					jQuery('html, body').animate({scrollTop:0}, 'slow');
				});

    		});
  			
			//]]>

  		</script>
		<!-- /by Scrollto Top and History Back -->	
		
		";
		
		endif;


}


function stt_verify_enable() {
	$enable = get_option('stt_enable');
	
	if ($enable == 1) {
		echo "checked=\"checked\"";
	}
}

function stt_verify_disable() {
	$enable = get_option('stt_enable');
	
	if ($enable == 0) {
		echo "checked=\"checked\"";
	}
}


function stt_menu_function() {
?>

<script type="text/javascript">
      var $jq = jQuery.noConflict();
		$jq(document).ready(function() {

		  $jq('#stt_color').ColorPicker({
			  onShow: function (colpkr) { 
			       $jq(colpkr).fadeIn(500); 
				   return false; 
			  }, 
			  onHide: function (colpkr) {
				  $jq(colpkr).fadeOut(500); 
				  return false; 
			  },
			  onSubmit: function(hsb, hex, rgb, el) {
				  $jq(el).val(hex);
				  $jq(el).ColorPickerHide();
			  },
			  onBeforeShow: function () {
				  $jq(this).ColorPickerSetColor(this.value);
			  }
		  })
		  
		  $jq('#stt_background_color').ColorPicker({
			  onShow: function (colpkr) { 
			       $jq(colpkr).fadeIn(500); 
				   return false; 
			  }, 
			  onHide: function (colpkr) {
				  $jq(colpkr).fadeOut(500); 
				  return false; 
			  },
			  onSubmit: function(hsb, hex, rgb, el) {
				  $jq(el).val(hex);
				  $jq(el).ColorPickerHide();
			  },
			  onBeforeShow: function () {
				  $jq(this).ColorPickerSetColor(this.value);
			  }
		  })
		  
		  
		  .bind('keyup', function(){
			  $jq(this).ColorPickerSetColor(this.value);
		  });
		});
</script>

<link rel="stylesheet" media="screen" type="text/css" href="<?php echo WP_PLUGIN_URL . '/scroll-to-top/picker/colorpicker.css'; ?>" />

<div class="wrap">
<h2>Scroll to Top</h2>
 
<form method="post" action="options.php">
    <?php settings_fields( 'stt-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Enable</th>
        <td>
        	<label> 
        		<input type="radio" value="1" <?php stt_verify_enable(); ?> name="stt_enable">
        		Enable
        	</label>
        	<br>
        	<label>
        		<input type="radio" value="0" <?php stt_verify_disable(); ?> name="stt_enable">
        		Disable
        	</label>
        </td>
        </tr>
 
        <tr valign="top">
        <th scope="row">Text</th>
        <td>
        <input type="text" name="stt_text" value="<?php echo get_option('stt_text'); ?>" />
        </tr>
    	
    	<tr valign="top">
        <th scope="row">Width</th>
        <td>
        <label>
        <input type="text" name="stt_width" id="stt_width" size="7" value="<?php echo get_option('stt_width'); ?>" />
        </label>
        </tr>
        
        <tr valign="top">
        <th scope="row">Text Color</th>
        <td>
        <label>
        <input type="text" name="stt_color" id="stt_color" size="7" value="<?php echo get_option('stt_color'); ?>" />
        </label>
        </tr>
        
        <tr valign="top">
        <th scope="row">BackGround Color</th>
        <td>
        <label>
        <input type="text" name="stt_background_color" id="stt_background_color" size="7" value="<?php echo get_option('stt_background_color'); ?>" />
        </label>
        </tr>
    
    
    </table>
 
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>
 
</form>
</div>

<?php } ?>
