<?php
/**
 * Displays site footer from page
 *
 * @package Newspack
 */
?>

<?php
$footer_info = new WP_Query(
	array(
		'pagename' => 'newspack-footer-info',
	)
);

// The Loop
if ( $footer_info->have_posts() ) {
?>
	<div class="site-info">
		<?php
		while ( $footer_info->have_posts() ) {
			$footer_info->the_post();
			the_content();
		}
		?>
	</div><!-- .site-info -->
	<?php
	wp_reset_postdata();
}
?>
