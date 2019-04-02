<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newspack
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php get_template_part( 'template-parts/footer/site', 'footer-widgets-from-page' ); ?>

		<?php get_template_part( 'template-parts/footer/site', 'footer-info-from-page' ); ?>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
