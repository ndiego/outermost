<?php

function outermost_setup() {

	// Make theme available for translation.
	load_theme_textdomain( 'outermost', get_template_directory() . '/languages' );

	// Add support for featured images (post thumbnails).
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1472, 9999 );

	// Add support for core block visual styles.
 	add_theme_support( 'wp-block-styles' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

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

	wp_enqueue_script( 'outermost-editor-assets', get_theme_file_uri( '/assets/js/register-block-variations.js' ), array( 'wp-blocks', 'wp-dom', 'wp-edit-post' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'enqueue_block_editor_assets', 'outermost_editor_assets' );

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
require get_template_directory() . '/inc/register-article.php';

// Add Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Add Block Styles.
require get_template_directory() . '/inc/block-styles.php';

// Add custom image size for the site logo. Needed to combat blurry logos.
add_image_size( 'outermost_site_logo', 250, 0, false );
