<?php

/**
 * *PHP version 8.1
 *
 * The template for displaying search results
 *
 * Search page | core/search.php.
 *
 * @category   Search_Page
 * @package    mannering-woocommerce-theme
 * @subpackage Search_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-woocommerce-theme.git
 */
get_header(); ?>

<div id="post-content">

	<?php if (have_posts()) : ?>

		<header class="page-header">
			<h2 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf(esc_html__('Search Results for: %s', 'mannering-woocommerce-theme'), '<span>' . get_search_query() . '</span>');
				?>
			</h2>
		</header>

		<?php
		/* Start the Loop */
		while (have_posts()) :

			the_post();

			get_template_part('template-parts/content', 'search');

		endwhile;

		the_posts_navigation();
		?>

	<?php
	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</div>

<?php
get_sidebar();
get_footer();
