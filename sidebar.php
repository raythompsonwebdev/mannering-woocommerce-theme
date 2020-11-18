<?php
/**
 * *PHP version 5
 *
 * The template for displaying sidebar
 *
 * Sidebar | core/sidebar.php.
 *
 * @category   Sidebar
 * @package    mannering_music
 * @subpackage Sidebar
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="side-bar" class="widget-area">
<?php if ( ! function_exists( 'sidebar-1' ) || ! dynamic_sidebar( 'Sidebar Widgets' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
<?php endif; ?>

</aside><!-- #secondary -->
