<?php
// Custom ACF Blocks

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a blog image block.
        acf_register_block_type(array(
            'name'              => 'blog_image',
            'title'             => __('Blog Image'),
            'description'       => __('A custom blog image block.'),
            'render_template'   => 'template-parts/blocks/blog-image/blog-image.php',
            'category'          => 'hoopla',
            'icon'              => 'cover-image',
            'keywords'          => array( 'blog', 'image' ),
        ));

        // register a blog text block.
        acf_register_block_type(array(
            'name'              => 'blog_text',
            'title'             => __('Blog Text'),
            'description'       => __('A custom blog text block.'),
            'render_template'   => 'template-parts/blocks/blog-text/blog-text.php',
            'category'          => 'hoopla',
            'icon'              => 'media-text',
            'keywords'          => array( 'blog', 'text' ),
        ));

        // register a blog form block.
        acf_register_block_type(array(
            'name'              => 'blog_form',
            'title'             => __('Blog Form'),
            'description'       => __('A custom blog form block.'),
            'render_template'   => 'template-parts/blocks/blog-form/blog-form.php',
            'category'          => 'hoopla',
            'icon'              => 'forms',
            'keywords'          => array( 'blog', 'form' ),
        ));
    }
}

function custom_block_categories( $categories ) {
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'hoopla',
				'title' => 'Hoopla Blocks',
			],
		]
	);
}
add_action( 'block_categories', 'custom_block_categories', 10, 2 );