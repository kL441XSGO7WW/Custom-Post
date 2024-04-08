<?php

/* Projects Custom Post Type Start */

add_action('init', 'projects_post_type');
function projects_post_type() {
	$labels = array(
		'name'               => _x( 'Newsroom', 'Project Name' ),
		'singular_name'      => _x( 'Newsroom', 'Project Name' ),
		'menu_name'          => _x( 'Newsrooms', 'Project Name' ),
		'name_admin_bar'     => _x( 'Newsroom', 'Project Name' ),
		'add_new'            => _x( 'Add New', 'Project Name' ),
		'add_new_item'       => __( 'Add New Newsroom', 'Project Name' ),
		'new_item'           => __( 'New Newsroom', 'Project Name' ),
		'edit_item'          => __( 'Edit Newsroom', 'Project Name' ),
		'view_item'          => __( 'View Newsroom', 'Project Name' ),
		'all_items'          => __( 'All Newsrooms', 'Project Name' ),
		'search_items'       => __( 'Search Newsroom', 'Project Name' ),
		'parent_item_colon'  => __( 'Parent Newsroom:', 'Project Name' ),
		'not_found'          => __( 'No Newsrooms found.', 'Project Name' ),
		'not_found_in_trash' => __( 'No Newsroom found in Trash.', 'Project Name' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'Project Name' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'events' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'newsroom', $args );
}

/* Register Custom Taxonomy for Board Members */

// hook into the init action and call create_video_taxonomies when it fires
add_action( 'init', 'create_board_member_taxonomies', 0 );

// create two taxonomies, genres and writers for the post type "book"
function create_board_member_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Categories' ),
		'all_items'         => __( 'All Categories' ),
		'parent_item'       => __( 'Parent Category' ),
		'parent_item_colon' => __( 'Parent Category:' ),
		'edit_item'         => __( 'Edit Category' ),
		'update_item'       => __( 'Update Category' ),
		'add_new_item'      => __( 'Add New Category' ),
		'new_item_name'     => __( 'New Category Name' ),
		'menu_name'         => __( 'Categories' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'news-type-category' ),
	);

	register_taxonomy( 'news_type_category', array( 'Test' ), $args );
}

/* Projects Custom Post Type End */