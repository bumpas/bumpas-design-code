<?php
/**
 * bumpas functions and definitions
 *
 * @package bumpas
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'bumpas_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bumpas_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bumpas, use a find and replace
	 * to change 'bumpas' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bumpas', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'blog-thumb', 700, 400, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bumpas' ),
		'work'	  => __('Work Menu', 'bumpas'),
	) );

	// Enable support for Post Formats.
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Change defaul Excerpt ellipses to Read More
	function new_excerpt_more( $more ) {
	return '&hellip; <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'your-text-domain') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );
	
}
endif; // bumpas_setup
add_action( 'after_setup_theme', 'bumpas_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function bumpas_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bumpas' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'bumpas_widgets_init' );

/**
 * Enqueue scripts and styles.
 */

function bumpas_scripts() {
	wp_enqueue_style( 'bumpas-style', get_stylesheet_uri(), array(), null );

	// wp_enqueue_script( 'bumpas-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	//wp_enqueue_script( 'bumpas-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js", false, null);
   	wp_enqueue_script('jquery');

   	wp_enqueue_script( 'bumpas-instafeed', get_template_directory_uri() . '/js/instaheader-min.js', array(), '20140518', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bumpas_scripts' );

//Register work type taxonomy
$labels = array(
    'name'                          => 'Portfolio Types',
    'singular_name'                 => 'Portfolio Type',
    'search_items'                  => 'Search Portfolio Types',
    'popular_items'                 => 'Popular Portfolio Types',
    'all_items'                     => 'All Portfolio Types',
    'parent_item'                   => 'Parent Portfolio Types',
    'edit_item'                     => 'Edit Portfolio Type',
    'update_item'                   => 'Update Portfolio Type',
    'add_new_item'                  => 'Add New Portfolio Type',
    'new_item_name'                 => 'New Portfolio Type',
    'separate_items_with_commas'    => 'Separate portfolio types with commas',
    'add_or_remove_items'           => 'Add or remove portfolio types',
    'choose_from_most_used'         => 'Choose from most used portfolio types'
    );

$args = array(
    'label'                         => 'portfolio-type',
    'labels'                        => $labels,
    'public'                        => true,
    'hierarchical'                  => true,
    'show_ui'                       => true,
    'show_in_nav_menus'             => true,
    'args'                          => array( 'orderby' => 'term_order' ),
    'rewrite'               => array( 'slug' => 'portfolio-type', 'with_front' => false ),
    'query_var'                     => true
);

register_taxonomy( 'portfolio-type', 'portfolio', $args );

//Register custom post type work
register_post_type( 'portfolio',
    array(
        'labels'                => array(
            'name'              => __( 'Portfolios' ),
            'singular_name'     => __( 'Portfolio' )
            ),
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'			=> 5,
        'menu_icon'				=> 'dashicons-portfolio',
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'rewrite'               => array( 'slug' => 'portfolio', 'with_front' => false),
        'has_archive'           => true
    )
);

/**
* Stop images being wrapped in 'p' tags
*/
function filter_ptags_on_images($content){
return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

//Add class to the excerpt
function add_class_to_excerpt($excerpt) {
	return str_replace('<p', '<p class="excerpt"', $excerpt);
}

add_filter('the_excerpt', 'add_class_to_excerpt');



// Remove filters on the content that adds portfolio content to the_content output
remove_filter('the_content', 'tzp_add_portfolio_post_meta');
remove_filter('the_content', 'tzp_add_portfolio_post_media');

/**
 * Add google fonts
*/

function load_fonts() {
    wp_register_style('googleFonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic', array(), '20140210' );
    wp_enqueue_style( 'googleFonts');
}
    
add_action('wp_print_styles', 'load_fonts');

/**
 * Remove admin bar from front-end
*/
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Remove version number
*/
function remove_wp_version() { return ''; }
add_filter('the_generator', 'remove_wp_version');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
