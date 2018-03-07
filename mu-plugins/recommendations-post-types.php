<?php 

function recommendations_post_types() {

	// Profile Post Type
	register_post_type('profile', array(
		// Make post type editable in user role plugin
		'capability_type' => 'profile',
		'map_meta_cap' => true,
		// Add post type to REST api
		'show_in_rest' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		// Set the slug of the profile page
		'rewrite' => array('slug' => 'profiles'),
		'public' => true,
		'labels' => array(
			'name' => 'Profiles',
			'add_new_item' => 'Add New Profile',
			'edit_item' => 'Edit Profile',
			'view_item' => 'View Profile',
			'all_items' => 'All Profiles',
			'singular_name' => 'Profile'
		),
		'menu_icon' => 'dashicons-welcome-widgets-menus',
		'menu_position' => 4
	));

	// Thing Post Type
	register_post_type('thing', array(
		// Make post type editable in user role plugin
		'capability_type' => 'thing',
		'map_meta_cap' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		// Set the slug of the things page
		'rewrite' => array('slug' => 'things'),
		'public' => true,
		'taxonomies'  => array( 'category' ),
		'has_archive' => true,
		'labels' => array(
			'name' => 'Things',
			'add_new_item' => 'Add New Thing',
			'edit_item' => 'Edit Thing',
			'view_item' => 'View Thing',
			'all_items' => 'All Things',
			'singular_name' => 'Thing'
		),
		'menu_icon' => 'dashicons-book-alt',
		'menu_position' => 5
	));

	// Author Post Type
	register_post_type('creator', array(
		// Make post type editable in user role plugin
		'capability_type' => 'creator',
		'map_meta_cap' => true,
		'supports' => array('title', 'editor', 'thumbnail'),
		// Set the slug of the author page
		'rewrite' => array('slug' => 'creators'),
		'public' => true,
		'has_archive' => true,
		'labels' => array(
			'name' => 'Creators',
			'add_new_item' => 'Add New Creator',
			'edit_item' => 'Edit Creator',
			'view_item' => 'View Creator',
			'all_items' => 'All Creators',
			'singular_name' => 'Creator'
		),
		'menu_icon' => 'dashicons-businessman',
		'menu_position' => 6
	));
}

add_action('init', 'recommendations_post_types');