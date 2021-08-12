<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 1.0
 */
 
 
  /* Start Loop */
  $counter = 1;
  
 			//$args = array('post_type' => 'attachment', 'numberposts' => -1, 'post_parent' => $post->ID, 'order' => 'ASC' , 'orderby' => 'menu_order' ); 
			//$attachments = get_posts($args);
			
			$post_content = $post->post_content;
			preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
			$array_id = explode(",", $ids[1]);

			
			$numofattachments = count($attachments);
			$slideimages = array();
			$sli = 0;
		
		
			$slidestring = "";
			
		/* Start Loop */ 
			if ($array_id) {
				foreach ( $array_id as $array_ids ) {
				
				$Captions = $array_id->post_excerpt;
				if ($Captions == 'film') {
					$numofattachments = $numofattachments - 1 ;
					continue;
					}
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_url($array_ids);
				$imagethumbnail = wp_get_attachment_image_src($array_ids, 'feature_thumb');
				$slidestring = "{image : '" . $imageloader ."', title : '". apply_filters( 'the_title', $attachment->post_title ) ."', desc : '". apply_filters( 'the_title', $attachment->post_excerpt ) . "',thumbnail : '" . $imagethumbnail[0] . "', url : '". apply_filters( 'the_title', $attachment->the_permalink ) ."'}"; 
				//$slidestring = "This is a string";
				$slideimages[$sli] = $slidestring;
			
	


  

  
 /* End Loop */
 $sli++;
 $counter++;
				}
			}
		/* End Loop */
				 
				 
			$slidecounter = 0;
			$numofslides = count($slideimages)-1;
			
			 /* Start Loop */ 
			foreach ($slideimages as $slideimage)
			{
			echo $slideimage;	
			  if ($slidecounter< $numofslides) echo ","; 
			  $slidecounter++;
			}/* End Loop */
?>