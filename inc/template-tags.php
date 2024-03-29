<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package mannering_music
 */

if (!function_exists('mannering_music_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function mannering_music_posted_on()
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if (get_the_time('U') !== get_the_modified_time('U')) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('Posted on %s', 'post date', 'mannering-woocommerce-theme'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('mannering_music_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function mannering_music_posted_by()
	{
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'mannering-woocommerce-theme'),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('mannering_display_gravatar')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function mannering_display_gravatar()
	{

		$mannering_author_id = get_the_author_meta('ID');

		if (mannering_display_gravatar($mannering_author_id)) {
			echo '<div class="meta-content has-avatar">';
			echo '<div class="author-avatar">' . get_avatar($mannering_author_id) . '</div></div>';
		} else {
			echo '<div class="meta-content has-avatar">';
			echo '<div class="author-avatar">' . get_avatar($mannering_author_id) . '</div></div>';
		}
	}

endif;

if (!function_exists('mannering_updated')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function mannering_updated()
	{
		$mannering_update_time_string = '<time class="updated" datetime="%3$s">Not updated</time>';
		if (get_the_time('U') !== get_the_modified_time('U')) {
			$mannering_update_time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
		}
		$mannering_update_time_string = sprintf(
			$mannering_update_time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$mannering_updated_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('Updated:  %s', 'post date', 'mannering-woocommerce-theme'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $mannering_update_time_string . '</a>'
		);

		echo '<span class="updated-on">' . $mannering_updated_on . '</span>';
	}

endif;

if (!function_exists('mannering_music_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function mannering_music_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'mannering-woocommerce-theme'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'mannering-woocommerce-theme') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'mannering-woocommerce-theme'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'mannering-woocommerce-theme') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'mannering-woocommerce-theme'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'mannering-woocommerce-theme'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if (!function_exists('mannering_music_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function mannering_music_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

<?php
		endif; // End is_singular().
	}
endif;

if (!function_exists('mannering_music_validate_gravatar')) :
	/**
	 * Utility function to check if a gravatar exists for a given email or id
	 *
	 * @param  int|string|object $id_or_email A user ID,  email address, or comment object.
	 * @return bool if the gravatar exists or not.
	 * Original found at https://gist.github.com/justinph/5197810.
	 */
	function mannering_music_validate_gravatar($id_or_email)
	{

		// id or email code borrowed from wp-includes/pluggable.php.
		$email = 'ray_thomp@hushmail.com';
		if (is_numeric($id_or_email)) {
			$id   = (int) $id_or_email;
			$user = get_userdata($id);
			if ($user) {
				$email = $user->user_email;
			}
		} elseif (is_object($id_or_email)) {
			// No avatar for pingbacks or trackbacks.
			$allowed_comment_types = apply_filters('get_avatar_comment_types', array('comment'));
			if (!empty($id_or_email->comment_type) && !in_array($id_or_email->comment_type, (array) $allowed_comment_types, true)) {
				return false;
			}

			if (!empty($id_or_email->user_id)) {
				$id   = (int) $id_or_email->user_id;
				$user = get_userdata($id);
				if ($user) {
					$email = $user->user_email;
				}
			} elseif (!empty($id_or_email->comment_author_email)) {
				$email = $id_or_email->comment_author_email;
			}
		} else {
			$email = $id_or_email;
		}
		//https://s.gravatar.com/avatar/c17de9c12b09e2234e12651235f17008?s=80
		$hashkey = md5(strtolower(trim($email)));
		$uri     = 'http://www.gravatar.com/avatar/' . $hashkey . '?s=80';

		// $uri     = 'https://s.gravatar.com/avatar/c17de9c12b09e2234e12651235f17008?s=80';

		$data = wp_cache_get($hashkey);
		if (false === $data) {
			$response = wp_remote_head($uri);
			if (is_wp_error($response)) {
				$data = 'not200';
			} else {
				$data = $response['response']['code'];
			}
			wp_cache_set($hashkey, $data, $group = '', $expire = 60 * 5);
		}
		if ($data == '200') {
			return true;
		} else {
			return false;
		}
	}

endif;

if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;
