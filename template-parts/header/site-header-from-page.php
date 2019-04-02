<?php
/**
 * Displays site header from page
 *
 * @package Newspack
 */
?>

<?php
$header_id = get_theme_mod( 'newspack_header_page' );

if ( ! $header_id ) {
	return;
}

// The Query
$header_query = new WP_Query(
	array(
		'page_id' => $header_id,
	)
);

// The Loop
if ( $header_query->have_posts() ) {
	echo '<div class="site-branding">';
	while ( $header_query->have_posts() ) {
		$header_query->the_post();
		the_content();
	}
	echo '</div><!-- .site-branding -->';
}
wp_reset_postdata();
