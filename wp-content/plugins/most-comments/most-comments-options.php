<?php
/*
Most Comments Options
http://www.brandinfection.com
*/

### Variables Variables Variables
$base_name = plugin_basename('most-comments/most-comments-options.php');
$base_page = 'admin.php?page='.$base_name;
$most_comments_settings = array('most_comments_options', 'widget_most_comments');
$most_comments_postmetas = array('most_comments');


if(!empty($_POST['Submit'])) {
	$most_comments_options = array();
	
	$most_comments_options['exclude_nocomments'] =  trim($_POST['most_comments_exclude_nocomments']);
	$most_comments_options['from_category'] =  trim($_POST['most_comments_from_category']);
	$most_comments_options['most_comments_template'] =  trim($_POST['most_comments_template_most_comments']);
	$update_most_comments_queries = array();
	$update_most_comments_text = array();
	$update_most_comments_queries[] = update_option('most_comments_options', $most_comments_options);
	$update_most_comments_text[] = __('Most Comments Options', 'most-comments');
	$i=0;
	$text='';
	foreach($update_most_comments_queries as $update_most_comments_query) {
		if($update_most_comments_query) {
			$text .= '<font color="green">'.$update_most_comments_text[$i].' '.__('Updated', 'most-comments').'</font><br />';
		}
		$i++;
	}
	if(empty($text)) {
		$text = '<font color="red">'.__('No Most Comments Option Updated', 'most-comments').'</font>';
	}
}

$most_comments_options = get_option('most_comments_options');
?>

<script type="text/javascript">
	/* <![CDATA[*/
	function most_comments_default_templates(template) {
		var default_template;
		switch(template) {
			case 'most_comments':
				default_template = "<li><a href=\"%POST_URL%\"  title=\"%POST_TITLE%\">%POST_TITLE%</a> - %COMMENT_COUNT% <?php _e('comments', 'most-comments'); ?></li>";
				break;
		}
		document.getElementById("most_comments_template_" + template).value = default_template;
	}
	/* ]]> */
</script>



<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"> 
<div class="wrap"> 
	<h2><?php _e('Most Comments Options', 'most-comments'); ?></h2>
	<table class="form-table">
		<tr>
			<td valign="top" width="30%"><strong><?php _e('Show comments from post category', 'most-comments'); ?></strong></td>
			<td valign="top">
				<select name="most_comments_from_category" size="1">
					<option value="0"<?php selected('0', $most_comments_options['from_category']); ?>>All</option>
					<?php
						$request = "SELECT wp_term_taxonomy.term_id, wp_term_taxonomy.term_taxonomy_id, wp_term_taxonomy.taxonomy, wp_terms.name, wp_terms.slug FROM wp_term_taxonomy, wp_terms WHERE wp_term_taxonomy.term_id = wp_terms.term_id AND wp_term_taxonomy.taxonomy = 'category' ORDER BY wp_terms.name";
					
						$categories = $wpdb->get_results($request);
					
						foreach ($categories as $category) {
						?>
							<option value="<?php echo $category->term_id; ?>"<?php selected($category->term_id, $most_comments_options['from_category']); ?>><?php echo $category->name; ?></option>
						<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="top" width="30%"><strong><?php _e('Exclude posts with no comments:', 'most-comments'); ?></strong></td>
			<td valign="top">
				<select name="most_comments_exclude_nocomments" size="1">
					<option value="0"<?php selected('0', $most_comments_options['exclude_nocomments']); ?>><?php _e('No', 'most-comments'); ?></option>
					<option value="1"<?php selected('1', $most_comments_options['exclude_nocomments']); ?>><?php _e('Yes', 'most-comments'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td valign="top">
				<strong><?php _e('Most Comments Template:', 'most-comments'); ?></strong><br /><br />
				<?php _e('Allowed Variables:', 'most-comments'); ?><br />
				- %COMMENT_COUNT%<br />
				- %POST_TITLE%<br />
				- %POST_EXCERPT%<br />
				- %POST_CONTENT%<br />
				- %POST_URL%<br /><br />
				<input type="button" name="RestoreDefault" value="<?php _e('Restore Default Template', 'most-comments'); ?>" onclick="most_comments_default_templates('most_comments');" class="button" />
			</td>
			<td valign="top">
				<textarea cols="80" rows="15"  id="most_comments_template_most_comments" name="most_comments_template_most_comments"><?php echo htmlspecialchars(stripslashes($most_comments_options['most_comments_template'])); ?></textarea>
			</td>
		</tr>
	</table>
	<p class="submit">
		<input type="submit" name="Submit" class="button" value="<?php _e('Save Changes', 'most-comments'); ?>" />
	</p>
</div>
</form>