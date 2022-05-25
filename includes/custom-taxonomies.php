<?php
/**
 * Custom taxonomies for use with this theme
 *
 *
 */
function custom_taxonomies() {
    // Success Category category
    register_taxonomy(
        'success_category',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'success',             // post type name
        array(
            'hierarchical'  => true,
            'label'         => 'Success Categories', // display name
            'query_var'     => true,
		    'show_in_rest'  => true,
            'rewrite'       => array(
                'with_front' => false,
            )
        )
    );
    // Video Category category
    register_taxonomy(
        'video_category',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'video',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Video Categories', // display name
            'query_var' => true,
		    'show_in_rest' => true,
            'rewrite'       => array(
                'with_front' => false,
                'slug'      => 'video'
            )
        )
    );
}
add_action( 'init', 'custom_taxonomies');
