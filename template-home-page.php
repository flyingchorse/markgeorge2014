	<?php
/**
 * Template Name: Homepage
 *
 * This Full Width template removes the primary and secondary asides so that content
 * can be displayed the entire width of the #content area.
 *
 */
get_header('home'); ?>
<div id="news-pane-container">
<div id="news-pane">
<div class="news-archive-link"></div>
<article class="latest news-pane-heading">
<h1 class="left">Latest</h1><h1 class="right"><a href="/news">Archive</a></h1>
</article>
<?php query_posts("posts_per_page=6"); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>


				<?php get_template_part( 'newspane'); ?>


			<?php endwhile; // end of the loop. ?>

	
		
</div>
<div id="news-pane-button"><div id="news-pane-button-text">NEWS</div></div>
</div>
<?php endif; ?>

<?php get_footer('home'); ?>