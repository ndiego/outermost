<?php
function outermost_register_article_post_type() {
	$labels = array(
		'name'               => __( 'Knowledge Base' ),
		'singular_name'      => __( 'Article' ),
		'add_new'            => __( 'Add New' ),
		'add_new_item'       => __( 'Add New Article' ),
		'edit_item'          => __( 'Edit Article' ),
		'new_item'           => __( 'New Article' ),
		'view_item'          => __( 'View Article' ),
		'search_items'       => __( 'Search Knowledge Base' ),
		'not_found'          => __( 'No articles found.' ),
		'not_found_in_trash' => __( 'No articles found in trash.' ),
		'parent_item_colon'  => '',
		'menu_name'          => __( 'Articles', 'blox' )
	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'show_in_admin_bar'   => true,
		'rewrite'             => array( 'slug' => 'knowledge-base' ),
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-book-alt',
		'has_archive'		  => true,
		'hierarchical'		  => true,
		'show_in_rest'	      => true,
		'supports'     		  => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions', 'page-attributes' ),
		'taxonomies'		  => array( 'knowledge-base-category' )
	);

	// Register the easy_docs post type
	register_post_type( 'article', $args );
}
add_action( 'init', 'outermost_register_article_post_type' );


function outermost_register_article_categories() {

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
		'show_in_rest'	        => true,
		'update_count_callback' => '_update_post_term_count',
	);

	// Register category taxonomy
	register_taxonomy( 'knowledge-base-category', 'article', $args );
}
add_action( 'init', 'outermost_register_article_categories' );
