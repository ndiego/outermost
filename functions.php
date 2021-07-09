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
		'./assets/css/style-shared.css'
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

	wp_enqueue_script( 'outermost-editor-assets', get_theme_file_uri( '/assets/js/register-block-styles-variations.js' ), array( 'wp-blocks', 'wp-dom', 'wp-edit-post' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'enqueue_block_editor_assets', 'outermost_editor_assets' );

/**
 * Enqueue custom fonts.
 *
 * @since 0.1.0
 */
function outermost_fonts() {

	// Enqueue Google fonts
	wp_enqueue_style( 'outermost-material-icons', '//fonts.googleapis.com/icon?family=Material+Icons', array(), null );
	wp_enqueue_style( 'outermost-material-icons-outlined', '//fonts.googleapis.com/icon?family=Material+Icons+Outlined', array(), null );
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
 * Stip the prefix from the archive titles.
 *
 * @since 0.1.0
 *
 * @param string $prefix The archive prefix.
 * @return null          Return null.
 */
function outermost_remove_archive_title_prefix( $prefix ) {
	if ( $prefix ) {
		return null;
	}
}
add_filter( 'get_the_archive_title_prefix', 'outermost_remove_archive_title_prefix' );


/**
 * This function modifies the main WordPress query to include an array of
 * post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */
function outermost_include_articles_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'article' ) );
    }
}
add_action( 'pre_get_posts', 'outermost_include_articles_in_search_results' );

// Register the Article post type.
include_once dirname( __FILE__ ) . '/inc/register-article.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

/* Add custom image size for the site logo. Needed to combat blurry logos */
add_image_size( 'outermost_site_logo', 250, 0, false );
