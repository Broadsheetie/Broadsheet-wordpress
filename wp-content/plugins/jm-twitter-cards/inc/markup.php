<?php
if ( ! defined( 'JM_TC_VERSION' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

if( class_exists('JM_TC_Utilities') ) {

 
	class JM_TC_Markup extends JM_TC_Utilities {	
	
		private static $_this;
		var $opts;
		var $textdomain = 'jm-tc';

		function __construct() {
		
			self::$_this = $this;
			$this->opts = get_option('jm_tc');
			add_action('wp_head', array(&$this, 'add_markup'), 2 );
			
		}
		
		
		//being nicer with removers !
		static function this() {
			return self::$_this;
		 }
		

		/*
		* Add meta to head section
		*/			
		public function add_markup() {
			
			global $post;
			
			echo "\n" . '<!-- JM Twitter Cards by Julien Maury ' . JM_TC_VERSION . ' -->' . "\n";
			
			if( 
				is_admin() 
				|| (
					is_singular() 
					&& !is_front_page() 
					&& !is_home() 
					&& !is_404() 
					&& !is_tag()
				)	
			) {
			
				/* most important meta */
				$this->cardType( $post->ID );
				$this->creatorUsername( $post->post_author );
				$this->siteUsername();
				$this->title( $post->ID );
				$this->description( $post->ID );
				$this->image( $post->ID );
				
				
				/* secondary meta */
				$this->cardDim( $post->ID );
				$this->product( $post->ID );
				$this->player( $post->ID );
				
				
			}
			
			elseif( is_category() || is_tax() ) {
				
				$this->cardType(); 
				$this->siteUsername();	
				$this->title( false, true );
				$this->description( false, true );	
				$this->image();
				$this->cardDim();	
				
			}
			
			elseif( is_home() || is_front_page() ) {
				
				$this->cardType(); 
				$this->siteUsername();
				$this->creatorUsername();
				$this->title();
				$this->description();	
				$this->image();	
				$this->cardDim();		
				
			}
			
			
			else {
			
				$this->display_markup( '', '', __('Twitter Cards are off for those pages.', $this->textdomain) );
			}
			
		
			$this->deeplinking();
			
			
			echo '<!-- /JM Twitter Cards -->' . "\n\n";
		
		}	
		
		
		/*
		* retrieve datas from SEO Plugins
		*/

		public static function get_seo_plugin_datas( $post_id = false, $type ) {
		
			$aioseop_title		 		= get_post_meta($post_id, '_aioseop_title', true);
			$aioseop_description 		= get_post_meta($post_id, '_aioseop_description', true);
			$yoast_wpseo_title 	 		= get_post_meta($post_id, '_yoast_wpseo_title', true);
			$yoast_wpseo_description 	= get_post_meta($post_id, '_yoast_wpseo_metadesc', true);
			
			if ( class_exists( 'WPSEO_Frontend' ) ) {
					$title  =  !empty( $yoast_wpseo_title  ) ? htmlspecialchars( stripcslashes( $yoast_wpseo_title ) ) : the_title_attribute( array( 'echo' => false));
					$desc   =  !empty( $yoast_wpseo_description ) ? htmlspecialchars( stripcslashes( $yoast_wpseo_description ) ) : parent::get_excerpt_by_id($post_id);	
			
			} elseif( class_exists( 'All_in_One_SEO_Pack' ) ) {
					$title 	=  !empty( $aioseop_title ) ? htmlspecialchars( stripcslashes( $aioseop_title ) ) : the_title_attribute( array( 'echo' => false));
					$desc  	=  !empty( $aioseop_description ) ? htmlspecialchars( stripcslashes( $aioseop_description ) ) : parent::get_excerpt_by_id($post_id);					
			
			} else {
					$title 	= the_title_attribute( array( 'echo' => false));
					$desc  	= parent::get_excerpt_by_id($post_id);
			}
			
			switch( $type ) {
				
				case "title" :
					$data = $title;
				break;
				
				case "desc" :
					$data = $desc;
				break;
			
			}
			
			return $data;
			
		}
		

		/*
		* Display the different meta
		*/
		private function display_markup( $name, $metadata, $error = false ){
	
			if( !$error ) {
				
				echo '<meta name="twitter:'.$name.'" content="'.$metadata.'">' . "\n";
				
			} elseif( $error && current_user_can('edit_posts') ) {
			
				echo '<!-- [(-_-)@ '. $error .' @(-_-)] -->' . "\n";
			
			} else {
			
				return;
			}
		}
		
		/*
		* Retrieve the meta card type
		*/		
		public function cardType( $post_id = false ) {
		
			$cardTypePost = get_post_meta($post_id, 'twitterCardType', true);
			
			$cardType = ( !empty( $cardTypePost  ) ) ? $cardTypePost  : $this->opts['twitterCardType'];

			$this->display_markup( 'card',  apply_filters('jm_tc_card_type', $cardType) );
		}
		
		/*
		* Retrieve the meta creator
		*/		
		public function creatorUsername( $post_author = false ) {
		
			if( $post_author ) {
		
			//to be modified or left with the value 'jm_tc_twitter'
				
				$cardUsernameKey 	= $this->opts['twitterUsernameKey'];
				$cardCreator 		= get_the_author_meta( $cardUsernameKey, $post_author );
				
				$cardCreator		= ( !empty( $cardCreator ) ) ? $cardCreator : $this->opts['twitterCreator'];
				$cardCreator 		=  '@' . parent::remove_at( $cardCreator );
			
			} else {
			
				$cardCreator = '@' .  parent::remove_at( $this->opts['twitterCreator'] );
			}
			
			
			$this->display_markup( 'creator',  apply_filters('jm_tc_card_creator', $cardCreator) );
		}
		
		/*
		* retrieve the meta site
		*/
		public function siteUsername() {
			
			$cardSite =  '@' . parent::remove_at( $this->opts['twitterSite'] );
			$this->display_markup( 'site',  apply_filters('jm_tc_card_site', $cardSite) );
		}
		
		
		/*
		* retrieve the title
		*/
		public function title($post_id = false, $is_tax = false) {
		
			if($post_id) {
			
				if(  !empty( $this->opts['twitterCardTitle'] ) ) {
				
					$title = get_post_meta($post_id, $this->opts['twitterCardTitle'], true); // this one is pretty hard to debug ^^
					$cardTitle = !empty( $title ) ? htmlspecialchars( stripcslashes( $title ) ) : the_title_attribute( array( 'echo' => false));
					
				} elseif( empty( $this->opts['twitterCardTitle'] ) && ( class_exists('WPSEO_Frontend') || class_exists('All_in_One_SEO_Pack') )  ) {
				
					$cardTitle = self::get_seo_plugin_datas($post_id, 'title');
					
				 } else {
				
					$cardTitle = the_title_attribute( array( 'echo' => false));
					
				}	

			} elseif( !$post_id && $is_tax ) {
			
					$cardTitle 	= ( '' != ( $tax_name = get_queried_object()->name ) ) ? $tax_name : get_bloginfo('name');
				
				
			} else {
				
				$cardTitle = get_bloginfo('name');

			}			

			$this->display_markup( 'title',  apply_filters('jm_tc_get_title', $cardTitle) );
		
		}
		
		/*
		* retrieve the description
		*/
		public function description($post_id = false, $is_tax = false) {
		
			if($post_id) {
			
				
				if( !empty( $this->opts['twitterCardDesc']) ) {
				
					$desc 				= get_post_meta($post_id, $this->opts['twitterCardDesc'], true);
					$cardDescription 	= !empty( $desc ) ? htmlspecialchars( stripcslashes( $desc ) ) : parent::get_excerpt_by_id($post_id);
					
				} elseif( empty( $this->opts['twitterCardDesc'] ) && ( class_exists('WPSEO_Frontend') || class_exists('All_in_One_SEO_Pack') ) ){
					
					$cardDescription = self::get_seo_plugin_datas($post_id, 'desc');
				
				} else {
				
					$cardDescription = parent::get_excerpt_by_id($post_id);
					
				}	
				
			} elseif( !$post_id && $is_tax ) {
				
					$cardDescription = ( '' != term_description() ) ? wp_strip_all_tags( term_description() ) :  $this->opts['twitterPostPageDesc'];
					
			} else {
				
				$cardDescription = $this->opts['twitterPostPageDesc'];
			}
			
			
			$cardDescription = parent::remove_lb($cardDescription);

			$this->display_markup( 'description',  apply_filters('jm_tc_get_excerpt', $cardDescription) );			
		
		}	
		
		

		/*
		* retrieve the images
		*/
		
		public function image( $post_id = false ) {
		
			$cardImage 			= get_post_meta($post_id, 'cardImage', true); 
		
				//gallery
				if( ($cardType  = get_post_meta($post_id, 'twitterCardType', true) ) != 'gallery' ) 
				{
					if (get_the_post_thumbnail($post_id ) != '' )
					{
						if ( !empty( $cardImage ) )
						{ // cardImage is set
							$image = $cardImage;
						}
						else
						{
							$size				= JM_TC_Thumbs::thumbnail_sizes($post_id);
							$image_attributes 	= wp_get_attachment_image_src( get_post_thumbnail_id($post_id), $size);
							$image 				= $image_attributes[0];
						}

					}
					
					elseif (get_the_post_thumbnail($post_id ) == '' && !empty( $cardImage ) )
					{
						$image = $cardImage;
					}
					
					elseif ( 'attachment' == get_post_type() ) 
					{

						$image =  wp_get_attachment_url($post_id);
					}
					
					elseif( $post_id == false ) 
					{ 
	
						$image = $this->opts['twitterImage'];
					}
					
					else {
						//fallback
						$image = $this->opts['twitterImage'];
					}
					
					
					$this->display_markup( 'image:src', apply_filters( 'jm_tc_image_source', $image) );
					
				}
				else
				{ // markup will be different
				global $post;

						if (  is_a($post, 'WP_Post') && parent::has_shortcode($post->post_content, 'gallery') )
						{

							// get attachment for gallery cards

							$args = array(
							'post_type' => 'attachment',
							'numberposts' => - 1,
							'exclude' => get_post_thumbnail_id() ,
							'post_mime_type' => 'image',
							'post_status' => null,
							'post_parent' => $post_id 
							);
							$attachments = get_posts($args);
							if ($attachments && count($attachments) > 3)
							{
								$i = 0;
								foreach($attachments as $attachment)
								{

									// get attachment array with the ID from the returned posts

									$pic = wp_get_attachment_url($attachment->ID);
									$this->display_markup( 'image' . $i, apply_filters( 'jm_tc_image_source', $pic ) );
									
									$i++;
									if ($i > 3) break; //in case there are more than 4 images in post, we are not allowed to add more than 4 images in our card by Twitter
								}
							}
						}
						
						else
						{
							$this->display_markup( '', '', __('Warning : Gallery Card is not set properly ! There is no gallery in this post !', $this->textdomain) );
						}
					
				}
		
		}
		
		
		
		/*
		* Product additional fields
		*/
		public function product($post_id = false){

			if( ($cardType = get_post_meta($post_id, 'twitterCardType', true) ) == 'product') {
			
				$data1 			= get_post_meta($post_id, 'cardData1', true);
				$label1		 	= get_post_meta($post_id, 'cardLabel1', true);
				$data2 			= get_post_meta($post_id, 'cardData2', true);
				$label2 		= get_post_meta($post_id, 'cardLabel2', true);
				
				$product		= array( 
									'data1'  => $data1, 
									'label1' => $label1, 
									'data2'  => $data2, 
									'label2' => $label2
								);
				
				
				if ( !empty( $data1 ) && !empty( $label1 ) && !empty( $data2 ) && !empty( $label2 ) )
				{
					foreach ($product as $field => $value ) $this->display_markup( $field,  apply_filters('jm_tc_product_field-'.$field, $value) );
				}		
				
				else 
				{
					 $this->display_markup( '', '', __('Warning : Product Card is not set properly ! There is no product datas !', $this->textdomain) );
				}
		
			} else {
				return;
			}
		}
		
		/*
		* Player additional fields
		*/
		public function player($post_id = false){	

			if( ($cardType = get_post_meta($post_id, 'twitterCardType', true) ) == 'player') {
			
				$playerUrl       	= get_post_meta($post_id, 'cardPlayer', true);
				$playerStreamUrl 	= get_post_meta($post_id, 'cardPlayerStream', true);
				$playerWidth 		= get_post_meta($post_id, 'cardPlayerWidth', true);
				$playerHeight 		= get_post_meta($post_id, 'cardPlayerHeight', true);
					
					//Player
					if ( !empty($playerUrl ) ) 
					{
						$this->display_markup( 'player',  apply_filters('jm_tc_player_url', $playerUrl) );
					} 
					
					else
					{
						$this->display_markup( '', '', __('Warning : Player Card is not set properly ! There is no URL provided for iFrame player !', $this->textdomain) );				
					}
					
					//Player stream
					if ( !empty( $playerStreamUrl ) ) 
					{
					
					$codec = "video/mp4; codecs=&quot;avc1.42E01E1, mp4a.40.2&quot;";
					
						$this->display_markup( 'player:stream',  apply_filters('jm_tc_player_stream_url', $playerUrl) );
						$this->display_markup( 'player:stream:content_type',  apply_filters('jm_tc_player_stream_codec', $codec) );
					
					} else {
						$this->display_markup( '',  '', __('No stream', $this->textdomain) );
					}
					
					//Player width and height
					if ( !empty( $playerWidth ) && !empty( $playerHeight ) ) 
					{				
						$this->display_markup( 'player:width',  apply_filters('jm_tc_player_width', $playerWidth) );
						$this->display_markup( 'player:height',  apply_filters('jm_tc_player_height', $playerHeight) );
					}
					
					else 
					{
						$this->display_markup( 'player:width',  apply_filters('jm_tc_player_width', '435') );
						$this->display_markup( 'player:height',  apply_filters('jm_tc_player_height', '251') );	
					}
					
							
			} else {
				return;
			}
		
		}
		
		
		
		/*
		* Image Width and Height
		*/
		
		public function cardDim($post_id = false){	
		
			$cardTypePost 	= get_post_meta($post_id, 'twitterCardType', true);
			$cardWidth 		= get_post_meta($post_id, 'cardImageWidth', true);
			$cardHeight 	= get_post_meta($post_id, 'cardImageHeight', true);
			$type 			= ( !empty( $cardTypePost ) ) ? $cardTypePost  : $this->opts['twitterCardType'];
		
					
			if(  in_array( $type, array('photo','product', 'summary_large_image', 'player') )  ) {
			
				$width  = ( !empty( $cardWidth ) ) ? $cardWidth : $this->opts['twitterImageWidth'];
				$height = ( !empty( $cardHeight ) ) ? $cardHeight : $this->opts['twitterImageHeight'];
				
				$this->display_markup( 'image:width',  $width );
				$this->display_markup( 'image:height',  $height );
			
			} elseif( in_array( $type, array('photo','product', 'summary_large_image', 'player') ) && !$post_id ) {
			
				$this->display_markup( 'image:width',  $this->opts['twitterCardWidth'] );
				$this->display_markup( 'image:height',  $this->opts['twitterCardHeight'] );
			}
			
			else {
				return;
			}

				 		
		}
		
		
		/*
		* retrieve the deep linking and app install meta
		*/		
		public function deeplinking(){
					
			if( !empty( $this->opts['twitteriPhoneName'] ) ) $this->display_markup( 'app:name:iphone',  $this->opts['twitteriPhoneName'] );
			if( !empty( $this->opts['twitteriPadName'] ) ) $this->display_markup( 'app:name:ipad', $this->opts['twitteriPadName'] );
			if( !empty( $this->opts['twitterGooglePlayName'] ) ) $this->display_markup( 'app:name:googleplay', $this->opts['twitterGooglePlayName'] );
			if( !empty( $this->opts['twitteriPhoneUrl'] ) ) $this->display_markup( 'app:url:iphone', $this->opts['twitteriPhoneUrl'] );
			if( !empty( $this->opts['twitteriPadUrl'] ) ) $this->display_markup( 'app:url:ipad', $this->opts['twitteriPhoneUrl'] );
			if( !empty( $this->opts['twitterGooglePlayUrl'] ) ) $this->display_markup( 'app:url:googleplay', $this->opts['twitterGooglePlayUrl'] );
			if( !empty( $this->opts['twitteriPhoneId'] ) ) $this->display_markup( 'app:id:iphone', $this->opts['twitteriPhoneId'] );
			if( !empty( $this->opts['twitteriPadId'] ) ) $this->display_markup( 'app:id:ipad', $this->opts['twitteriPadId'] );
			if( !empty( $this->opts['twitterGooglePlayId'] ) ) $this->display_markup( 'app:id:googleplay', $this->opts['twitterGooglePlayId'] );
			if( !empty( $this->opts['twitterAppCountry'] ) ) $this->display_markup( 'app:id:country', $this->opts['twitterAppCountry'] );
		}
		

	}

}
