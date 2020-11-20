<?php
/**
 * *PHP version 5
 *
 * Template Name: Video
 *
 * Video page | core/page-video.php.
 *
 * @category   Video_Page
 * @package    Mannering Storefront Child Theme
 * @subpackage Video_Page
 * @author     Raymond Thompson <ray_thomp@hushmail.com>
 * @copyright  2017 Raymond Thompson
 * @license    http://www.gnu.org/licenses/gpl-3.0.en.html GPLv3
 * @version    GIT: https://github.com/raythompsonwebdev/mannering-music.git
 * @link       http:www.raythompsonwebdev.co.uk.mannering-music
 */

 get_header(); ?>

<!--main-end-->
<main id="main_text" role="main" >

<article class="textbox">

	<h1><?php esc_html_e( 'Music Videos', 'mannering_music' ); ?></h1>

	<p><?php esc_html_e( 'Watch classic and the latest Hip Hop, Jazz and Country music videos from a wide selection of music videos.', 'mannering_music' ); ?></p>

	<br/>

</article>

</main>



	<?php get_template_part( 'template-parts/content', 'video' ); ?>




<?php get_footer(); ?>
