<?php
/**
 * Custom template tags for this theme
 *
 * @package Newspack
 */

if ( ! function_exists( 'newspack_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function newspack_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on"><a href="%1$s" rel="bookmark">%2$s</a></span>',
			esc_url( get_permalink() ),
			wp_kses(
				$time_string,
				array(
					'time' => array(
						'class'    => array(),
						'datetime' => array(),
					),
				)
			)
		);
	}
endif;

if ( ! function_exists( 'newspack_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function newspack_posted_by() {
		printf(
			/* translators: 1: Author avatar. 2: post author, only visible to screen readers. 3: author link. */
			'<span class="author-avatar">%1$s</span><span class="byline"><span>%2$s</span> <span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
			wp_kses(
				get_avatar( get_the_author_meta( 'ID' ) ),
				array(
					'img' => array(
						'alt'    => array(),
						'src'    => array(),
						'srcset' => array(),
						'class'  => array(),
						'width'  => array(),
						'height' => array(),
					),
				)
			),
			esc_html__( 'by', 'newspack' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'newspack_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function newspack_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			echo newspack_get_icon_svg( 'comment', 16 );

			/* translators: %s: Name of current post. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'newspack' ), get_the_title() ) );

			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'newspack_categories' ) ) :
	/**
	 * Prints HTML with the current post's categories.
	 */
	function newspack_categories() {
		$categories_list = get_the_category_list( ' ' );
		if ( $categories_list ) {
			printf(
				/* translators: 1: posted in label, only visible to screen readers. 2: list of categories. */
				'<span class="cat-links"><span class="screen-reader-text">%1$s</span>%2$s</span>',
				esc_html__( 'Posted in', 'newspack' ),
				$categories_list
			); // WPCS: XSS OK.
		}
	}
endif;

if ( ! function_exists( 'newspack_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function newspack_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			$tags_list = get_the_tag_list( '', ' ' );
			if ( $tags_list ) {
				printf(
					/* translators: 1: posted in label, only visible to screen readers. 2: list of tags. */
					'<span class="tags-links"><span>%1$s </span>%2$s</span>',
					esc_html__( 'Tagged:', 'newspack' ),
					$tags_list
				); // WPCS: XSS OK.
			}
		}

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'newspack' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">' . newspack_get_icon_svg( 'edit', 16 ),
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'newspack_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function newspack_post_thumbnail() {
		if ( ! newspack_can_show_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<figure class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure><!-- .post-thumbnail -->

			<?php
		else :
			?>

		<figure class="post-thumbnail">
			<a class="post-thumbnail-inner" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail( 'post-thumbnail' ); ?>
			</a>
		</figure>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'newspack_comment_form' ) ) :
	/**
	 * Documentation for function.
	 */
	function newspack_comment_form( $order ) {
		if ( true === $order || strtolower( $order ) === strtolower( get_option( 'comment_order', 'asc' ) ) ) {

			comment_form(
				array(
					'logged_in_as' => null,
					'title_reply'  => null,
				)
			);
		}
	}
endif;

if ( ! function_exists( 'newspack_the_posts_navigation' ) ) :
	/**
	 * Documentation for function.
	 */
	function newspack_the_posts_navigation() {
		the_posts_pagination(
			array(
				'mid_size'  => 2,
				'prev_text' => sprintf(
					'%s <span class="nav-prev-text">%s</span>',
					newspack_get_icon_svg( 'chevron_left', 22 ),
					__( 'Newer posts', 'newspack' )
				),
				'next_text' => sprintf(
					'<span class="nav-next-text">%s</span> %s',
					__( 'Older posts', 'newspack' ),
					newspack_get_icon_svg( 'chevron_right', 22 )
				),
			)
		);
	}
endif;
