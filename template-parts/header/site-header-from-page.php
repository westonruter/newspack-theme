<?php
/**
 * Displays site header from page
 *
 * @package Newspack
 */
?>
<div class="site-branding">
	<?php
	$site_header = new WP_Query(
		array(
			'pagename' => 'newspack-header',
		)
	);

	// The Loop
	if ( $site_header->have_posts() ) {
		while ( $site_header->have_posts() ) {
			$site_header->the_post();
			the_content();
		}
		wp_reset_postdata();
	}
	?>
</div><!-- .site-branding -->
