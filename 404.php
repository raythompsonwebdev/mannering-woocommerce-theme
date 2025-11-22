<?php

/**
 * *PHP version 8.1
 *
 * 404 page | core/404.php.
 *
 * @category   Error_Page
 * @package    mannering-woocommerce-theme
 * @subpackage Error_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-woocommerce-theme.git
 */
get_header(); ?>

<div id="post-content">

	<section class="error-404 not-found">
		<header class="page-header">
			<h2 class="page-title">
				<?php esc_html_e('Oops! That page can&rsquo;t be found.', 'mannering-woocommerce-theme'); ?>
			</h2>
		</header>

		<div class="page-content">
			<p>
				<?php
				esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mannering-woocommerce-theme');
				?>
			</p>

			<?php
			get_search_form();

			the_widget('WP_Widget_Recent_Posts');
			?>

			<div class="widget widget_categories">
				<h2 class="widget-title">
					<?php esc_html_e('Most Used Categories', 'mannering-woocommerce-theme'); ?>
				</h2>
				<ul>
					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => '',
							'number'     => 10,
						)
					);
					?>
				</ul>
			</div>

			<?php

			/* translators: %1$s: smiley */
			$archive_content = '<p>' . sprintf(esc_html__('Try looking in the monthly archives. %1$s', 'mannering-woocommerce-theme'), convert_smilies(':)')) . '</p>';

			the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content");

			the_widget('WP_Widget_Tag_Cloud');
			?>

		</div>
	</section>

</div>


<?php get_sidebar(); ?>


<?php get_footer(); ?>
