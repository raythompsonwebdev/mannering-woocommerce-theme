<?php
/**
 * *PHP version 5
 *
 * The template for displaying single pages
 *
 * Single page | core/single.php.
 *
 * @category   Single_Page
 * @package    Mannering Storefront Child Theme
 * @subpackage Single_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */
 get_header(); ?>


<!--Content box-->
  
<main id="main_text" role="main" >
</main>
	<!--main-end-->
single
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				?>

				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
				  
					<?php get_template_part( 'template-parts/content', 'meta' ); ?>
					
					<div class="entry">
						<?php the_content(); ?>
					</div>

					<div class="postmetadata">
						<?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
						Posted in <?php the_category( ', ' ); ?> | 
						<?php comments_popup_link( 'No Comments &#187;', '1 Comment &#187;', '% Comments &#187;' ); ?>
					</div>

				</div>

					<?php endwhile; ?>

			<?php get_template_part( 'template-parts/content', 'nav' ); ?>

		<?php else : ?>

			<h2><?php esc_html_e( 'Not Found', 'mannering-storefront-child-theme' ); ?></h2>

		<?php endif; ?>
		
		<div class="group"></div>
		
		<?php comments_template(); ?>
		


<!--Content End-->
<?php get_sidebar(); ?>

<?php get_footer(); ?>
