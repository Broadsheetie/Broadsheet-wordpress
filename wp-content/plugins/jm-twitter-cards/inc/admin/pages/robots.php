<?php 
if ( ! defined( 'JM_TC_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

?>
<div class="wrap">
<h2>JM Twitter Cards : <?php echo esc_html( get_admin_page_title() ); ?></h2>


<?php echo JM_TC_Tabs::admin_tabs();?>



	<?php
	
	function jm_tc_robots_options(){
	
		$plugin_options = array(
			'id'         => 'jm_tc',
			'show_on'    => array( 'key' => 'options-page', 'value' => array( 'jm_tc_robots', ), ),
			'show_names' => true,
			'fields'     => array(

				array(
				'name' 		=> __( 'Twitter\'s bot', 'jm-tc' ),
				'desc' 		=> __('Add required rules in robots.txt', 'jm-tc'),
				'id'   		=> 'twitterCardRobotsTxt',
				'type' 		=> 'select',
				'options'	 => array(
				'yes' 			=> __( 'Yes', 'jm-tc' ),
				'no' 			=> __( 'No', 'jm-tc' ),
				)
				),
			)
			);			
			
		return $plugin_options;
	}
	?>
	
	<?php cmb_metabox_form( jm_tc_robots_options(), JM_TC_Admin::key() ); ?>
	<div class="doc-valid">
	<?php echo JM_TC_Admin::docu_links(7); ?>
	</div>
</div>


