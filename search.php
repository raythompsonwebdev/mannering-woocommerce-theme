<?php

/**
 * *PHP version 7
 *
 * The template for displaying search results
 *
 * Search page | core/search.php.
 *
 * @category   Search_Page
 * @package    mannering_music
 * @subpackage Search_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */
get_header(); ?>

<div id="post-content">

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h2 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search Results for: %s', 'mannering_music' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h2>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'search' );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</div><!-- #main -->

<?php
get_sidebar();
get_footer();
