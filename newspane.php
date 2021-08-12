<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail');?> </a>
<?php	the_excerpt();
	?>

<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			
		</div><!-- .entry-meta -->
		<?php endif; ?>


</article>