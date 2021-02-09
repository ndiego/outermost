<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 *
 * @package WordPress
 * @subpackage outermost
 * @since 0.1
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'outermost-layouts',
		array( 'label' => esc_html__( 'Layouts', 'outermost' ) )
	);
}


/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	// Large Text.
	register_block_pattern(
		'outermost-layouts/large-text',
		array(
			'title'         => esc_html__( 'Large Text', 'outermost-layouts' ),
			'categories'    => array( 'outermost-layouts' ),
			'viewportWidth' => 1440,
			'content'       => '<!-- wp:heading {"align":"wide","fontSize":"gigantic","style":{"typography":{"lineHeight":"1.1"}}} --><h2 class="alignwide has-text-align-wide has-gigantic-font-size" style="line-height:1.1">' . esc_html__( 'A new portfolio default theme for WordPress', 'tt1-blocks' ) . '</h2><!-- /wp:heading -->',
		)
	);
}
