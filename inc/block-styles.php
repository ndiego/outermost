<?php
/**
 * Block Styles
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_style/
 *
 * @package outermost
 * @since 0.1.0
 */

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since 0.1
	 *
	 * @return void
	 */
	function outermost_register_block_styles() {
		register_block_style(
			'core/button',
			array(
				'name'  => 'button-primary',
				'label' => esc_html__( 'Primary', 'outermost' ),
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'  => 'navigation-button',
				'label' => esc_html__( 'Button', 'outermost' ),
			)
		);
		register_block_style(
			'core/paragraph',
			array(
				'name'  => 'paragraph-intro',
				'label' => esc_html__( 'Intro', 'outermost' ),
			)
		);
		register_block_style(
			'core/post-hierarchical-terms',
			array(
				'name'  => 'pill-link',
				'label' => esc_html__( 'Pill Shaped Links', 'outermost' ),
			)
		);
		register_block_style(
			'core/post-tags',
			array(
				'name'  => 'pill-link',
				'label' => esc_html__( 'Pill Shaped Links', 'outermost' ),
			)
		);
		// Social icons: Dark gray color.
		register_block_style(
			'core/social-links',
			array(
				'name'  => 'social-icons-simple',
				'label' => esc_html__( 'Simplified', 'outermost' ),
			)
		);

	}
	add_action( 'init', 'outermost_register_block_styles' );
}
