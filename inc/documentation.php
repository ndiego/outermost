<?php

add_action( 'init', 'blox_register_documentation_post_type' );

function blox_register_documentation_post_type() {
	$labels = array(
		'name'               => __( 'Documentation', 'blox' ),
		'singular_name'      => __( 'Doc', 'blox' ),
		'add_new'            => __( 'Add New', 'blox' ),
		'add_new_item'       => __( 'Add New Doc', 'blox' ),
		'edit_item'          => __( 'Edit Doc', 'blox' ),
		'new_item'           => __( 'New Doc', 'blox' ),
		'view_item'          => __( 'View Doc', 'blox' ),
		'search_items'       => __( 'Search Documentation', 'blox' ),
		'not_found'          => __( 'No documentation found.', 'blox' ),
		'not_found_in_trash' => __( 'No documentation found in trash.', 'blox' ),
		'parent_item_colon'  => '',
		'menu_name'          => __( 'Documentation', 'blox' )
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'show_in_admin_bar'   => true,
		'rewrite'             => array( 'slug' => 'documentation' ),
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-book-alt',
		'has_archive'		  => true,
		'hierarchical'		  => true,
		'show_in_rest'	      => true,
		'supports'     		  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes' ),
		//'taxonomies'		  => array( 'blox_category' )
	);

	// Register the easy_docs post type
	register_post_type( 'documentation', $args );
}

add_action( 'init', 'blox_register_documentation_categories' );

function blox_register_documentation_categories() {

	$labels = array(
		'name'                       => __( 'Categories' ),
		'singular_name'              => __( 'Category' ),
		'search_items'               => __( 'Search Categories' ),
		'popular_items'              => __( 'Popular Categories' ),
		'all_items'                  => __( 'All Categories' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Category' ),
		'update_item'                => __( 'Update Category' ),
		'add_new_item'               => __( 'Add New Category' ),
		'new_item_name'              => __( 'New Category Name' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas' ),
		'add_or_remove_items'        => __( 'Add or remove Categories' ),
		'choose_from_most_used'      => __( 'Choose from the most used Categories' ),
		'not_found'                  => __( 'No Categories found.' ),
		'menu_name'                  => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'has_archive'           => false,
		'show_in_rest'	      => true,
		'rewrite'               => array( 'slug' => 'documentation-type' ),
	);

	// Register category taxonomy
	register_taxonomy( 'documentation-type', 'documentation', $args );
}
