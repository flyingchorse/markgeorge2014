<?php
/**
 * Template Name: thumbs
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 *
 */
get_header(); ?>

		
			<?php while ( have_posts() ) : the_post();
				 _s_content_nav( 'nav-above' ); 

								
				thematic_belowpost();
				?>
				
			<?php endwhile; // end of the loop. ?>
			

<?php get_footer(); ?>