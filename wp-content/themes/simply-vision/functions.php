<?php

/**
 * functions and definitions
 *
 * @package Modern WP Themes
 */
 
/*
 * Loads the Options Panel
 *
 * If you're loading from a child theme use stylesheet_directory
 * instead of template_directory
 */

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';

 /**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'modernwpthemes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function modernwpthemes_setup() {

	// Enable automatic feed links
		add_theme_support( 'automatic-feed-links' );


	/**
	 * Make theme available for translation
	 * Translations can be filed in the /lang/ directory
	 * If you're building a theme based on , use a find and replace
	 * to change '' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'modernwpthemes', get_template_directory() . '/lang' );

	//Custom Background Options
	
	add_theme_support( 'custom-background' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'thumb-small', 70, 70, true );
	add_image_size( 'thumb-full', 650, 300, true );
	add_image_size( 'thumb-medium', 300, 135, true );
	add_image_size( 'thumb-featured', 250, 175, true );
	
	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'main' => __( 'Main Menu', 'modernwpthemes' ),
	) );
}
endif; // Modern WP Themes_setup
add_action( 'after_setup_theme', 'modernwpthemes_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function modernwpthemes_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'modernwpthemes' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Header', 'modernwpthemes' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sub Footer 1', 'modernwpthemes' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sub Footer 2', 'modernwpthemes' ),
		'id'            => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sub Footer 3', 'modernwpthemes' ),
		'id'            => 'sidebar-5',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sub Footer 4', 'modernwpthemes' ),
		'id'            => 'sidebar-6',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',
	) );
}
add_action( 'widgets_init', 'modernwpthemes_widgets_init' );

/**
 * Count the number of footer sidebars to enable dynamic classes for the footer
 *
 * @since  1.0
 */
function modernwpthemes_footer_sidebar_class() {
	$count = 0;

	if ( is_active_sidebar( 'sidebar-3' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-4' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-5' ) )
		$count++;

	if ( is_active_sidebar( 'sidebar-6' ) )
		$count++;

	$class = '';

	switch ( $count ) {
		case '1':
			$class = 'site-extra extra-one';
			break;
		case '2':
			$class = 'site-extra extra-two';
			break;
		case '3':
			$class = 'site-extra extra-three';
			break;
		case '4':
			$class = 'site-extra extra-four';
			break;
	}

	if ( $class )
		echo 'class="' . $class . '"';
}

/**
 * Enqueue scripts and styles
 */
function modernwpthemes_scripts() {
	$protocol = is_ssl() ? 'https' : 'http';
	$query_args = array(
		'family' => 'PT+Sans:400,700',
	);
	wp_enqueue_style( 'fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ) );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ) );
	wp_enqueue_script( 'supersubs', get_template_directory_uri() . '/js/supersubs.js', array( 'jquery' ) );
	wp_enqueue_script( 'settings', get_template_directory_uri() . '/js/settings.js', array( 'jquery' ) );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modernwpthemes_scripts' );

define('modernwpthemes_PATH', get_template_directory() );
/**
 * Custom functions that act independently of the theme templates.
 */
require modernwpthemes_PATH . '/inc/extras.php';

/**
 * Custom template tags for this theme.
 */
require modernwpthemes_PATH . '/inc/template-tags.php';

/**
 * Add social links on user profile page.
 */
require modernwpthemes_PATH . '/inc/user-profile.php';

/**
 * Add custom widgets
 */
require modernwpthemes_PATH . '/inc/custom-widgets.php';

/*  TGM plugin activation
/* ------------------------------------ */
	require_once dirname( __FILE__ ) . '/inc/class-tgm-plugin-activation.php';
	function modernwpthemes_required_plugins() {
		
		// Add the following plugins
		$plugins = array(
			array(
				'name' 				=> 'WP-PageNavi',
				'slug' 				=> 'wp-pagenavi',
				'required'			=> false,
				'force_activation' 	=> false,
				'force_deactivation'=> false,
			),
		);	
		tgmpa( $plugins );
	}
	add_action( 'tgmpa_register', 'modernwpthemes_required_plugins' );

/*  Custom favicon
/* ------------------------------------ */
	function modernwpthemes_favicon() {
		if ( of_get_option('favicon') ) {
			echo '<link rel="shortcut icon" href="'.of_get_option('favicon').'" />'."\n";
		}
	}
	add_filter( 'wp_head', 'modernwpthemes_favicon' );


/*  Theme Options Background Options
/* ------------------------------------ */

add_action('wp_head', 'modernwpthemes_print_customstyles', 1000);
function modernwpthemes_print_customstyles() {
    echo '<style type="text/css">';
    echo '/* Custom style output by Modern WP Themes */';
    modernwpthemes_print_background('header_color', '.site-header');
    modernwpthemes_print_background('footer_widget_color', '.site-extra');
    modernwpthemes_print_background('footer_color', '.site-footer');
   echo '</style>';
}
function modernwpthemes_print_background( $option, $selector ) {
    $bg = of_get_option($option, false);
    if ($bg) {
        $bg_img = $bg['image'] ? 'background-image:url('.$bg['image'].')!important;' : '';
		$bg_repeat = $bg['repeat'] ? 'background-repeat:'.$bg['repeat'].'!important;' : '';
		$bg_position = $bg['position'] ? 'background-position:'.$bg['position'].'!important;' : '';
		$bg_attachment = $bg['attachment'] ? 'background-attachment:'.$bg['attachment'].'!important;' : '';
        $bg_color = $bg['color'] ? 'background-color:'.$bg['color'].'!important;' : ''; 
        if ($bg_img || $bg_repeat || $bg_position || $bg_attachment || $bg_color) {
            echo $selector.' { '.$bg_img.$bg_repeat.$bg_position.$bg_attachment.$bg_color.' }';
        }
    } 
}

/*  Custom css
/* ------------------------------------ */


if  (of_get_option('custom_css') != ''){
		add_action('wp_head', 'modernwpthemes_custom_css');
		function modernwpthemes_custom_css(){
			$output = "\n<style type='text/css'>";

			// custom CSS
			$output .= "\n".htmlspecialchars_decode(of_get_option('custom_css'));
			
			$output .= "\n</style>";
			echo $output;
		}
	}
	
/*  Custom js
/* ------------------------------------ */

	
if  (of_get_option('custom_js') != ''){
		add_action('wp_footer', 'modernwpthemes_custom_js');
		function modernwpthemes_custom_js(){
			$output = "\n <script type='text/javascript'> ";

			// custom JS
			$output .= "\n".htmlspecialchars_decode(of_get_option('custom_js'));
			
			$output .= "\n</script>";
			echo $output;
		}
	}
