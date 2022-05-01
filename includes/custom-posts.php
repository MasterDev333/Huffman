<?php
/**
 * Custom posts for use with this theme
 *
 *
 */

// Register Custom Post Type
function custom_post_type() {
	// Register Testimonial Custom Post Type
	$labels = array(
		'name'                  => _x( 'Testimonials', 'testimonials', 'text_domain' ),
		'singular_name'         => _x( 'Testimonial', 'testimonial', 'text_domain' ),
		'menu_name'             => __( 'Testimonials', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonials', 'text_domain' ),
		'archives'              => __( 'Testimonials Archives', 'text_domain' ),
		'attributes'            => __( 'Testimonials Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Testimonials:', 'text_domain' ),
		'all_items'             => __( 'All Testimonials', 'text_domain' ),
		'add_new_item'          => __( 'Add Testimonial', 'text_domain' ),
		'add_new'               => __( 'Add Testimonial', 'text_domain' ),
		'new_item'              => __( 'New Testimonial', 'text_domain' ),
		'edit_item'             => __( 'Edit Testimonial', 'text_domain' ),
		'update_item'           => __( 'Update Testimonial', 'text_domain' ),
		'view_item'             => __( 'View Testimonial', 'text_domain' ),
		'view_items'            => __( 'View Testimonials', 'text_domain' ),
		'search_items'          => __( 'Search Testimonials', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Testimonial', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Testimonial', 'text_domain' ),
		'items_list'            => __( 'Testimonials list', 'text_domain' ),
		'items_list_navigation' => __( 'Testimonials list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Testimonials list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Testimonials', 'text_domain' ),
		'description'           => __( 'Testimonials post type', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'menu_icon'				=> 'dashicons-format-quote'
	);
	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'custom_post_type', 0 );
