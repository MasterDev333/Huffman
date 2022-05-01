<?php

global $wp_query;
$count = 0;
$postData = $_POST;
$postslisted = (int) $postData['postslisted'];
$paged = (int) $postData['paged'];

if (count($wp_query->posts) > 0) :
    global $post;
    foreach ($wp_query->posts as $post):
        setup_postdata($post);
        $post_id = get_the_ID();
        ?>

			<?php 
				$attachment_id = get_post_thumbnail_id($post_id);
				$resource_thumb = wp_get_attachment_image_src($attachment_id, 'related-post-thumbnail', true);
				$resource_thumb_2x = wp_get_attachment_image_src($attachment_id, 'related-post-thumbnail-2x', true);
				$featured_img_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);

				$resource_dummy_img = get_template_directory_uri().'/assets/img/logo.svg';
			?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="box-post">
                    <div class="box-post_img">
                        <a href="<?php echo get_the_permalink( $post_id ); ?>">
                            <?php $category = get_primary_taxonomy_term( $post_id );
                            if( $category ): ?>
                                <div class="tag-block">
                                    <span class="tag"><?php echo $category['title']; ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if( has_post_thumbnail( $post_id ) ): ?>
                                <img src="<?php echo $resource_thumb[0]; ?>" 
                                    width="314" height="154" 
                                    srcset="<?php echo $resource_thumb_2x[0]; ?> 2x"
                                    alt="<?php echo $featured_img_alt; ?>">
                            <?php else: ?>
                                <img src="<?php echo $resource_dummy_img; ?>" alt="" width="314" height="154">
                            <?php endif; ?>
                        </a>
                    </div>
                    <h3 class="box-post_ttl"><a href="<?php echo get_the_permalink( $post_id ); ?>"><?php echo get_the_title( ); ?></a></h3>
                    <p class="box-post_excerpt"><?php echo get_the_excerpt( $post_id ); ?></p>
                </div>
            </div>
        <?php
        $count++;
    endforeach;
    wp_reset_postdata();
else: ?>
	<section class="no-results-s">
		<div class="container">
			<div class="no-results-b">
				<div class="h-wrap">
					<h3 class="b-ttl">No resources</h3>
					<p>Reset all filters, or try a different search term</p>
				</div>
			</div>
		</div>
	</section>
<?php endif;