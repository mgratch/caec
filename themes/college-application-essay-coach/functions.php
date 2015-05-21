<?php
/**
 * College Application Essay Coach functions and definitions
 *
 * @package College Application Essay Coach
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */


if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'college_application_essay_coach_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function college_application_essay_coach_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on College Application Essay Coach, use a find and replace
	 * to change 'college-application-essay-coach' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'college-application-essay-coach', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'college-application-essay-coach' ),
		'footer' => __( 'Footer Menu', 'college-application-essay-coach' ),
		'social' => __( 'Social Links Menu', 'college-application-essay-coach' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
    
     /*
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );
    */

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'college_application_essay_coach_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // college_application_essay_coach_setup
add_action( 'after_setup_theme', 'college_application_essay_coach_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function college_application_essay_coach_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Header Info', 'college-application-essay-coach' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Banner - Left', 'college-application-essay-coach' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Banner - Right', 'college-application-essay-coach' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'college-application-essay-coach' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Promo', 'college-application-essay-coach' ),
		'id'            => 'sidebar-5',
		'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Left', 'college-application-essay-coach' ),
		'id'            => 'sidebar-6',
		'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer Right', 'college-application-essay-coach' ),
		'id'            => 'sidebar-7',
		'description'   => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'college_application_essay_coach_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function college_application_essay_coach_scripts() {
	wp_enqueue_style( 'college-application-essay-coach-style', get_stylesheet_uri() );
	wp_enqueue_style( 'college-application-essay-coach-style-bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'college-application-essay-coach-style-custom', get_template_directory_uri() . '/css/styles.css' );
	wp_enqueue_style( 'college-application-essay-coach-style-animate', get_template_directory_uri() . '/css/animate.css' );
    //wp_enqueue_style( 'college-application-essay-coach-style-font-awesome.min', get_template_directory_uri() . '/css/font-awesome.min.css' );
    //wp_enqueue_style( 'college-application-essay-coach-style-entypo', get_template_directory_uri() . '/css/entypo.css' );
	
    //wp_enqueue_style( 'college-application-essay-coach-style-typicons', 'https://raw.githubusercontent.com/stephenhutchings/typicons.font/master/src/font/typicons.min.css' );

    wp_enqueue_style( 'college-application-essay-coach-style-font-Courgette', 'http://fonts.googleapis.com/css?family=Courgette' );
    wp_enqueue_style( 'college-application-essay-coach-style-font-Raleway', 'http://fonts.googleapis.com/css?family=Raleway' );
	//wp_enqueue_style( 'college-application-essay-coach-style-font-oswald', 'http://fonts.googleapis.com/css?family=Oswald:400,300,700' );

    wp_enqueue_script( 'college-application-essay-coach-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'college-application-essay-coach-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'college-application-essay-coach-bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), FALSE, true );
	//wp_enqueue_script( 'college-application-essay-coach-jquery.easing', get_template_directory_uri() . '/js/jquery.easing.js', array('jquery'), FALSE, true );
	wp_enqueue_script( 'college-application-essay-coach-jquery.sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array('jquery'), FALSE, true );
	wp_enqueue_script( 'college-application-essay-coach-tinynav', get_template_directory_uri() . '/js/tinynav.min.js', array(), FALSE, true );

	//wp_enqueue_script( 'college-application-essay-coach-jquery.isotope', get_template_directory_uri() . '/js/jquery.isotope.min.js', array('jquery'), FALSE, true );
	wp_enqueue_script( 'college-application-essay-coach-jquery.parallax', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js', array('jquery'), FALSE, true );
	//wp_enqueue_script( 'college-application-essay-coach-jquery.magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), FALSE, true );
	//wp_enqueue_script( 'college-application-essay-coach-retina', get_template_directory_uri() . '/js/retina.js', array(), FALSE, true );
	//wp_enqueue_script( 'college-application-essay-coach-respond', get_template_directory_uri() . '/js/respond.min.js', array(), FALSE, true );
	//wp_enqueue_script( 'college-application-essay-coach-scale.fix', get_template_directory_uri() . '/js/scale.fix.js', array(), FALSE, true );
	wp_enqueue_script( 'college-application-essay-coach-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), FALSE, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'college_application_essay_coach_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Custom Admin Styles.
 */
function my_admin_head() {
    global $typenow; 
    if ($typenow=="lwi_service"){
        echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/services-wp-admin.css">';
    }
}

add_action('admin_head', 'my_admin_head');

function team_member_post_class($classes, $class, $post_id) {
    global $post;
    if ($post->post_type == 'lwi_service'||$post->post_type == 'lwi_testimonial') {
        /**** 
            ** Uncomment this to remove classes from post_class()
            ****/

        //$classes[] = 'h-entry';

        /**** 
            ** Uncomment this to remove classes from post_class()
            ****/

        if( ( $key = array_search( 'hentry', $classes ) ) !== false ){
            unset( $classes[$key] );
        }
    }
    return $classes;
}
add_filter('post_class','team_member_post_class',10,3);

add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item) {
    if (in_array('archive-page', $classes)) {
         if (is_archive() && !is_category()) {
            //$classes[] = 'current-menu-item';
        }
    }
    return $classes;
}

add_filter('get_avatar','add_gravatar_class');

function add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='avatar alignleft", $class);
    return $class;
}