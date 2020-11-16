<?php
/**
 * *PHP version 7
 *
 * Footer page | core/footer.php.
 *
 * @category   Footer_Page
 * @package    Mannering Storefront Child Theme
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
<footer role="navigation">

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
wp_nav_menu(
	array(
		'menu'      => 'Secondary',
		'container' => 'ul',
	)
);
?>


</footer>
<!--Footer end-->

<br />

<p id="copyr">
	<?php esc_html_e( '&copy; 2016 - Raymond Thompson - UK :', 'mannering-storefront-child-theme' ); ?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mannering-storefront-child-theme' ) ); ?>"></a>
	<span class="sep"> | </span>

	<?php
		/* translators: %1$s by %2$s: Theme name, mannering-storefront-child-theme: Raymond Thompson. */
		printf( esc_html_e( 'Theme: %1$s by %2$s.', 'mannering-storefront-child-theme' ), 'mannering-storefront-child-theme', '<a href="http://www.raythompsonwebdev.co.uk" rel="designer">Raymond Thompson</a>' );
	?>

	<?php
	$dt             = time();
	$mysql_datetime = strftime( '%Y-%m-%d %H:%M:%S', $dt );
	printf( esc_html__( 'Page was last updated :', 'mannering-storefront-child-theme' ), esc_html( $mysql_datetime, 'mannering-storefront-child-theme' ), 'mannering-storefront-child-theme' );

?>


</p>


</div>
<!--Wrapper end-->


<?php wp_footer(); ?>

<!-- Don't forget analytics -->

</body>

</html>