<?php
/**
 * Template Name: newcontact
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 * 
 */
get_header('newbiogmark'); ?>
			<div id="thumbgrid-position" class="bio">
			
				<div id="primary" class="site-content">
					<div id="content" role="main">
					<div id="contact-info">
				<p>Phone <strong>+44(0)&nbsp;20&nbsp;8877&nbsp;9922</strong>&nbsp; Fax <strong>+44(0)&nbsp;20&nbsp;8870&nbsp;5533</strong><br>
1 Clive Place, Esher, Surrey, KT10 9LH, UK<br>
<strong></strong><strong><a href="mailto:mg@markgeorge.com">mg@markgeorge.com</a></strong></p>
					</div>
					<div id="home-icon-holder"><a href="<?php echo site_url(); ?>"><span id="home-icon"></span></a></div>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'bio', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
					</div><!-- #primary .site-content -->

				</div>
				
				
						

<?php get_footer(); ?>