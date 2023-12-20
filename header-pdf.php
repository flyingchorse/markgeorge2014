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
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
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
<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie7.css" media="screen" type="text/css" />
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<link href="http://fast.fonts.com/cssapi/36dcd3c9-bc59-4beb-8f59-86b9bb625ec7.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="width=1024,
                               maximum-scale=1.0" />
<?php wp_head(); ?>
<script>


$(window).load(function()
{
// Set a timeout...
  setTimeout(function(){
    // Hide the address bar!
    window.scrollTo(0, 1);
  }, 0);
});

</script>
<script type="text/javascript" src="http://www.web-01-gbl.com/js/41341.js" ></script>
<noscript><img src="http://www.web-01-gbl.com/41341.png" style="display:none;" /></noscript>
</head>
<?php if (isset($_SESSION['color'])){ $bgcolr = $_SESSION['color'];}?>
<body <?php body_class($bgcolr); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav role="navigation" class="site-navigation main-navigation">
			<h1 class="assistive-text"><?php _e( 'Menu', '_s' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', '_s' ); ?>"><?php _e( 'Skip to content', '_s' ); ?></a></div>

			
			<div class='profile-name'><h1><?php 
				$parent = get_post_top_ancestor_id($post->ID);
				$parent_title = get_the_title($parent); 
				echo $parent_title?></h1></div>

			<div id="secondary-menu-id" class="secondary_menu_class">
			<ul id="menu-submenu" class="menu">
			<?php $weblink = get_post_meta($parent, 'website', true);
			if (!$weblink == null){ ?>
				<li id="menu-item-202" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-202"><a href="<?php  echo $weblink; ?>">WEBSITE</a></li>
					 <?php }; wp_list_pages( array('title_li'=>'','depth'=>1,'meta_key'=>'bio','meta_value'=>'1','child_of'=>$parent) ); ?>
					<li id="menu-item-179" class="menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor menu-item-179"><a href="<?php echo site_url(); ?>">HOME</a></li>
					<li id="menu-item-191" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-191"><a href="<?php echo site_url(); ?>/contact/">CONTACT</a></li>

				</ul>
				<ul id="film-submenu" class="menu">
			<?php 

				$thephotographer = get_permalink($parent);
				?>
				
				<li><a href="<?php echo $thephotographer; ?>">Stills</a> </li>
				<?php
				
				?>
				

				</ul>
			</div>
			<div class="menu">
			<?php	
			echo "<form action='".get_admin_url()."admin-post.php' method='post' id='pdfform' target='blank'>";
echo "<input type='hidden' name='photographer' value='" .  $parent_title  . "' />";
echo "<input type='hidden' name='action' value='submit-form' />";
?>
<span class="pdfnav">Select Images then</span>
<a href="#" id="downloadlink" class="downloadoff">Download</a>


<div id="portfolio">
<ul id="portfolio_ul" class="ui-sortable">
</ul>
</div>


</form>
</div>

					</nav>
	</header><!-- #masthead .site-header -->

	<div id="main">