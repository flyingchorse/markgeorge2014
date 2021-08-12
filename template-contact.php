<?php
/**
 * Template Name: contact
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 *
 */
get_header('contact'); ?>

		
		
				 
			<div id="contact-info">
				<div id="primary" class="site-content">
					<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'bio', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
					</div><!-- #primary .site-content -->

				</div>
				
				
						

<?php get_footer(); ?>