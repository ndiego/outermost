<?php

function outermost_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'outermost', get_template_directory() . '/languages' );

	// Add support for featured images (post thumbnails).
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1472, 9999 );

	// Add support for core block visual styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for alignwide and alignfull classes in the block editor.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( array(
		'./assets/css/core-blocks.css',
		'./assets/css/third-party-blocks.css',
		'./assets/css/style-shared.css',
		'./assets/css/style-editor.css'
	) );
}
add_action( 'after_setup_theme', 'outermost_setup' );

/**
 * Enqueue block editor assets.
 *
 * @since 0.1.3
 *
 * @return void
 */
function outermost_editor_assets() {

	wp_enqueue_script( 'outermost-editor-assets', get_theme_file_uri( '/assets/js/register-block-styles.js' ), array( 'wp-blocks', 'wp-dom', 'wp-edit-post' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'enqueue_block_editor_assets', 'outermost_editor_assets' );

/**
 * Enqueue custom fonts.
 *
 * @since 0.1.0
 */
function outermost_fonts() {

	// Enqueue Google fonts
	wp_enqueue_style( 'outermost-roboto', outermost_roboto_font_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'outermost_fonts' );
add_action( 'enqueue_block_editor_assets', 'outermost_fonts' );

/**
 * Enqueue scripts and styles.
 *
 * @since 0.1.0
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
 * @since 0.1.0
 * @return string $font_url Returns the font stylesheet URL or empty string if disabled.
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
 * Conditionally add a class indicating whether the page has a featured image.
 * Only add this class to singular pages/post/etc.
 *
 * @since 0.1.0
 *
 * @param string $classes  The current blody classes.
 * @return string $classes The updated blody classes.
 */
function outermost_body_classes( $classes ) {

	if ( is_singular() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

    return $classes;
}
add_filter( 'body_class','outermost_body_classes' );

// Register the Article post type.
include_once dirname( __FILE__ ) . '/inc/register-article.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';
