<?php
/**
 * Displays site info from page
 *
 * @package Newspack
 */
?>

<?php

$site_info_id = get_theme_mod( 'page_for_siteinfo' );

if ( ! $site_info_id ) {
	return;
}

$site_info_query = new WP_Query(
	array(
		'page_id' => $site_info_id,
	)
);

// The Loop
if ( $site_info_query->have_posts() ) {
	echo '<div class="site-info">';
	while ( $site_info_query->have_posts() ) {
		$site_info_query->the_post();
		the_content();
	}
	echo '</div><!-- .site-info -->';
}
wp_reset_postdata();


