<?php

/**
 * *PHP version 8.1
 *
 * Archive page | core/archive.php.
 *
 * @category   Archive_Page
 * @package    mannering-woocommerce-theme
 * @subpackage Archive_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-woocommerce-theme.git
 */
get_header(); ?>


<div id="post-content">

	<?php
	if (have_posts()) :
	?>

		<header class="page-header">
			<?php
			the_archive_title('<h2 class="page-title">', '</h2>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
		</header><!-- .page-header -->

	<?php
		/* Start the Loop */
		while (have_posts()) :
			the_post();

			/*
			* Include the Post-Format-specific template for the content.
			* If you want to override this in a child theme, then include a file
			* called content-___.php (where ___ is the Post Format name) and that will be used instead.
			*/
			get_template_part('template-parts/content', get_post_format());

		endwhile;

		the_posts_navigation();

	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</div><!-- #main -->


<?php
get_sidebar();
get_footer();
