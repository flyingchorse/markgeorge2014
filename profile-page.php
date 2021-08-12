<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Toolbox
 * @since Toolbox 1.0
 */
 
 
 ?>
 
 <div id="rg-gallery" class="rg-gallery">
					<div class="rg-thumbs">
						<!-- Elastislide Carousel Thumbnail Viewer -->
						<div class="es-carousel-wrapper">
							<div class="es-nav">
								<span class="es-nav-prev">Previous</span>
								<span class="es-nav-next">Next</span>
								<span class="bio-link">biography</span>
							</div>
							<div class="es-carousel">
								<ul>
<?
 /* Start Loop */
  $args = array( 'post_type' => 'attachment', 'numberposts' => 8, 'post_status' => null ); 
			$attachments = get_posts($args);
			$loopcount = 1;
			if ($attachments) {
				foreach ( $attachments as $attachment ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_image_src($attachment->ID,'article-header');
				$imagethumbnail = wp_get_attachment_image_src($attachment->ID, 'feature_thumb');
				?>
				<li><a href="#"><img src="<?php echo $imagethumbnail[0]; ?>" data-large="<?php echo $imageloader[0]; ?>" alt="image01" data-description="From off a hill whose concave womb reworded" /></a></li>			
  				<?php 
				
				$loopcount = $loopcount + 1;
				}
			}


	?>
	
	</ul>
							</div>
						</div>
						<!-- End Elastislide Carousel Thumbnail Viewer -->
					</div><!-- rg-thumbs -->
				</div><!-- rg-gallery -->
