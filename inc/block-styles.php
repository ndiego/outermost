<?php
/**
 * This file adds block styles to the Outermost theme for WordPress.
 *
 * @package Outermost
 * @author  Nick Diego
 * @license GNU General Public License v2 or later
 */

// Add Column block styles: Dropshadow.
register_block_style(
	'core/column',
	array(
		'name'  => 'dropshadow',
		'label' => __( 'Dropshadow', 'outermost' ),
	)
);

register_block_style(
	'core/navigation-link',
	array(
		'name'  => 'navigation-button',
		'label' => __( 'Button', 'outermost' ),
	)
);

// Add Paragraph block styles: Intro, No Margin.
register_block_style(
	'core/paragraph',
	array(
		'name'  => 'paragraph-intro',
		'label' => __( 'Intro', 'outermost' ),
	)
);

register_block_style(
	'core/paragraph',
	array(
		'name'  => 'no-margin',
		'label' => __( 'No Margin', 'outermost' ),
	)
);

// Add Post Tags block styles: Pill Shaped.
register_block_style(
    'core/post-tags',
    array(
    	'name'  => 'pill-link',
    	'label' => __( 'Pill Shaped', 'outermost' ),
    )
);

// Add Post Terms block styles: Pill Shaped.
register_block_style(
    'core/post-terms',
    array(
    	'name'  => 'pill-link',
    	'label' => __( 'Pill Shaped', 'outermost' ),
    )
);

// Add Quote block styles: Small Quote.
register_block_style(
    'core/quote',
    array(
    	'name'  => 'small-quote',
    	'label' => __( 'Small Quote', 'outermost' ),
    )
);