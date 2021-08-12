<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package _s
 * @since _s 1.0
 */
?>

	</div><!-- #main -->
	<?php get_template_part( 'profile', 'page' ); ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			Represented by Mark George
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>