<?php

/**
 * *PHP version 8.1
 *
 * Footer page | core/footer.php.
 *
 * @category   Footer_Page
 * @package    mannering-woocommerce-theme
 * @subpackage Footer_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-woocommerce-theme.git
 */
?>
</div><!-- #content -->

<!---footer-->
<footer id="mannering-footer">

	<div class="social-btns">
		<ul>
			<li><a href="#"><span class="dashicons dashicons-twitter"></span></a></li>
			<li><a href="#"><span class="dashicons dashicons-facebook"></span></a></li>
			<li><a href="#"><span class="dashicons dashicons-rss"></span></i></a></li>
			<li><a href="#"><span class="dashicons dashicons-instagram"></span></a></li>
			<li><a href="#"><span class="dashicons dashicons-youtube"></span></a></li>
		</ul>
	</div>
	<?php

	// if ( has_nav_menu( 'Secondary Menu' ) ) {
	// If there is, adds the Top Menu area.
	wp_nav_menu(
		array(
			'menu'      => 'secondary',
			'container' => 'ul',
			'container_id'   => 'secondary-menu',
			'theme_location' => 'Secondary',
		)
	);
	// }
	?>


</footer>
<!--Footer end-->

<br />

<p id="copyr">
	<?php echo esc_html__('&copy; 2016 - Raymond Thompson - UK :', 'mannering-woocommerce-theme'); ?>
	<a href="<?php echo esc_url(__('https://wordpress.org/', 'mannering-woocommerce-theme')); ?>">
		<?php
		/* translators: %s: CMS name, i.e. WordPress. */
		printf(esc_html__('Proudly powered by %s', 'mannering-woocommerce-theme'), 'WordPress');
		?>
	</a>
	<span class="sep"> | </span>

	<?php
	/* translators: %1$s by %2$s: Theme name, mannering-woocommerce-theme: Raymond Thompson. */
	printf('Theme: %1$s by %2$s.', 'mannering-woocommerce-theme', '<a href="http://www.raythompsonwebdev.co.uk" rel="designer">Raymond Thompson</a>');
	?>

	<?php

	$dt = current_datetime();

	$mysql_datetime = $dt->format('l jS \o\f F Y h:i:s A');

	printf('Page was last updated : %s', esc_html($mysql_datetime));

	?>


</p>


</div>
<!--Wrapper end-->


<?php wp_footer(); ?>

<!-- Don't forget analytics -->

</body>

</html>
