<?php

/**
 * *PHP version 8.1
 * Template Name: Header
 *
 * Header | core/header.php.
 *
 * @category   Header
 * @package    mannering-woocommerce-theme
 * @subpackage Header
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-woocommerce-child.git
 */

?>
<!doctype html>
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
	<?php if (is_search()) : ?>
		<meta name="robots" content="noindex, nofollow" />
	<?php endif; ?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div id="wrapper">

		<header id="mannering-header">

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php esc_html_e('Menu', 'mannering-woocommerce-theme'); ?>
			</button>

			<?php
			wp_nav_menu(
				array(
					'menu'           => 'shopper',
					'container'      => 'nav',
					'container_id'   => 'shopper-menu',
					'theme_location' => 'Shopper',
				)
			);
			?>
			<?php
			// Display site icon or first letter as logo.
			?>
			<div class="site-logo">
				<?php $site_title = get_bloginfo('name'); ?>
				<a href=" <?php echo esc_url(home_url('/')); ?>" rel="home">
					<div class="screen-reader-text">
						<?php
						/* translators: %1$s:, $site_title */
						printf(esc_html_e('Go to the home page of %1$s', 'mannering-woocommerce-theme'), esc_html($site_title));
						?>
					</div>
					<?php
					if (has_custom_logo()) :
						the_custom_logo();
					?>
					<?php else : ?>
						<div class="site-firstletter" aria-hidden="true">
							<?php echo esc_html(substr($site_title, 0, 1)); ?>
						</div>
					<?php endif; ?>
				</a>
			</div>

			<?php
			if (is_front_page() || is_page()) :
			?>
				<hgroup>
					<h1 id="logo"><span>MANNERING</span><span>MU</span>SIC</h1>
				<?php elseif (is_home()) : ?>
					<hgroup>
						<h1 id="logo"><span>MANNERING</span><span>BL</span>OG</h1>
					<?php else : ?>
						<hgroup>
							<h1 id="logo"><span>MANNERING</span><span>STO</span>RE</h1>
						<?php
					endif;

					$description = get_bloginfo('description', 'mannering-woocommerce-theme');

					if (esc_html($description) || is_customize_preview()) :
						?>
							<p class="site-description">
								<?php echo esc_html($description); ?>
							</p>
						</hgroup>
					<?php endif; ?>

		</header>

		<nav id="mannering-main-nav">
			<?php
			wp_nav_menu(
				array(
					'menu'      => 'main',
					'container' => 'ul',
					'container_id'   => 'main-menu',
					'theme_location' => 'Main',
				)
			);
			?>
		</nav>

		<div id="content">
