<?php
/**
 * *PHP version 5
 *
 * * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Page | core/page.php.
 *
 * @category   Page
 * @package    Mannering Storefront Child Theme
 * @subpackage Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */

 get_header(); ?>
		
		<main id="main_text" class="site-main" role="main">

            <h1 ><?php the_title(); ?></h1>

			<?php if (have_posts()) :
					//while (have_posts()) :
						the_post(); 

				get_template_part( 'template-parts/content', 'page' );


				//endwhile;

			endif; ?>

		</main><!-- #main -->


<?php get_footer(); ?>
