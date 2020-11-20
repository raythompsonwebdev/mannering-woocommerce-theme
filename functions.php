<?php
/**
 * *PHP version 7
 *
 * Functions  | core/functions.php.
 *
 * @category   Functions
 * @package    mannering_music
 * @subpackage Functions
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 * @return
 */

?>
<?php

/**
* Wootheme support function
*/
function mannering_music_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mannering_music_woocommerce_support' );

/**
 * Set WooCommerce image dimensions upon theme activation
 */
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}

// Or just remove them all in one line
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string Filtered title.
 */
function mannering_music_filter_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html( 'Page %s', 'mannering_music' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'mannering_music_filter_wp_title', 10, 2 );

// /**
//  * Wootheme support function
//  */
function woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );


if ( ! function_exists( 'mannering_music_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mannering_music_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mannering_music, use a find and replace
		 * to change 'mannering_music' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mannering_music', get_template_directory() . '/languages' );

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

		// set post thumbnail size.
		set_post_thumbnail_size( 100, 100, true );

		// Create three new image sizes.
		add_image_size( 'featured-image', 783, 9999 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'shopper'   => esc_html__( 'Shopper', 'mannering_music' ),		

			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
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

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mannering_music_custom_background_args',
				array(
					'default-color'          => 'ffffff',
					'default-image'          => get_stylesheet_directory_uri() . '/assets/images/bg.jpg',
					'wp-head-callback'       => '_custom_background_cb',
					'admin-head-callback'    => '',
					'admin-preview-callback' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
	}
endif;
add_action( 'after_setup_theme', 'mannering_music_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mannering_music_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mannering_music_content_width', 640 );
}
add_action( 'after_setup_theme', 'mannering_music_content_width', 0 );

/**
 *
 * Clean up the <head>.
 */
function mannering_music_remove_head_links() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
}
add_action( 'init', 'mannering_music_remove_head_links' );

// Remove action.
remove_action( 'wp_head', 'wp_generator' );

/**
 * Google fonts.
 */
function mannering_music_add_google_fonts() {
	wp_enqueue_style( 'storefront-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins','1.1', false );
}
add_action( 'wp_enqueue_scripts', 'mannering_music_add_google_fonts' );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mannering_music_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mannering_music' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mannering_music' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mannering_music_widgets_init' );

/**
	 * Enqueue style sheets function.
	 *
	 * @return void
	 */
	function mannering_music_register_styles() {

		wp_enqueue_style( 'mannering-music', get_stylesheet_directory_uri() . '/style.css',false, '1.1', 'all' );
	
		wp_enqueue_style( 'woocommerce-css', get_stylesheet_directory_uri() . '/woocommerce/woocommerce.css', false, '1.1', 'all' );
	
		wp_enqueue_style( 'bx-slider', get_stylesheet_directory_uri() . '/assets/js/bxslider-4-master/jquery.bxslider.css', false, '1.1', 'all' );
	
		wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/fonts/fontawesome/css/font-awesome.min.css', false, '1.1', 'all' );
	
	}
		add_action( 'wp_enqueue_scripts', 'mannering_music_register_styles' );

/**
 * Enqueue scripts.
 */
function mannering_music_scripts() {
	

	wp_enqueue_script( 'mannering-music', get_stylesheet_directory_uri() . '/assets/js/index.js', array( 'jquery' ), '20161110', true );

	wp_enqueue_script( 'mannering_music-navigation', get_stylesheet_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );

	}

	/**
	 * Load the html5 scripts.
	 *  */

	$conditional_scripts = array(
		'html5shiv'   => get_stylesheet_directory_uri() . '/js/old-browser-scripts/html5shiv.min.js',
		'respond'     => get_stylesheet_directory_uri() . '/js/old-browser-scripts/Respond-master/dest/respond.src.js',
		'selectivizr' => get_stylesheet_directory_uri() . '/js/old-browser-scripts/selectivizr-min.js',
	);

	foreach ( $conditional_scripts as $handle => $src ) {

		wp_enqueue_script( $handle, $src, array(), '1.0', false );
	}
	add_filter(
		'script_loader_tag',
		function( $tag, $handle ) use ( $conditional_scripts ) {

			if ( array_key_exists( $handle, $conditional_scripts ) ) {
				$tag = '<!--[if (lte IE 8) & (!IEMobile)]>' . $tag . '<![endif]-->' . "\n";
			}
			return $tag;
		},
		10,
		2
	);
}
add_action( 'wp_enqueue_scripts', 'mannering_music_scripts' );

/**
 * Front page script function.
 *
 * @return void
 */
function mannering_music_front_scripts() {

	if ( is_front_page() ) {

		wp_enqueue_script( 'bx-slider', get_stylesheet_directory_uri() . '/assets/js/bxslider-4-master/jquery.bxslider.min.js', array( 'jquery' ), '20161110', true );
		wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), '20161110', true );

	}
}
		add_action( 'wp_enqueue_scripts', 'mannering_music_front_scripts' );

/**
	 * Audio Page functions.
	 *
	 * @return void
	 */
function mannering_music_audio_scripts() {

if ( is_page( 'audio' ) ) {
wp_enqueue_script( 'tabs', get_stylesheet_directory_uri() . '/assets/js/tabs.js', array( 'jquery' ), '20161110', true );

wp_enqueue_script( 'audio', get_stylesheet_directory_uri() . '/assets/js/audio-script.js', array( 'jquery' ), '1.1', true );

}
}
add_action( 'wp_enqueue_scripts', 'mannering_music_audio_scripts' );


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	//require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * Load WooCommerce compatibility file.
 */
// if ( class_exists( 'WooCommerce' ) ) {
// 	require get_stylesheet_directory_uri() . '/woocommerce/woocommerce.php';
// }
