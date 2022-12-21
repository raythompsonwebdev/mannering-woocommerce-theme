<?php

/**
 * *PHP version 5
 *
 * Template Name: About
 *
 * About page | core/page-about.php.
 *
 * @category   About_Page
 * @package    Mannering Storefront Child Theme
 * @subpackage About_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */

get_header(); ?>


<main id="main_text">

	<h2 class="content-header">
		<?php the_title(); ?>
	</h2>

	<?php get_template_part('template-parts/content', 'page'); ?>

</main>

<?php get_footer(); ?>
