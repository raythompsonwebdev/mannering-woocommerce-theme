<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>

	<?php if ( is_search() ) { ?>
	<meta name="robots" content="noindex, nofollow" />
	<?php } ?>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="msvalidate.01" content="4CB214A27E0A9871DDFEF492EF5A6AD2" />
	<meta name="viewport" content="width=device-width" />

	<title>
		<?php wp_title( '|', true, 'right' ); ?>
	</title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<div id="wrapper">

		<header role="banner">

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php esc_html_e( 'Menu', 'mannering-storefront-child-theme' ); ?></button>

			<span class="basket">
				<?php
					/**
					 * Checking if there's anything in Top Menu.
					 */
					if ( has_nav_menu( 'shopper' ) ) {
						/**
						* If there is, adds the Top Menu area.
						*/
						wp_nav_menu(
							array(
								'menu'      => 'shopper',
								'container' => 'ul',
							)
						);
					}
				?>
			</span>

			<!---logo-->

			<?php // Display site icon or first letter as logo. ?>
					<div class="site-logo">
						<?php $site_title = get_bloginfo( 'name' ); ?>
						<a href=" <?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<div class="screen-reader-text">
								<?php
								/* translators: %1$s:, CMSname: WordPress. */
								printf( esc_html_e( 'Go to the home page of %1$s', 'mannering-storefront-child-theme' ), esc_html( $site_title ) );
								?>
							</div>
							<?php
								if ( has_custom_logo() ) :
									the_custom_logo();
								else :
							?>
							<div class="site-firstletter" aria-hidden="true">
								<?php echo esc_html( substr( $site_title, 0, 1 ) ); ?>
							</div>
							<?php endif; ?>
						</a>
					</div>

					<?php 
						if ( is_front_page() || is_page() ) : ?>
						<hgroup>
							<h1 id="logo"><span>MANNERING</span><span>MU</span>SIC</h1>
							<?php elseif ( is_home() ) : ?>
						<hgroup>
							<h1 id="logo"><span>MANNERING</span><span>BL</span>OG</h1>
							<?php else : ?>
						<hgroup>
							<h1 id="logo"><span>MANNERING</span><span>STO</span>RE</h1>
							<?php
						endif;

						$description = get_bloginfo( 'description', 'mannering-storefront-child-theme' );

						if ( esc_html( $description ) || is_customize_preview() ) :
					?>
						<h2 class="site-description">
							<?php echo esc_html( $description ); ?>
						</h2>
					</hgroup>
					<?php endif; ?>

		</header>

		<!---navigation-->
		<nav role="navigation">

			<?php
	// Checking if there's anything in Top Menu.
	if ( has_nav_menu( 'main' ) ) {
		// If there is, adds the Top Menu area.
		wp_nav_menu(
			array(
				'menu'      => 'main',
				'container' => 'ul',
			)
		);
	}
	?>
		</nav>

		<div id="content" class="group">