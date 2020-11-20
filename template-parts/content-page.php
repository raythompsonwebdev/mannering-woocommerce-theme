<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mannering_music
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if (is_woocommerce()) : ?>

					<div class="entry-content">
		
						<?php the_content(); ?>
		
					</div>
					
					<?php else : ?>
					
					<div class="entry-content">
		
						<?php the_content(); ?>
		
					</div>
						
				<?php endif; ?>

		</article>
