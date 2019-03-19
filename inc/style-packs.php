<?php
/**
 * Style Packs configuration.
 *
 * @package Newspack
 */

new Newspack_Style_Packs_Core(

	array(
		// Format to use for active style pack body class
		'body_class_format'  => 'style-pack-%s',

		// Style packs directory
		'styles_directory'   => 'styles',

		// Javascripts directory
		'js_directory'       => 'js',

		// Use thumbnails
		'style_thumbs'       => array(
			'width'  => 200 / 2,
			'height' => 230 / 2,
		),

		// Style declarations
		'styles'             => array(
			'default' => esc_html__( 'Default Style', 'newspack' ),
			'style-1' => esc_html__( 'Style 1', 'newspack' ),
		),

		'style_descriptions' => array(
			'default' => esc_html__( 'This is the default style.', 'newspack' ),
			'style-1' => esc_html__( 'The description for style 1.', 'newspack' ),
		),
	)
);
