<?php
/**
 * _s functions and definitions
 *
 * @package _s
 * @since _s 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since _s 1.0
 * Updated Nov 2014
 */
 
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( '_s_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since _s 1.0
 */
function _s_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * WordPress.com-specific functions and definitions
	 */
	//require( get_template_directory() . '/inc/wpcom.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on _s, use a find and replace
	 * to change '_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_s', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_s' ),
	) );
	
	/* My Custom Menu */
	
	//function register_my_menus() {
  register_nav_menus(
    array('secondary-menu' => __( 'Secondary Menu ') )
  );

  register_nav_menus(
    array('contact-menu' => __( 'Contact Menu ') )
  );


//add_action( 'init', 'register_my_menus' );


	
	
	

	/**
	 * Add support for the Aside and Gallery Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // _s_setup

add_action( 'after_setup_theme', '_s_setup' );


/* register hook to add secondary navigation */
function thematic_scndnav() {
    do_action('thematic_scndnav');
} // end thematic_scndnav


function add_service_menu(){
wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'container_class' => 'secondary_menu_class', 'container_id' => 'secondary-menu-id' ) );
}

/* Add hook to add secondary navigation */
add_action('thematic_scndnav','add_service_menu');

function thematic_contact_menu() {
    do_action('thematic_contact_menu');
} // end thematic_scndnav


function add_contact_menu(){
wp_nav_menu( array( 'theme_location' => 'contact-menu', 'container_class' => 'contact_menu_class', 'container_id' => 'contact-menu-id' ) );
}

/* Add hook to add secondary navigation */
add_action('thematic_contact_menu','add_contact_menu');

	
	
	
	
/* My Custom Menu */	





// add featured image thumbnail

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}


// Add custom thumbnail sizes

function CustomThumbs(){
add_image_size('feature_thumb',120,120, true);
add_image_size('slide_image',970,400, true);
}
add_action('init','CustomThumbs');

// Add custom thumbnail sizes

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since _s 1.0
 */
function _s_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', '_s' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function _s_scripts() {
	global $post;

	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );

	//wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', 'jquery', '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

/**
 * Implement the Custom Header feature
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
* Implement image pickup feature
*/
require( get_template_directory() .'/inc/image-pickup.php' );

function slideshow() {
global $post;
//$template_name = get_post_meta($post->ID,'_wp_page_template',true);
//then define the action to take:
 if (is_page_template('template-home-page.php')) { 

		?><div id="slide-container"><div id="art-slideshow"> <?php
			$args = array( 'post_type' => 'attachment', 'numberposts' => 8, 'post_status' => null ); 
			$attachments = get_posts($args);
			$loopcount = 1;
			if ($attachments) {
				foreach ( $attachments as $attachment ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_image_src($attachment->ID,'article-header');
				?>
				 <img class="slide-image <?php echo $loopcount; ?>" src="<?php echo $imageloader[0]; ?>" width="1024" height="768" alt="<?php echo $template_name ?>"/>
				<?php 
				
				$loopcount = $loopcount + 1;
				}
			}


	?></div></div><?php
//end action:


	}
}
//now we can add our new action to the appropriate place like so:

function thematic_header() {
    do_action('thematic_header');
} // end thematic_belowheader

//add_action('thematic_header', 'slideshow' ,8);



function js_in_head(){

if (is_page_template('template-page-fullwidth.php')) { 
?>

<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory') ?>/js/slideshow.js"></script>

<?php }}
add_action('wp_head', 'js_in_head');


function my_scripts_method() {
    wp_deregister_script( 'jquery' );
    if ( is_page_template('template-supersize-page.php') ) {
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    }
    else
    {
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    }
    wp_enqueue_script( 'jquery' );
}    
 
add_action('wp_enqueue_scripts', 'my_scripts_method');

function custom_styles()
{
	
if ( is_page_template('template-home-page.php') ) {
	//wp_enqueue_script('jqueryfeatures', get_bloginfo('stylesheet_directory'). '/js/jqueryfeatures.js', array('jquery'));
//	wp_enqueue_script('easing_js', get_bloginfo('stylesheet_directory'). '/js/jqueryfeatures.js', array('jquery'));
	/*
wp_enqueue_script('jqueryui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js', array('jquery'));
	wp_enqueue_style('jqueryUIcss', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
	
	
wp_enqueue_script('easing_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/jquery.easing.min.js', array('jquery'));
	wp_enqueue_script('supersized_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/supersized.3.2.5.js', array('jquery'));
	wp_enqueue_script('supersized_theme_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/theme/supersized.shutter.js', array('jquery'));
	wp_enqueue_style('supersized_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/css/supersized.css');
	wp_enqueue_style('supersized_theme_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/theme/supersized.shutter.css');
*/

	}
	
if ( is_page_template('template-supersize-page.php') ) {
	
	wp_enqueue_script('easing_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/jquery.easing.min.js', array('jquery'));
//	wp_enqueue_script('supersized_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/supersized.3.2.5.js', array('jquery'));
	wp_enqueue_script('supersized_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/js/supersized.3.2.7.js', array('jquery'));
	wp_enqueue_script('supersized_theme_js', get_bloginfo('stylesheet_directory'). '/supersized/slideshow/theme/supersized.shutter.js', array('jquery'));
	wp_enqueue_style('supersized_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/css/supersized.css');
	wp_enqueue_style('supersized_theme_style', get_bloginfo('stylesheet_directory') .'/supersized/slideshow/theme/supersized.shutter.css');
	
	
	
	
}

		
	

	
	if ( is_page_template('template-profile-page.php') ) {
	wp_enqueue_script('jquery_tmpl_min_js', get_bloginfo('stylesheet_directory'). '/js/jquery.tmpl.min.js', array('jquery'));
	wp_enqueue_script('easing_js', get_bloginfo('stylesheet_directory'). '/js/jquery.easing.1.3.js', array('jquery'));
	wp_enqueue_script('elastislide_js', get_bloginfo('stylesheet_directory'). '/js/jquery.elastislide.js', array('jquery'));
	wp_enqueue_script('gallery_js', get_bloginfo('stylesheet_directory'). '/js/gallery.js', array('jquery'));
	wp_enqueue_style('supersized_theme_elasstyle', get_bloginfo('stylesheet_directory') .'/css/elastislide.css');
	wp_enqueue_style('supersized_theme_reset_style', get_bloginfo('stylesheet_directory') .'/css/galreset.css');
	wp_enqueue_style('supersized_theme_galstyle', get_bloginfo('stylesheet_directory') .'/css/galstyle.css');
	wp_enqueue_style('supersized_theme_demostyle', get_bloginfo('stylesheet_directory') .'/css/demo.css');
	}
	
	/* This will load into all pages */
	
	wp_enqueue_script('common_jquery', get_bloginfo('stylesheet_directory'). '/js/common_jquery.js', array('jquery'));
	
	if ( is_page_template('template-contact.php') ) {
	wp_enqueue_script('jqueryfeatures', get_bloginfo('stylesheet_directory'). '/js/jqueryfeatures.js', array('jquery'));
	}
	
	if ( is_page_template('template-newcontact.php') ) {
	wp_enqueue_script('jqueryfeatures', get_bloginfo('stylesheet_directory'). '/js/jqueryfeatures.js', array('jquery'));
	}

	if ( is_page_template('template-pdf-page.php') ) {
	wp_enqueue_script('pdfscript', get_bloginfo('stylesheet_directory'). '/js/pdfscript.js', array('jquery'));
	wp_enqueue_style('pdfstyles', plugins_url() .'/pdf-portfolio/css/base.css');
	wp_enqueue_style('pdfstyles', plugins_url() .'/pdf-portfolio/css/jPicker-1.1.5.min.css');
	wp_enqueue_script('jqueryui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js', array('jquery'));
	wp_enqueue_style('jqueryUIcss', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
	}
		
}
add_action('wp_print_styles', 'custom_styles');

function digi_sub_childposts($parent_post)
{

// Get all the posts related to the thumbnail month and assign to an array
// which we will then iterate through to get the postID's we can then
// use the funstion to retrieve the attachments using the parent ID.
// also need to do a test to see how many articles to decide how many attachments to pull

global $post;
$tmp_post = $post;

$digi_sub_posts = array();

	$args = array(
				'numberposts' => -1 ,
				'post_type' => 'page',
				'order' => 'ASC' , 
				'orderby' => 'menu_order',
				'post_parent' => $parent_post,
					); 
	
	$digi_subs = get_posts($args);
	$loopcount = 0;
	if ($digi_subs) {
	$nochildren = "Yesy";
	foreach ( $digi_subs as $digi_sub ) {
	
				// echo apply_filters( 'the_title' , $attachment->post_title );
				
			$sub_children = digi_get_childposts($digi_sub->ID);
						
			for ($i_sub_child = 0; $i_sub_child < count($sub_children); ++$i_sub_child) {	
			$digi_sub_posts[$loopcount] = array("postID"=>$sub_children[$i_sub_child]['postID'],
												  "title"=>$sub_children[$i_sub_child]['Title']);
			$loopcount = $loopcount + 1;
			}

				
			
				}
			}
			else
			{
			$nosubs = "Nochilderen";
			}


if (!$digi_sub_posts){
$digi_sub_posts[0]= "failed";
$digi_sub_posts[1] = $digi_parent;
$digi_sub_posts[2] = $nochildren;
}


return $digi_sub_posts;



}





function digi_get_childposts($digi_parent)
{

// Get all the posts related to the thumbnail month and assign to an array
// which we will then iterate through to get the postID's we can then
// use the funstion to retrieve the attachments using the parent ID.
// also need to do a test to see how many articles to decide how many attachments to pull

global $post;
$tmp_post = $post;

$digi_child_posts = array();

	$args = array('numberposts' => -1 ,'post_type' => 'page', 'post_parent' => $digi_parent, 'order' => 'ASC' , 'orderby' => 'menu_order'); 
	
	$digi_children = get_posts($args);
	$loopcount = 0;
	if ($digi_children) {
	$nochildren = "Yesy";
	foreach ( $digi_children as $digi_kid ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
			$digi_child_posts[$loopcount] = array("postID"=>$digi_kid->ID,
												  "title"=>$digi_kid->post_excerpt);
			$loopcount = $loopcount + 1;
				}
			}
			else
			{
			$nochildren = "Nochilderen";
			}


if (!$digi_child_posts){
$digi_child_posts[0] = "failed";
$digi_child_posts[1] = $digi_parent;
$digi_child_posts[2] = $nochildren;
}
return $digi_child_posts;



}

function thumbnail_overview()
{
global $post;
 	$digi_cat =  get_the_category(); 
	$childpost = digi_get_childposts($post->ID);

/* Test code to see what info coming out of function.*/
/*
 echo "Current PostID: ". $post->ID; 

echo "  Success:  " . $childpost[0]['postID'];
echo "  Parent:  " . $childpost[1]['postID'];
echo "  Children:  " . $childpost[2]['postID'];
*/


?>
<div id="thumbgrid-position">
<ul id="thumbgrid-container" class="thumbgrid-container">
<?php

		$i = 0;
		$counter = 1;
		$slidecounter = 1;
		$filmtest = 3;
//			foreach ( $childpost as $children) {

	/*
			$args = array('post_type' => 'attachment' ,'numberposts' => -1, 'post_parent' => $childpost[1]['postID'], 'order' => 'ASC' , 'orderby' => 'menu_order' ); 
				$attachments = get_posts($args);
*/				
				$post_content = get_post($childpost[1]['postID']);
				$content = $post_content->post_content;
				preg_match('/\[gallery.*ids=.(.*).\]/', $content, $ids);
				$array_id = explode(",", $ids[1]);
				
				
				if ($array_id) {
					foreach ( $array_id as $array_ids ) {
					//echo $numofimages = count($attachments);
					// echo apply_filters( 'the_title' , $attachment->post_title );
					$attachment_image = get_post($array_ids);
					$imageloader =  wp_get_attachment_image_src($array_ids,'thumbnail');
					$Captions = $attachment_image->post_excerpt;
					
					
					if ($Captions == 'film') {
					
					$slidecounter = $slidecounter - 1 ; 
					
					$gallery_url = get_attachment_link($array_ids);
					
					} else {
						if($Captions == 'Gif') {
												$gallery_url =  get_attachment_link($array_ids);
						
						} else {
					$gallery_url =  get_permalink($childpost[1]['postID']) . "?slide_id=" .  $slidecounter;
					}
					
					} 
					
					
					//Test to see if photo or video. if video-1 from slidecounter and then retrieve meta for the attachment page.
					?>
					
					<li class="gallery-thumbnail <?php if (!$Captions == 'film'){?> still <?php }?>">
						<?php if ($Captions == 'film'){ ?> <div class="<?php echo "film"; ?>"></div> <?php }  // echo out media type ?>
						<a href="<?php  echo $gallery_url ; ?>"><img src="<?php echo $imageloader[0]; ?>"/></a>
					</li>
					<?php
					$counter++;
					$slidecounter++;
					}
				}
			$i++;
		
					//$slidecounter = 1;
			
			
		
		
	
			
		?> </ul></div><?php
		
		 
}	
function thematic_belowpost() {
    do_action('thematic_belowpost');
} // end thematic_belowpost 
		 
add_action('thematic_belowpost','thumbnail_overview');	 
		 
// $gallery_url =  get_permalink($childpost[$i]['postID']); echo $gallery_url;


// PDF builder form //

function pdf_form()
{
global $post;
 	$digi_cat =  get_the_category(); 
	$childpost = digi_get_childposts($post->ID);

/* Test code to see what info coming out of function.*/
/*
 echo "Current PostID: ". $post->ID; 

echo "  Success:  " . $childpost[0]['postID'];
echo "  Parent:  " . $childpost[1]['postID'];
echo "  Children:  " . $childpost[2]['postID'];
*/


?>
<div id="thumbgrid-position">
<ul id="thumbgrid-container" class="thumbgrid-container">
<?php

		$i = 0;
		$counter = 1;
		$slidecounter = 1;
		$filmtest = 3;
//			foreach ( $childpost as $children) {

	/*
			$args = array('post_type' => 'attachment' ,'numberposts' => -1, 'post_parent' => $childpost[1]['postID'], 'order' => 'ASC' , 'orderby' => 'menu_order' ); 
				$attachments = get_posts($args);
*/				
				$post_content = get_post($childpost[1]['postID']);
				$content = $post_content->post_content;
				preg_match('/\[gallery.*ids=.(.*).\]/', $content, $ids);
				$array_id = explode(",", $ids[1]);
				
				
				if ($array_id) {
					foreach ( $array_id as $array_ids ) {
					//echo $numofimages = count($attachments);
					// echo apply_filters( 'the_title' , $attachment->post_title );
					$attachment_image = get_post($array_ids);
					$imageloader =  wp_get_attachment_image_src($array_ids,'thumbnail');
					$Captions = $attachment_image->post_excerpt;
					$fullsizeimage = wp_get_attachment_image_src($array_ids, 'full');
					
					if ($Captions == 'film') {
					
					$slidecounter = $slidecounter - 1 ; 
					
					$gallery_url = get_attachment_link($array_ids);
					
					} else {
					$gallery_url =  get_permalink($childpost[1]['postID']) . "?slide_id=" .  $slidecounter;
					
					}
					//Test to see if photo or video. if video-1 from slidecounter and then retrieve meta for the attachment page.
					?>
					
					<li class="gallery-thumbnail <?php if (!$Captions == 'film'){?> still <?php }?>">
						<?php if ($Captions == 'film'){ ?> <div class="<?php echo "film"; ?>"></div> <?php }  // echo out media type ?>
					<img class="gal_thumb" id="<?php echo $array_ids ;  ?>" src="<?php echo $imageloader[0]; ?>" >					
					<?php echo '<img src="'.  plugins_url('/pdf-portfolio/icn/check@2x.png' ) . '" class="check">' ?>
					</li>
					<?php
					$counter++;
					$slidecounter++;
					}
				}
			$i++;
		
					//$slidecounter = 1;
			
			
		
		
	
			
		?> </ul>
	</div><?php
		
		 
}	

function insert_pdf_form() {
    do_action('insert_pdf_form');
} // end thematic_belowpost 
		 
add_action('insert_pdf_form','pdf_form');	 


//PDF Builder Form End //


function child_pages(){
global $post;

$mypages = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=desc&parent='.$post->ID);
	$postcounter = count($mypages);
	foreach($mypages as $post) :  setup_postdata($post);
	
		/*
$content = $post->the_post_content;
		if(!$content) // Check for empty page
			continue;
*/
		?><div class="gallery-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('feature_thumb');  ?></a><?php
		
		?>
		</div>
	<?php
	endforeach;
	for ( $counter = $postcounter; $counter <= 39; $counter += 1)
	{
?>	<div class="gallery-thumbnail"></div><?php
	}
}
/* add_action('thematic_belowpost','child_pages'); */

function thematic_belowmenu() {
    do_action('thematic_belowmenu');
} // end thematic_aboveheader


function addThumbnails() {
global $post;
if ( is_page_template('gallery-page.php') ) {
?>
<div id="thumb-container"><div id="gallery-thumbnails"><ul id="thumbnails"><?php
$args = array('post_type' => 'attachment' ,'post_parent' => $post->ID  ); 
			$attachments = get_posts($args);
			$loopcount = 1;
			if ($attachments) {
				foreach ( $attachments as $attachment ) {
				// echo apply_filters( 'the_title' , $attachment->post_title );
				$imageloader =  wp_get_attachment_image_src($attachment->ID,'feature_thumb');
				?>
				<li class="thumbnail-items"><img class="gallery-thumbs<?php if ($loopcount == 1) { echo 'active';} ?>" src="<?php echo $imageloader[0]; ?>" width="75" height="50" alt="<?php echo $template_name ?>"/></li> 
				<?php 
				
				$loopcount = $loopcount + 1;
				}
			}


?></ul></div></div><?php
//end action:
}

}

add_action('thematic_belowheader', 'addThumbnails' ,1); 

if(!function_exists('get_post_top_ancestor_id')){
/**
 * Gets the id of the topmost ancestor of the current page. Returns the current
 * page's id if there is no parent.
 * 
 * @uses object $post
 * @return int 
 */
function get_post_top_ancestor_id(){
    global $post;
    
    if($post->post_parent){
        $ancestors = array_reverse( get_post_ancestors($post->ID));
        if (count($ancestors) < 2) {
            return $post->ID;

        }
        else
        {
	        if ($level == 2 ){
		        return $ancestors [2];
	        }
	        else
	        {
        return $ancestors[1];    
        }
        }
    }
    
    return $post->ID;
}}
/*
* Gets the excerpt of a specific post ID or object
* @param - $post - object/int - the ID or object of the post to get the excerpt of
* @param - $length - int - the length of the excerpt in words
* @param - $tags - string - the allowed HTML tags. These will not be stripped out
* @param - $extra - string - text to append to the end of the excerpt
*/
function robins_get_the_excerpt($post_id) {
  global $post;  
  $save_post = $post;
  $post = get_post($post_id);
  $output = get_the_excerpt();
  $post = $save_post;
  return $output;
}