<?php

/**
 * *PHP version 8.1
 *
 * Template Name: Contact
 *
 * Contact page | core/page-contact.php.
 *
 * @category   Contact_Page
 * @package    mannering-woocommerce-theme
 * @subpackage Contact_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-woocommerce-theme.git
 */

get_header(); ?>

<!--Content box-->

<main id="main_text">

	<h2 class="content-header">
		<?php esc_html_e('Contact Us', 'mannering-woocommerce-theme'); ?>
	</h2>

	<div id="summary"></div>

	<form id="contact-form-a" method="post" action="">
		<br />

		<label for="name">
			<?php echo esc_html__('Full Name', 'mannering-woocommerce-theme'); ?>
		</label>
		<input type="text" id="name" name="name" title="<?php echo esc_attr__('Please enter your name', 'mannering-woocommerce-theme'); ?>" required autofocus placeholder="Last, First" value="">

		<br />

		<label for="email">
			<?php echo esc_html__('E-mail', 'mannering-woocommerce-theme'); ?>
		</label>
		<input id="email" name="email" type="email" placeholder="enter email address here" title="<?php echo esc_attr__('Please Enter Your Email Address', 'mannering-woocommerce-theme'); ?>" required autocomplete="off">

		<br />

		<label for="message">
			<?php echo esc_html__('Message', 'mannering-woocommerce-theme'); ?>
		</label>
		<textarea name="message" id="message" cols="30" rows="5" placeholder="Write message here (No HTML Allowed)"></textarea>
		<input class="submit" name="submit" type="submit" value="Submit" id="contact_btn">
	</form>

	<address id="contact-details">
		<p>
			<?php echo esc_html__('Mannering Music Agency', 'mannering-woocommerce-theme'); ?>
		</p>
		<p>
			<?php echo esc_html__('1 Somewhere', 'mannering-woocommerce-theme'); ?>
		</p>
		<p>
			<?php echo esc_html__('London', 'mannering-woocommerce-theme'); ?>
		</p>
		<p>
			<?php echo esc_html__('E8 2GF', 'mannering-woocommerce-theme'); ?>
		</p>
		<p>
			<?php echo esc_html__('Tel No: 0208 123 4567', 'mannering-woocommerce-theme'); ?>
		</p>
	</address>

	<!--Main text end-->

	<article id="mapcontainer"></article>



	<br /><br />

</main>

<!--Content End-->



<?php get_footer(); ?>
