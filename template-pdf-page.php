<?php
/**
 * Template Name: Pdf
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 *
 */
get_header('pdf');
$parent = get_post_top_ancestor_id($post->ID);
				$parent_title = get_the_title($parent);
			while ( have_posts() ) : the_post();
				 _s_content_nav( 'nav-above' ); 

								
				insert_pdf_form();
				?>
				
			<?php endwhile; // end of the loop. ?>
			

<?php get_footer(); ?>