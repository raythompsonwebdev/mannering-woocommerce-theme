<?php
/**
 * *PHP version 7
 *
 * Archive page | core/archive.php.
 *
 * @category   Archive_Page
 * @package    mannering_music
 * @subpackage Archive_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */
get_header(); ?>


<main id="main_text" role="main" >

<?php
if ( have_posts() ) :
	?>

<header class="page-header">
	<?php
	the_archive_title( '<h1 class="page-title">', '</h1>' );
	the_archive_description( '<div class="archive-description">', '</div>' );
	?>
</header><!-- .page-header -->

	<?php
	/* Start the Loop */
	while ( have_posts() ) :
		the_post();

		/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		get_template_part( 'template-parts/content', get_post_format() );

endwhile;

	the_posts_navigation();

else :

	get_template_part( 'template-parts/content', 'none' );

endif;
?>

</main><!-- #main -->


<?php
get_sidebar();
get_footer();
