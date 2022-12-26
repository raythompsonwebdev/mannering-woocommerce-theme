<?php

/**
 * *PHP version 7
 *
 * Category page | core/category.php.
 *
 * @category   Category_Page
 * @package    Mannering Storefront Child Theme
 * @subpackage Category_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */
get_header(); ?>


<div id="post-content">

	<?php if ( have_posts() ) : ?>

		<?php /* If this is a category archive */ if ( is_category() ) { ?>

			<h2>Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>

			<?php
			/* If this is a tag archive */
		} elseif ( is_tag() ) {
			?>
			<h2>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>

			<?php
			/* If this is a daily archive */
		} elseif ( is_day() ) {
			?>
			<h2>Archive for <?php the_time( get_option( 'F, Js, Y' ) ); ?></h2>

			<?php
			/* If this is a monthly archive */
		} elseif ( is_month() ) {
			?>
			<h2>Archive for <?php the_time( get_option( 'F, Y' ) ); ?></h2>

			<?php
			/* If this is a yearly archive */
		} elseif ( is_year() ) {
			?>
			<h2>Archive for <?php the_time( get_option( 'Y' ) ); ?></h2>

			<?php
			/* If this is an author archive */
		} elseif ( is_author() ) {
			?>
			<h2>Author Archive</h2>

			<?php
			/* If this is a paged archive */
		} elseif ( is_category() ) {
			?>

			<h2>Blog <?php the_title(); ?></h2>

		<?php } ?>


		<?php
		while ( have_posts() ) :
			the_post();
			?>


			<?php get_template_part( 'template-parts/content', get_post_format() ); ?>


		<?php endwhile; ?>

		<?php the_posts_navigation(); ?>

	<?php else : ?>

		<?php get_template_part( 'template-parts/content', 'none' ); ?>

	<?php endif; ?>


</div>

<!--main-end-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
