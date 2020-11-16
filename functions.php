<?php
/**
 * *PHP version 7
 *
 * Functions  | core/functions.php.
 *
 * @category   Functions
 * @package    Mannering Storefront Child Theme
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
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string Filtered title.
 */
function mannering_storefront_child_filter_wp_title( $title, $sep ) {
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
		$title = "$title $sep " . sprintf( esc_html( 'Page %s', 'mannering-storefront-child-theme' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'mannering_storefront_child_filter_wp_title', 10, 2 );

/**
 * Dequeue the Parent Theme styles.
 *
 * Hooked to the wp_enqueue_scripts action, with a late priority (100),
 * so that it runs after the parent style was enqueued.
 */
function give_dequeue_plugin_css() {
	wp_dequeue_style( 'storefront-woocommerce-style' );
	wp_dequeue_style( 'storefront-style' );
	//wp_deregister_style( 'storefront-icons' );
	//wp_deregister_style( 'storefront-fonts' );
}
add_action( 'wp_enqueue_scripts', 'give_dequeue_plugin_css', 100 );

/**
* Remove woocommerce style one by one.
*
* @param array $enqueue_styles Enqueing woocommerce styles.
*/
function mannering_storefront_child_dequeue_styles( $enqueue_styles ) {
	/**
	 * Remove the gloss.
	 * unset( $enqueue_styles['woocommerce-general'] );.
	 */
	unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss.
	unset( $enqueue_styles['woocommerce-layout'] );      // Remove the layout.
	unset( $enqueue_styles['woocommerce-smallscreen'] ); // Remove the smallscreen.optimisation.
	return $enqueue_styles;
 }
 // Add filter.
 add_filter( 'woocommerce_enqueue_styles', 'mannering_storefront_child_dequeue_styles' );


if ( ! function_exists( 'mannering_storefront_child_setup' ) ) :

	/**
	 * Theme setup function.
	 *
	 * @return void
	 */
	function mannering_storefront_child_setup() {

		// Add RSS links to <head> section.
		add_theme_support( 'automatic-feed-links' );

		// add editor styles.
		add_editor_style( 'css/custom-editor-style.css' );

		// theme support.
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'caption', 'search-form' ) );

		add_theme_support( 'title-tag' );

		// thumbnail support.
		add_theme_support( 'post-thumbnails' );

		// set post thumbnail size.
		set_post_thumbnail_size( 100, 100, true );

		// Create three new image sizes.
		add_image_size( 'featured-image', 783, 9999 );

		// Add Theme support Custom logo.
		add_theme_support(
			'custom-logo', array(
				'width'       => 96,
				'height'      => 96,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add Theme support Custom Header.
		add_theme_support(
			'custom-header', apply_filters(
				'mannering_storefront_child_custom_header_args', array(
					'default-image'          => '',
					'default-text-color'     => 'ffffff',
					'width'                  => 1600,
					'height'                 => 420,
					'flex-height'            => true,
					'wp-head-callback'       => 'mannering_storefront_child_header_style',
					//'admin-head-callback'    => 'mannering_storefront_child_admin_header_style',
					//'admin-preview-callback' => 'mannering_storefront_child_admin_header_image',
				)
			)
		);

		/**
	 * Styles the header image and text displayed on the blog
	 *
	 * @see mannering_storefront_child_custom_header_setup().
	 */
		function mannering_storefront_child_header_style() {

			$header_text_color = get_header_textcolor();

			// If no custom options for text are set, let's bail
			// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
			if ( add_theme_support( 'custom-header' ) === $header_text_color ) {
				return;
			}

			// If we get this far, we have custom styles. Let's do this.
			?>
			
				<style type='text/css'>

					<?php if ( ! display_header_text() ) : ?>

					.site-title,
					.site-description {
						position: absolute;
						clip: rect(1px, 1px, 1px, 1px);
					}
						<?php	else : ?>

					.site-title a,
					.site-description {
						color: #<?php echo esc_attr( $header_text_color ); ?>
					}

					<?php endif; ?>

				</style>

			<?php
		}
			
		// Add Theme support Custom background.
		$defaults = array(
			'default-color'          => '',
			'default-image'          => get_stylesheet_directory_uri() . '/images/bg.jpg',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'custom-background', $defaults );

		// Add Theme support nav menus.
		$nav_links = array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => true,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		add_theme_support( 'nav-menus', $nav_links );

		// Add Theme support links.
		$links = array(
			'before'           => '<p>' . __( 'Pages:', 'mannering-storefront-child-theme' ),
			'after'            => '</p>',
			'link_before'      => '',
			'link_after'       => '',
			'next_or_number'   => 'number',
			'separator'        => ' ',
			'nextpagelink'     => __( 'Next page', 'mannering-storefront-child-theme' ),
			'previouspagelink' => __( 'Previous page', 'mannering-storefront-child-theme' ),
			'pagelink'         => '%',
			'echo'             => 1,
		);
		wp_link_pages( $links );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Check if register sidebar function exists.
		if ( function_exists( 'register_sidebar' ) ) {

			add_action( 'widgets_init', 'mannering_storefront_child_widgets_init' );
			/**
			 *
			 * Sidebar Function!
			 */
			function mannering_storefront_child_widgets_init() {
				register_sidebar(
					array(
						'name'          => __( 'Primary Sidebar', 'mannering-storefront-child-theme' ),
						'id'            => 'primary-widget-area',
						'description'   => __( 'The primary widget area', 'mannering-storefront-child-theme' ),
						'before_widget' => '<article class="side-bar-box">',
						'after_widget'  => '</article>',
						'before_title'  => '<h2>',
						'after_title'   => '</h2>',
					)
				);
			}
		}

	}

endif;
add_action( 'after_setup_theme', 'mannering_storefront_child_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mannering_storefront_child_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mannering_storefront_child_content_width', 640 );
}
add_action( 'after_setup_theme', 'mannering_storefront_child_content_width', 0 );

/**
 *
 * Clean up the <head>.
 */
function mannering_storefront_child_remove_head_links() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
}
add_action( 'init', 'mannering_storefront_child_remove_head_links' );

// Remove action.
remove_action( 'wp_head', 'wp_generator' );

/**
 * Google fonts.
 */
function mannering_storefront_child_add_google_fonts() {
	wp_enqueue_style( 'storefront-google-fonts', 'https://fonts.googleapis.com/css?family=Poppins', false );
}
add_action( 'wp_enqueue_scripts', 'mannering_storefront_child_add_google_fonts' );


/**
 * Setup My Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function mannering_storefront_child_setup() {
	load_child_theme_textdomain( 'mannering-storefront-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'mannering_storefront_child_setup' );

/**
 * Enqueue Global scripts function.
 *
 * @return void
 */
function mannering_storefront_child_scripts_own() {

	wp_enqueue_script( 'mannering-storefront-child-index', get_stylesheet_directory_uri() . '/js/index.js', array( 'jquery' ), '20161110', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/**
	 * Load the html5.
	 *  */

	$conditional_scripts = array(
		'html5shiv'   => get_stylesheet_directory_uri() . '/js/old-browser-scripts/html5shiv.min.js',
		'respond'     => get_stylesheet_directory_uri() . '/js/old-browser-scripts/Respond-master/dest/respond.src.js',
		'selectivizr' => get_stylesheet_directory_uri() . '/js/old-browser-scripts/selectivizr-min.js',
	);

	foreach ( $conditional_scripts as $handle => $src ) {

		wp_enqueue_script( $handle, $src, array(), '', false );
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
add_action( 'wp_enqueue_scripts', 'mannering_storefront_child_scripts_own' );


	/**
	 * Enqueue style sheets function.
	 *
	 * @return void
	 */
function mannering_storefront_child_register_styles() {

	$parent_style = 'mannering-storefront-child-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

	//wp_enqueue_style( 'bx-slider', get_stylesheet_directory_uri() . '/js/bxslider-4-master/jquery.bxslider.css', false, '1.1', 'all' );
	wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/fonts/fontawesome/css/font-awesome.min.css', false, '1.1', 'all' );

}
	add_action( 'wp_enqueue_scripts', 'mannering_storefront_child_register_styles' );

	/**
	 * Front page script function.
	 *
	 * @return void
	 */
function mannering_storefront_child_front_scripts() {

	if ( is_front_page() ) {

		//wp_enqueue_script( 'bx-slider', get_stylesheet_directory_uri() . '/js/bxslider-4-master/jquery.bxslider.min.js', array( 'jquery' ), '20161110', true );
		wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '20161110', true );

	}
}
	add_action( 'wp_enqueue_scripts', 'mannering_storefront_child_front_scripts' );

	/**
	 * Audio Page functions.
	 *
	 * @return void
	 */
// function mannering_storefront_child_audio_scripts() {

// 	if ( is_page( 'audio' ) ) {
// 		wp_enqueue_script( 'tabs', get_stylesheet_directory_uri() . '/js/tabs.js', array( 'jquery' ), '20161110', true );

// 		wp_enqueue_script( 'audio', get_stylesheet_directory_uri() . '/js/audio-script.js', array( 'jquery' ), '1.1', true );

// 	}
// }
// 	add_action( 'wp_enqueue_scripts', 'mannering_storefront_child_audio_scripts' );

	/**
	 * Read more button function.
	 *
	 * @param array $output excerpt link array.
	 */
function mannering_storefront_child_excerpt_read_more_link( $output ) {
	global $post;
	return $output . '<br/><a href="' . get_permalink( $post->ID ) . '" class="read_more">Read More</a>';
}
add_filter( 'the_excerpt', 'mannering_storefront_child_excerpt_read_more_link' );

	/**
	 * Register my menu function.
	 *
	 * @return void
	 */
function register_my_menu() {
	register_nav_menus(
		array(
			'main'      => 'Main Nav',
			'Secondary' => 'Secondary',
			'shopper'   => 'shopper',
		)
	);
}
	add_action( 'init', 'register_my_menu' );


/**
 * Summary Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/custom-header.php';

// /**
//  * Summary Custom template tags for this theme.
//  */
//require get_template_directory() . '/inc/template-tags.php';

// /**
//  * Summary Functions which enhance the theme by hooking into WordPress.
//  */
//require get_template_directory() . '/inc/template-functions.php';

// /**
//  * Summary Customizer additions.
//  */
//require get_template_directory() . '/inc/customizer.php';

// /**
//  * Summary Load Jetpack compatibility file.
//  */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	include get_template_directory() . '/inc/jetpack.php';
// }

// /**
//  * Summary Map additions.
//  */
// // require get_template_directory() . '/inc/map-function.php';

// /**
//  * Wootheme support function
//  */
// function woocommerce_support() {
// 	add_theme_support( 'woocommerce' );
// }
// add_action( 'after_setup_theme', 'woocommerce_support' );



// add_filter('woocommerce_email_styles', 'mannering_music_email_styles');
// function mannering_music_email_styles($css){
// 	$css .= "#template-header{background-color:#231f20;}";
// 	return $css;
// }






