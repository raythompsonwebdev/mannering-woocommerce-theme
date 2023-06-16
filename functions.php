<?php

/**
 * *PHP version 8.1
 *
 * Functions  | core/functions.php.
 *
 * @category   Functions
 * @package    mannering-woocommerce-theme
 * @subpackage Functions
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-woocommerce-theme.git
 * @return
 */

?>
<?php

/**
 * Wootheme support function.
 *
 * @return void
 */
function mannering_music_woocommerce_support()
{
	add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mannering_music_woocommerce_support');


/**
 * Set WooCommerce image dimensions upon theme activation.
 *
 * @param array $enqueue_styles register styles.
 */
function jk_dequeue_styles($enqueue_styles)
{
	unset($enqueue_styles['woocommerce-general']);    // Remove the gloss.
	unset($enqueue_styles['woocommerce-layout']);     // Remove the layout.
	unset($enqueue_styles['woocommerce-smallscreen']);    // Remove the smallscreen optimisation.
	return $enqueue_styles;
}
// Remove each style one by one.
add_filter('woocommerce_enqueue_styles', 'jk_dequeue_styles');


if (!defined('CLASHIBES_VERSION')) {
	// Replace the version number of the theme on each release.
	define('CLASHIBES_VERSION', '1.0.0');
}

/**
 * Undocumented function
 *
 * @return void
 */
function my_remove_parent_theme_stuff()
{
	remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
	remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
}
// remove description from category pages.
add_action('after_setup_theme', 'my_remove_parent_theme_stuff', 0);



if (!function_exists('mannering_music_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mannering_music_setup()
	{

		load_theme_textdomain('mannering-woocommerce-theme', get_template_directory() . '/languages');

		// Add block editor styles.
		$font_url = '//https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;600&display=swap';
		add_editor_style(array('css/editor-style.css', str_replace(',', '%2C', $font_url)));
		add_theme_support('editor-styles');

		add_theme_support('automatic-feed-links');

		add_theme_support('title-tag');

		add_theme_support('post-thumbnails');

		// set post thumbnail size.
		set_post_thumbnail_size(150, 150, true);

		// Create three new image sizes.
		add_image_size('featured-image', 783, 9999);
		add_image_size('single-product-image', 200, 200);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main'      => esc_html__('Main', 'mannering-woocommerce-theme'),
				'secondary' => esc_html__('Secondary', 'mannering-woocommerce-theme'),
				'shopper'   => esc_html__('Shopper', 'mannering-woocommerce-theme'),

			)
		);


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

		// Add post formats.
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'mannering_music_custom_background_args',
				array(
					'default-color'          => 'ffffff',
					'default-image'          => get_stylesheet_directory_uri() . '/images/bg.jpg',
					'wp-head-callback'       => '_custom_background_cb',
					'admin-head-callback'    => '',
					'admin-preview-callback' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 90,
				'width'       => 90,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		// Enable block editor styles to match the front end.
		add_theme_support('wp-block-styles');

		// Enable wide alignments in block editor.
		add_theme_support('align-wide');

		// Add support for responsive embedded content.
		add_theme_support('responsive-embeds');

		// Remove feed icon link from legacy RSS widget.
		add_filter('rss_widget_feed_link', '__return_false');
	}
endif;
add_action('after_setup_theme', 'mannering_music_setup');




/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mannering_music_content_width()
{
	$GLOBALS['content_width'] = apply_filters('mannering_music_content_width', 640);
}
add_action('after_setup_theme', 'mannering_music_content_width', 0);

/**
 *
 * Clean up the <head>.
 */
function mannering_music_remove_head_links()
{
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'mannering_music_remove_head_links');

// remove version from rss.
add_filter('the_generator', '__return_empty_string');


if (function_exists('register_block_style')) {
	register_block_style(
		'core/quote',
		array(
			'name'         => 'blue-quote',
			'label'        => __('Blue Quote', 'mannering-woocommerce-theme'),
			'is_default'   => true,
			'inline_style' => '.wp-block-quote.is-style-blue-quote { color: blue; }',
		)
	);
}


/**
 * Google fonts.
 */
function mannering_music_add_google_fonts()
{
	wp_enqueue_style('storefront-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins', '1.1', true);
}
add_action('wp_enqueue_scripts', 'mannering_music_add_google_fonts');

/**
 * Undocumented function
 *
 * @return void
 */
function mannering_load_dashicons_front_end()
{
	wp_enqueue_style('dashicons');
}
// Enqueue the Dashicons script.
add_action('wp_enqueue_scripts', 'mannering_load_dashicons_front_end');


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mannering_music_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'mannering-woocommerce-theme'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'mannering-woocommerce-theme'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'mannering_music_widgets_init');

/**
 * Enqueue style sheets function.
 *
 * @return void
 */
function mannering_music_register_styles()
{
	wp_enqueue_style('mannering-music', get_stylesheet_directory_uri() . '/style.css', false, filemtime(get_template_directory() . '/style.css'), 'all');
}
add_action('wp_enqueue_scripts', 'mannering_music_register_styles');

/**
 * Enqueue scripts.
 */
function mannering_music_scripts()
{
	wp_enqueue_script('mannering-music', get_stylesheet_directory_uri() . '/js/index.js', array('jquery'), filemtime(get_template_directory() . '/style.css'), false);

	// wp_enqueue_script('mannering_music-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array(), filemtime(get_template_directory() . '/style.css'), false);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}

	/**
	 * Load the html5 scripts.
	 *  */

	$conditional_scripts = array(
		'html5shiv'   => get_stylesheet_directory_uri() . '/js/old-browser-scripts/html5shiv.min.js',
		'respond'     => get_stylesheet_directory_uri() . '/js/old-browser-scripts/Respond-master/dest/respond.src.js',
		'selectivizr' => get_stylesheet_directory_uri() . '/js/old-browser-scripts/selectivizr-min.js',
	);

	foreach ($conditional_scripts as $handle => $src) {

		wp_enqueue_script($handle, $src, array(), '1.0', false);
	}
	add_filter(
		'script_loader_tag',
		function ($tag, $handle) use ($conditional_scripts) {

			if (array_key_exists($handle, $conditional_scripts)) {
				$tag = '<!--[if (lte IE 8) & (!IEMobile)]>' . $tag . '<![endif]-->' . "\n";
			}
			return $tag;
		},
		10,
		2
	);
}
add_action('wp_enqueue_scripts', 'mannering_music_scripts');


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
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/woocommerce/woocommerce.php';
}
