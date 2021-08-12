<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 1.0
 */
 
 
 
 
 
 /* Start Loop */
$post_content = $post->post_content;
preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
$array_id = explode(",", $ids[1]);

  $counter = 1;
  
 		//	$args = array('post_type' => 'attachment', 'numberposts' => -1, 'order' => 'ASC'); 
		//	$attachments = get_posts($args);
		//	$numofattachments = count($attachments);
		
			if ($array_id) {
				foreach ( $array_id as $array_ids ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_image_src($array_ids);
				$imagethumbnail = wp_get_attachment_image_src($array_ids, 'feature_thumb');

				
 /* Start Loop */
   echo "{image : '" . $imageloader[0] ."', title : '". get_the_title($array_ids) ."', desc : '". apply_filters( 'the_title', $attachment->post_excerpt ) . "',thumbnail : '" . $imagethumbnail[0] . "', url : '". apply_filters( 'the_title', $attachment->the_permalink ) . "'}"; 
   if ($counter< $numofattachments) echo ",";
      
	


  

  
 /* End Loop */
 
 $counter++;
				}
			}
			 /* End Loop */
?>

