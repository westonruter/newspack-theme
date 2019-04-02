<?php
/**
 * Displays site footer from page
 *
 * @package Newspack
 */
?>
<?php
$footer_widgets = new WP_Query(
	array(
		'pagename' => 'newspack-footer-widgets',
	)
);

// The Loop
if ( $footer_widgets->have_posts() ) {
?>
	<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'newspack' ); ?>">
	<?php
	while ( $footer_widgets->have_posts() ) {
		$footer_widgets->the_post();
		the_content();
	}
	?>
	</aside><!-- .widget-area -->
	<?php
	wp_reset_postdata();
}
?>
