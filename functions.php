<?php
/**
 * Geniuscourses functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Geniuscourses
 */


function geniuscourses_enqueue_scripts(){
  wp_enqueue_style('geniuscourses-general', get_template_directory_uri().'/assets/css/general.css', array(), '1.0', 'all');
//   if(is_singular()){
  wp_enqueue_script('geniuscourses-script', get_template_directory_uri().'/assets/js/script.js', array(), '1.0', true);

//   wp_enqueue_script('thickbox');
//   }
//   wp_register_style('geniuscourses-general');
//   wp_register_script('geniuscourses-script');

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}
}
add_action('wp_enqueue_scripts','geniuscourses_enqueue_scripts');
 
function geniuscourses_show_meta(){
	echo "<meta name='author' content='CRIK0VA' >"; 
}

add_action('wp_head','geniuscourses_show_meta');


function geniuscourses_register_post_type(){
	$args = array(
       'label' => esc_html__('Cars','geniuscourses'),
	   'labels' => array(
	   'name'                  => esc_html_x( 'Cars', 'Post type general name', 'geniuscourses' ),
	   'singular_name'         => esc_html_x( 'Car', 'Post type singular name', 'geniuscourses' ),
	   'menu_name'             => esc_html_x( 'Cars', 'Admin Menu text', 'geniuscourses' ),
	   'name_admin_bar'        => esc_html_x( 'Car', 'Add New on Toolbar', 'geniuscourses' ),
	   'add_new'               => esc_html__( 'Add New', 'geniuscourses' ),
	   'add_new_item'          => esc_html__( 'Add New Car', 'geniuscourses' ),
	   'new_item'              => esc_html__( 'New Car', 'geniuscourses' ),
	   'edit_item'             => esc_html__( 'Edit Car', 'geniuscourses' ),
	   'view_item'             => esc_html__( 'View Car', 'geniuscourses' ),
	   'all_items'             => esc_html__( 'All Cars', 'geniuscourses' ),
	   'search_items'          => esc_html__( 'Search Cars', 'geniuscourses' ),
	   'parent_item_colon'     => esc_html__( 'Parent Cars:', 'geniuscourses' ),
	   'not_found'             => esc_html__( 'No Cars found.', 'geniuscourses' ),
	   'not_found_in_trash'    => esc_html__( 'No Cars found in Trash.', 'geniuscourses' ),
	   'featured_image'        => esc_html_x( 'Car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'geniuscourses' ),
	   'set_featured_image'    => esc_html_x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'geniuscourses' ),
	   'remove_featured_image' => esc_html_x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'geniuscourses' ),
	   'use_featured_image'    => esc_html_x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'geniuscourses' ),
	   'archives'              => esc_html_x( 'Car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'geniuscourses' ),
	   'insert_into_item'      => esc_html_x( 'Insert into Car', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'geniuscourses' ),
	   'uploaded_to_this_item' => esc_html_x( 'Uploaded to this Car', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'geniuscourses' ),
	   'filter_items_list'     => esc_html_x( 'Filter Cars list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'geniuscourses' ),
	   'items_list_navigation' => esc_html_x( 'Cars list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'geniuscourses' ),
	   'items_list'            => esc_html_x( 'Cars list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'geniuscourses' ),
	), 
	 'support' => array('title','editor','author','thumbnail'),
	 'public' => true,
	 'publicly_queryable' => true,
	 'show_ui' => true,
	 'show_in_menu' => true,
	 'has_archive' =>true,
	 'show_in_nav_menus' => false,
	 'show_in_admin_bar' => false,
	   );
register_post_type('car',$args);
}
add_action('init','geniuscourses_register_post_type');






// function geniuscourses_body_class($classes){

// 	if(is_front_page()){
// 	$classes[] ='main_class';
// 	} else if(is_singular()){
// 	$classes[] ='extra_class';
//     }
// 	return $classes;
// }
// add_filter('body_class', 'geniuscourses_body_class');


function geniuscourses_theme_init(){
	register_nav_menus(array(
		'header_nav' => 'Header Navigation',
		'footer_nav' => 'Footer Navigation'
	));
		add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	load_theme_textdomain('geniuscourses', get_template_directory().'/lang');
}
add_action('after_setup_theme','geniuscourses_theme_init',0);




if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function geniuscourses_setup() {


	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );





	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'geniuscourses_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'geniuscourses_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function geniuscourses_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'geniuscourses_content_width', 640 );
}
add_action( 'after_setup_theme', 'geniuscourses_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function geniuscourses_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'geniuscourses' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'geniuscourses' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'geniuscourses_widgets_init' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

