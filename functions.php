<?php

function outermost_support()  {

	// Adding support for featured images.
	add_theme_support( 'post-thumbnails' );

	// Adding support for alignwide and alignfull classes in the block editor.
	add_theme_support( 'align-wide' );

	// Adding support for core block visual styles.
	add_theme_support( 'wp-block-styles' );

	// Adding support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( array(
		'./assets/css/blocks.css',
		'./assets/css/style-shared.css',
		'./assets/css/style-editor.css',
	) );

	add_theme_support( 'custom-templates' );

	// Add support for experimental link color control.
	add_theme_support( 'experimental-link-color' );

	// Add support for custom units.
	add_theme_support( 'custom-units' );

	// Enqueue editor styles.
	add_editor_style( 'style.css' );

}
add_action( 'after_setup_theme', 'outermost_support' );

/**
 * Enqueue scripts and styles.
 */
function outermost_fonts() {

	// Enqueue Google fonts
	wp_enqueue_style( 'outermost-roboto', outermost_roboto_font_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'outermost_fonts' );
add_action( 'enqueue_block_editor_assets', 'outermost_fonts' );

/**
 * Enqueue scripts and styles.
 */
function outermost_frontend_scripts() {

	// Enqueue theme stylesheet.
	wp_enqueue_style( 'outermost-style', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'outermost_frontend_scripts' );

/**
 * Returns the Google font stylesheet URL, if available.
 *
 * The use of Roboto by default is localized. For languages that use characters
 * not supported by the font, the font can be disabled.
 *
 * Returns the font stylesheet URL or empty string if disabled.
 */
function outermost_roboto_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Roboto, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'outermost' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Roboto:400,700,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Conditionally add a class indicating whether the page/post has a featured image.
 */
function outermost_body_classes( $classes ) {

	if ( has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

    return $classes;
}
add_filter( 'body_class','outermost_body_classes' );

// Register the Documentation post type.
include_once dirname( __FILE__ ) . '/inc/documentation.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';
