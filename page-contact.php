<?php
/**
 * *PHP version 5
 *
 * Template Name: Contact
 *
 * Contact page | core/page-contact.php.
 *
 * @category   Contact_Page
 * @package    Mannering Storefront Child Theme
 * @subpackage Contact_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/storefront.git
 * @link       http:www.raythompsonwebdev.co.uk.storefront
 */

 get_header(); ?>

<!--Content box-->

<main id="main_text" class="group">

	<h1>
		<?php esc_html_e( 'Contact Us', 'mannering_music' ); ?>
	</h1>

	<br />

	<div id="summary"></div>

	<form id="contact-form-a" class="group" method="post" action="" role="form">
		<br />

		<label for="name">
			<?php esc_html_e( 'Full Name', 'mannering_music' ); ?>
		</label>
		<input type="text" id="name" name="name" title="<?php echo esc_attr( 'Please enter your name', 'mannering_music' ); ?>"
		 required autofocus placeholder="Last, First" value="">

		<br />

		<label for="email">
			<?php esc_html_e( 'E-mail', 'mannering_music' ); ?>
		</label>
		<input id="email" name="email" type="email" placeholder="enter email address here" title="<?php echo esc_attr( 'Please Enter Your Email Address', 'mannering_music' ); ?>"
		 required autocomplete="off">

		<br />

		<label for="message">
			<?php esc_html_e( 'Message', 'mannering_music' ); ?>
		</label>
		<textarea name="message" id="message" cols="30" rows="10" placeholder="Write message here (No HTML Allowed)"><?php //echo esc_textarea( $text ); ?></textarea>

		<br /><br />

		<input class="submit" name="submit" type="submit" value="Submit" id="contact_btn">
	</form>


	<ul id="contact-details">
		<li>
			<?php esc_html_e( 'Mannering Music Agency', 'mannering_music' ); ?>
		</li>
		<li>
			<?php esc_html_e( '1 Somewhere', 'mannering_music' ); ?>
		</li>
		<li>
			<?php esc_html_e( 'London', 'mannering_music' ); ?>
		</li>
		<li>
			<?php esc_html_e( 'E8 2GF', 'mannering_music' ); ?>
		</li>
		<li>
			<?php esc_html_e( 'Tel No: 0208 123 4567', 'mannering_music' ); ?>
		</li>
	</ul>

	<!--Main text end-->

	<article id="mapcontainer"></article>



	<br /><br />

</main>

<!--Content End-->



<?php get_footer(); ?>