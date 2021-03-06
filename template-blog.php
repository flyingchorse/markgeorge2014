<?php
/**
 * Template Name: BlogPage
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 *
 */
get_header('blog'); ?>

		
				<div id="thumbgrid-position" class="bio">
				<div id="primary" class="site-content">
					<div id="content" role="main">
				<?php query_posts("posts_per_page=-1"); ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'blogs', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
					</div><!-- #primary .site-content -->

				</div>


<?php get_footer(); ?>