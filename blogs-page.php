<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _s
 * @since _s 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
	<div class="entry-content">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">	<?php the_post_thumbnail('thumbnail'); 
	the_excerpt();
	?></a>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
