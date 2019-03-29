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

		// JavaScript directory
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
			'style-2' => esc_html__( 'Style 2', 'newspack' ),
		),

		// Style descriptions
		'style_descriptions' => array(
			'default' => esc_html__( 'This is the default style.', 'newspack' ),
			'style-1' => esc_html__( 'The description for style 1.', 'newspack' ),
			'style-2' => esc_html__( 'The description for style 2.', 'newspack' ),
		),

		// Style fonts
		'fonts'              => array(
			'style-1' => array(
				'Alegreya Sans' => 'https://fonts.googleapis.com/css?family=Alegreya+Sans:400,400i,700,900',
				'Raleway'       => 'https://fonts.googleapis.com/css?family=Raleway:400,400i,700,900',
				'Lato'          => 'https://fonts.googleapis.com/css?family=Lato:400,400i,700,900',
			),
			'style-2' => array(
				'Raleway'          => 'https://fonts.googleapis.com/css?family=Raleway:400,400i,700',
				'Roboto Condensed' => 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700',
				'Source Serif Pro' => 'https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,700',
			),
		),
	)
);
