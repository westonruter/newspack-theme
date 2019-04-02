<?php
/**
 * Displays site footer from page
 *
 * @package Newspack
 */
?>

<?php
$footer_id = get_theme_mod( 'newspack_footer_page' );

if ( ! $footer_id ) {
	return;
}

// The Query
$footer_query = new WP_Query(
	array(
		'page_id' => $footer_id,
	)
);

// The Loop
if ( $footer_query->have_posts() ) {
	echo '<aside class="widget-area" role="complementary" aria-label="' . esc_attr__( 'Footer', 'newspack' ) . '">';
	while ( $footer_query->have_posts() ) {
		$footer_query->the_post();
		the_content();
	}
	echo '</aside><!-- .widget-area -->';
}
wp_reset_postdata();
