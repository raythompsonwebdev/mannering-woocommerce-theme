<?php
/**
 * *PHP version 5
 *
 * The template for displaying sidebar
 *
 * Sidebar | core/sidebar.php.
 *
 * @category   Sidebar
 * @package    Mannering Storefront Child Theme
 * @subpackage Sidebar
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */
 get_header(); ?>

<aside id="side-bar" class="group" role="complementary">

<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'Sidebar Widgets' ) ) : ?>

		<?php endif; ?>
</aside>
