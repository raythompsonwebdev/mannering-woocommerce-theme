<?php

/**
 * *PHP version 8.1
 *
 * Index page | core/index.php.
 *
 * * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @category   Index_Page
 * @package    mannering-woocommerce-theme
 * @subpackage Index_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-woocommerce-theme.git
 */
get_header(); ?>

<div id="post-content">

	<?php
	if (have_posts()) :

		if (is_home() && !is_front_page()) :
	?>

			<header>
				<h1 class="page-title screen-reader-text">
					<?php single_post_title(); ?>
				</h1>
			</header>

		<?php
		endif;

		/* Start the Loop */
		while (have_posts()) :
			the_post();

			get_template_part('template-parts/content', get_post_format());

		endwhile;

		the_posts_navigation();
		?>

	<?php else : ?>

	<?php
		get_template_part('template-parts/content', 'none');

	endif;
	?>

</div>



<?php

get_sidebar();


get_footer();
