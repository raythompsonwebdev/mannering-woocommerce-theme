<?php
/**
 * *PHP version 7
 *
 * Template Name :Home
 *
 * Front page | core/front-page.php.
 *
 * @category   Front_Page
 * @package    mannering_music
 * @subpackage Front_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */

 get_header(); ?>

<!--Slider-->

<section id="slider">
Yesssssssssssssss
	<article id="pageContainer">

	Yesssssssssssssss
		<!-- <div class="bx-wrapper">
			<div class="bx-viewport">
				<ul class="bxslider">
					<li>
						<article class="slider-text">
							<h1>CLEARANCE <span>SALE</span></h1>
							<h2>UP TO 10&#37; OFF</h2>
							<div class="features_list">
								<h3> <?php esc_html_e( 'Check out our end of season sale on the latest Hip Hop music from our vast collection.', 'mannering_music' ); ?>
								</h3>
							</div>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/shop/" class="button">Shop Now</a>
							<br/>
						</article>
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/sites/3/2018/12/manneringhiphop.png" alt="hip-hop-albums"/>
					</li>

					<li>
						<article class="slider-text">
							<h1>CLEARANCE<span>SALE</span></h1>
							<h2>UP TO 10&#37; OFF</h2>
							<div class="features_list">
								<h3>
								<?php esc_html_e( 'Check out our end of season sale on the latest Jazz music from our vast collection.', 'mannering_music' ); ?></h3>
							</div>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/shop/" class="button">Shop Now</a>
						</article>
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/sites/3/2018/12/manneringjazz.png" alt="jazz-albums"/>
					</li>

					<li>
						<article class="slider-text">
							<h1>CLEARANCE<span>SALE</span></h1>
							<h2>UP TO 10&#37; OFF</h2>
							<div class="features_list">
								<h3>
								<?php esc_html_e( 'Check out our end of season sale on the latest Country music from our vast collection.', 'mannering_music' ); ?>
								</h3> 
							</div>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/shop/" class="button">Shop Now</a>
						</article>
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/sites/3/2018/12/manneringcountry.png" alt="country-albums"/>
					</li>

					<li>
						<article class="slider-text">
							<h1>CLEARANCE<span>SALE</span></h1>
							<h2>UP TO 10&#37; OFF</h2>
							<div class="features_list">
								<h3>
								<?php esc_html_e( 'Check out our end of season sale on the latest Jazz music albums from our vast collection.', 'mannering_music' ); ?>
								</h3>
							</div>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/shop/" class="button">Shop Now</a>
						</article>
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/uploads/sites/3/2018/12/manneringhiphop.png" alt="hip-hop-albums"/>
					</li>
				</ul>
			</div>
		</div> -->
	</article>

	<figure id="ie8-image">
	<img id="image-5" src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/mannering-storefront-child/images/sliderimages/manneringhiphop.png" alt="home-page-image">
	</figure>

</section>

<h1><?php esc_html_e( 'Welcome to Mannering Music.', 'mannering_music' ); ?></h1>

<!--main-section-->
<main id="main_text" role="main" >
</main>

<div class="clearfix"></div>

<!--Hip Hop section -->
<article class="section group">

	<h1><?php esc_html_e( 'Featured Hip Hop Albums', 'mannering_music' ); ?></h1>

	<div class="flex-wrapper">

		<?php
		$params   = array(
			'posts_per_page' => 5,
			'post_type'      => 'product',
			'product_cat'    => 'hip-hop',
		); // 1.
		$wc_query = new WP_Query( $params ); // 2.
		?>
		<?php if ( $wc_query->have_posts() ) : // 3. ?>
			<?php
			while ( $wc_query->have_posts() ) : // 4.
				$wc_query->the_post(); // 4.1.
				?>

				<figure class="grid_1_of_5 ">
					<?php if ( has_post_thumbnail() ) { ?>

						<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<?php the_post_thumbnail( 'featured-image' ); ?>
						</a>

					<?php } else { ?>

						<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<?php the_post_thumbnail(); ?>
						</a>

						<?php
					}
					?>

					<figcaption class="cap_1_of_5">
						<h1><?php the_title(); ?></h1>
					</figcaption>



				</figure>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p>
				<?php esc_html_e( 'No Products', 'mannering_music' ); ?>
			</p>
		<?php endif; ?>



	</div>

</article>

<div class="clearfix"></div>


<!--Country section -->
<section class="section group">

	<h1><?php esc_html_e( 'Featured Country Albums', 'mannering_music' ); ?></h1>

	<div class="flex-wrapper">

		<?php
		$params   = array(
			'posts_per_page' => 5,
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
				<figure class="grid_1_of_5">

					<?php if ( has_post_thumbnail() ) { ?>

						<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<?php the_post_thumbnail( 'featured-image' ); ?>
						</a>

					<?php } else { ?>

						<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<?php the_post_thumbnail(); ?>
						</a>

						<?php
					}
					?>

					<figcaption class="cap_1_of_5">
						<h1><?php the_title(); ?></h1>



					</figcaption>

				</figure>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p>
				<?php esc_html_e( 'No Products', 'mannering_music' ); ?>
			</p>
		<?php endif; ?>
	</div>

</section>

<div class="clearfix"></div>

<!--Jazz section -->
<article class="section group">

	<h1><?php esc_html_e( 'Featured Jazz Albums', 'mannering_music' ); ?></h1>

	<div class="flex-wrapper">

		<?php
		$params   = array(
			'posts_per_page' => 5,
			'post_type'      => 'product',
			'product_cat'    => 'jazz',
		);
		$wc_query = new WP_Query( $params );
		?>
		<?php if ( $wc_query->have_posts() ) : ?>
			<?php
			while ( $wc_query->have_posts() ) :
				$wc_query->the_post();
				?>
				<figure class="grid_1_of_5">

					<?php if ( has_post_thumbnail() ) { ?>

						<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<?php the_post_thumbnail( 'featured-image' ); ?>
						</a>

					<?php } else { ?>

						<a class="images_1_of_5" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
							<?php the_post_thumbnail(); ?>
						</a>

						<?php
					}
					?>
					<figcaption class="cap_1_of_5">
						<h1><?php the_title(); ?></h1>
					</figcaption>

				</figure>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p>
				<?php esc_html_e( 'No Products', 'mannering_music' ); ?>
			</p>
		<?php endif; ?>
	</div>

</article>

<div class="clearfix"></div>


<?php get_footer(); ?>
