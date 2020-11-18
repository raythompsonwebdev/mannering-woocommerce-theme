<?php
/**
 * *PHP version 7
 *
 * Index page | core/index.php.
 *
 * * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @category   Index_Page
 * @package    mannering_music
 * @subpackage Index_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */
get_header(); ?>
<main id="main_text" class="site-main">

<?php
if ( have_posts() ) :

	if ( is_home() && ! is_front_page() ) :
		?>
	 <header>
		<h1 class="page-title screen-reader-text">
		<?php single_post_title(); ?>
				</h1>
	 </header>

		<?php
	endif;

	/* Start the Loop */
	while ( have_posts() ) :
		the_post();

		/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		get_template_part( 'template-parts/content', get_post_format() );

	endwhile;

	the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main><!-- #main -->



<?php
get_sidebar();
get_footer();
