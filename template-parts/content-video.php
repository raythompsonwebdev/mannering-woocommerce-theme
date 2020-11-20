<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mannering-storefront-child-theme.
 */

?>

<section id="sidebar_gallery"  >

  <?php
	$params   = array(
		'posts_per_page' => 6,
		'post_type'      => 'product',
		'product_cat'    => 'hip-hop',
	);
	$wc_query = new WP_Query( $params );
	?>

  <!--hip hop videos-->
  <h1>Hip Hop Music Videos</h1>

	<?php if ( $wc_query->have_posts() ) : ?>

		<?php
		while ( $wc_query->have_posts() ) :
			$wc_query->the_post();
			?>

	  <figure class="project-item">
			<?php if ( has_post_thumbnail() ) { ?>
							  
		  <a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'featured-image' ); ?>
		  </a>
							  
		<?php } else { ?>

		  <a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail(); ?>
		  </a>
							  
		<?php } ?>

		<figcaption class="overlay">
		  <p class="artist_name"><?php the_title(); ?></p>
		  <h4>
			<a class="fancybox fancybox.iframe" href="" alt="link-to-music-video-on-you-tube">See Video</a>
		  </h4>
		</figcaption>

	  </figure>

	<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'No Products', 'mannering-storefront-child-theme' ); ?></p>
	<?php endif; ?>
	<br/>

  <!--Country Music videos-->
  <h1>Country Music Videos</h1>

	<?php
	  $params = array(
		  'posts_per_page' => 6,
		  'post_type'      => 'product',
		  'product_cat'    => 'country',

	  );
	  $wc_query = new WP_Query( $params );
		?>
	<?php if ( $wc_query->have_posts() ) : ?>
		<?php
		while ( $wc_query->have_posts() ) :
			$wc_query->the_post();
			?>

	  <figure class="project-item">
			<?php if ( has_post_thumbnail() ) : ?>
				  
		<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'featured-image' ); ?>
		</a>

		<?php else : ?>
				  
		<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail(); ?>
		</a>

		<?php endif; ?>

		<figcaption class="overlay">
		  <p class="artist_name"><?php the_title(); ?></p>
		  <h4>
			<a class="fancybox fancybox.iframe" href="" alt="link-to-music-video-on-you-tube">See Video</a>
		  </h4>
		</figcaption>

	  </figure>

	<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
	<p><?php esc_html_e( 'No Products', 'mannering-storefront-child-theme' ); ?></p>
	<?php endif; ?>

	<br/>

  <!--Jazz Music videos-->
  <h1>Jazz Music Videos</h1>

	<?php
	  $params = array(
		  'posts_per_page' => 6,
		  'post_type'      => 'product',
		  'product_cat'    => 'jazz',

	  ); // 1.
	  $wc_query = new WP_Query( $params ); // 2.
		?>
	<?php if ( $wc_query->have_posts() ) : // 3. ?>
		<?php
		while ( $wc_query->have_posts() ) : // 4.
			$wc_query->the_post(); // 4.1.
			?>

	  <figure class="project-item">
			<?php if ( has_post_thumbnail() ) : ?>
						  
		<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<?php the_post_thumbnail( 'featured-image' ); ?>
		</a>

		<?php else : ?>

		<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail(); ?>
		</a>

		<?php endif; ?>

		<figcaption class="overlay">
		  <p class="artist_name"><?php the_title(); ?></p>
		  <h4>
			<a class="fancybox fancybox.iframe" href="" alt="link-to-music-video-on-you-tube">See Video</a>
		  </h4>
		</figcaption>

	  </figure>

	<?php endwhile; ?>
		<?php wp_reset_postdata(); // 5. ?>
	<?php else : ?>
	<p>
		<?php esc_html_e( 'No Products', 'mannering-storefront-child-theme' ); // 6. ?>
	</p>
	<?php endif; ?>

	<br/>
  
</section>
