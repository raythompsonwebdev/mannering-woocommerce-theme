<?php

/**
 * *PHP version 7
 *
 * Footer page | core/footer.php.
 *
 * @category   Footer_Page
 * @package    mannering_music
 * @subpackage Footer_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */
?>
</div><!-- #content -->

<!---footer-->
<footer id="mannering-footer">

	<div class="social-btns">
		<ul>
			<li><a href="#"><i class="fa fa-twitter soc"></i></a></li>
			<li><a href="#"><i class="fa fa-facebook soc"></i></a></li>
			<li><a href="#"><i class="fa fa-rss soc"></i></a></li>
			<li><a href="#"><i class="fa fa-dribbble soc"></i></a></li>
			<li><a href="#"><i class="fa fa-instagram soc"></i></a></li>
		</ul>
	</div>
	<?php

	//if ( has_nav_menu( 'Secondary Menu' ) ) {
	// If there is, adds the Top Menu area.
	wp_nav_menu(
		array(
			'menu'      => 'secondary',
			'container' => 'ul',
		)
	);
	//}
	?>


</footer>
<!--Footer end-->

<br />

<p id="copyr">
	<?php esc_html_e('&copy; 2016 - Raymond Thompson - UK :', 'mannering_music'); ?>
	<a href="<?php echo esc_url(__('https://wordpress.org/', 'mannering_music')); ?>"></a>
	<span class="sep"> | </span>

	<?php
	/* translators: %1$s by %2$s: Theme name, mannering_music: Raymond Thompson. */
	printf(esc_html_e('Theme: %1$s by %2$s.', 'mannering_music'), 'mannering_music', '<a href="http://www.raythompsonwebdev.co.uk" rel="designer">Raymond Thompson</a>');
	?>

	<?php
	$dt             = time();
	$mysql_datetime = strftime('%Y-%m-%d %H:%M:%S', $dt);
	printf(esc_html__('Page was last updated :', 'mannering_music'), esc_html($mysql_datetime, 'mannering_music'), 'mannering_music');

	?>


</p>


</div>
<!--Wrapper end-->


<?php wp_footer(); ?>

<!-- Don't forget analytics -->

</body>

</html>
