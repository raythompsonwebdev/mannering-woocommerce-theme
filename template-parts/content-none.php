<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mannering-storefront-child-theme.
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="page-title"><?php esc_html__('Nothing Found', 'mannering-storefront-child-theme'); ?></h1>
    </header><!-- .page-header -->

    <div class="entry-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php
                printf(
                    wp_kses(/* translators: 1: link to WP admin new post page. */
                        esc_html__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mannering-storefront-child-theme'),
                        array(
                                'a' => array(
                                'href' => array(),
                            ),
                        )
                    ),
                    esc_url(admin_url('post-new.php'))
                );
            ?></p>

        <?php elseif (is_search()) : ?>
            <p><?php esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mannering-storefront-child-theme'); ?></p>
            <?php
                get_search_form();
        else : ?>
            <p><?php esc_html__('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mannering-storefront-child-theme'); ?></p>
            <?php
                get_search_form();
        endif; ?>
    </div><!-- .entry-content -->


</article><!-- .no-results -->
