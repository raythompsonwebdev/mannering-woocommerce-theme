
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <!-- .entry-header -->
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) : ?>
        <div class="entry-meta">
            <?php
                mannering_music_posted_on();
                mannering_music_posted_by();
            ?>
        </div><!-- .entry-meta -->
        <?php
        endif; ?>
    </header>

    <?php mannering_music_post_thumbnail(); ?>

    <!-- .entry-content -->
    <div class="entry-content">
        <?php
            the_content(sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'mannering-storefront-child-theme'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ));

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'mannering-storefront-child-theme'),
                'after'  => '</div>',
            ));
        ?>
    </div>

    <!-- .entry-footer -->
    <footer class="entry-footer">
        <?php mannering_music_entry_footer(); ?>
    </footer>

</article><!-- #post-<?php the_ID(); ?> -->

