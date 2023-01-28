<?php

/**
 * *PHP version 8.1
 *
 * The template for displaying single post
 *
 * Single | core/singler.php.
 *
 * @category   Single
 * @package    mannering-woocommerce-theme
 * @subpackage Single Blog
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-woocommerce-theme.git
 */

get_header();
?>

<div id="post-content">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', get_post_type());

		the_post_navigation(
			array(
				'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'mannering-woocommerce-theme') . '</span> <span class="nav-title">%title</span>',
				'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'mannering-woocommerce-theme') . '</span> <span class="nav-title">%title</span>',
			)
		);

		// If comments are open or we have at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</div>

<?php
get_sidebar();
get_footer();
