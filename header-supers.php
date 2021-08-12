<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _s
 * @since _s 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes();
session_start(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link href="http://fast.fonts.com/cssapi/36dcd3c9-bc59-4beb-8f59-86b9bb625ec7.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=1024,
                               maximum-scale=1.0" />
<?php wp_head();

if (isset ($_GET['slide_id'])){
		$slide_selected = $_GET['slide_id'];}
		else
		{
		$slide_selected =1;
		} 
?>
		
<script type="text/javascript">
			
			jQuery(function($){
				
				$.supersized({
				
					// Functionality
					slideshow               :   1,			// Slideshow on/off
					autoplay				:	0,			// Slideshow starts playing automatically
					start_slide             :   <?php echo $slide_selected;?>,			// Start slide (0 is random)
					stop_loop				:	0,			// Pauses slideshow on last slide
					random					: 	0,			// Randomize slide order (Ignores start slide)
					slide_interval          :   3000,		// Length between transitions
					transition              :   6, 			// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
					transition_speed		:	1000,		// Speed of transition
					new_window				:	1,			// Image links open in new window/tab
					pause_hover             :   0,			// Pause slideshow on hover
					keyboard_nav            :   1,			// Keyboard navigation on/off
					performance				:	1,			// 0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
					image_protect			:	1,			// Disables image dragging and right click with Javascript
															   
					// Size & Position						   
					min_width		        :   0,			// Min width allowed (in pixels)
					min_height		        :   0,			// Min height allowed (in pixels)
					vertical_center         :   1,			// Vertically center background
					horizontal_center       :   1,			// Horizontally center background
					fit_always				:	1,			// Image will never exceed browser width or height (Ignores min. dimensions)
					fit_portrait         	:   0,			// Portrait images will not exceed browser height
					fit_landscape			:   0,			// Landscape images will not exceed browser width
															   
					// Components							
					slide_links				:	'blank',	// Individual links for each slide (Options: false, 'num', 'name', 'blank')
					thumb_links				:	0,			// Individual thumb links for each slide
					thumbnail_navigation    :   0,			// Thumbnail navigation
					slides 					:  	[<?php get_template_part( 'galleryimg', 'page' ); ?>
												],
												
					// Theme Options			   
					progress_bar			:	0,			// Timer for each slide							
					mouse_scrub				:	0
					
				});
		    });
		    
		</script>
</head>
<?php if (isset($_SESSION['color'])){  $bgcolr = $_SESSION['color'];}else{ $bgcolr='black-back'; }?>
<body <?php body_class($bgcolr); ?>>
<div id="page" class="hfeed site page-template-template-profile-page-php">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav role="navigation" class="site-navigation main-navigation fullscreen">
			<h1 class="assistive-text"><?php _e( 'Menu', '_s' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', '_s' ); ?>"><?php _e( 'Skip to content', '_s' ); ?></a></div>

			<?php //wp_nav_menu( array( 'theme_location' => 'primary' ) ); 
?>			<div class='profile-name'><h1><?php $parent = get_post_top_ancestor_id($post->ID);$parent_title = get_the_title($parent); echo $parent_title ?></h1></div>

			<div id="secondary-menu-id" class="secondary_menu_class">
				<ul id="menu-submenu" class="menu"><li id="menu-item-202" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-202"><a href="<?php $weblink = get_post_meta($parent, 'website', true); echo $weblink; ?>">WEBSITE</a></li>
					 <?php wp_list_pages( array('title_li'=>'','depth'=>1,'meta_key'=>'bio','meta_value'=>'1','child_of'=>$parent) ); ?>
					<li id="menu-item-179" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor menu-item-179"><a href="<?php echo site_url(); ?>">HOME</a></li>
					<li id="menu-item-191" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-191"><a href="<?php echo site_url(); ?>/contact/">CONTACT</a></li>
				</ul>
			</div>
			<div class="icon-bar">
			<?php $permalink = get_permalink($post->post_parent); ?>
			<a href="#" id="white-button" class="fullscreen-button"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/whitesq.png" alt="White Background"></a>
			<a href="#" id="black-button" class="fullscreen-button"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/white-keyline.png" alt="Black Background" ></a>
			<?php $permalink = get_permalink($post->post_parent); ?>
			<a href="#" id="fullscreen-button" class="fullscreen-button"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/fullscreen.png" alt="fullscreen" ></a>
			<a href="<?php echo $permalink ?>" id="thumbnail-link"><img src="<?php echo get_bloginfo('stylesheet_directory'); ?>/images/quik_links.png" alt="Go Fullscreen"></a>
			</div>
			
		</nav>
		<script type="text/javascript" src="http://www.web-01-gbl.com/js/41341.js" ></script>
<noscript><img src="http://www.web-01-gbl.com/41341.png" style="display:none;" /></noscript>
	</header><!-- #masthead .site-header -->
	<a id="prevslide" class="load-item"></a>
	<a id="nextslide" class="load-item"></a>

	<div id="main">