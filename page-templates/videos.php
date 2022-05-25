<?php
/*
Template Name: Videos
Template Post Type: page
*/
get_header(); ?>
<?php echo breadcrumb_trail( array( 'separator' => '' ) );  ?>
<section class="videos-section section">
    <div class="container">
        <?php if( $video_category = get_field( 'video_category' ) ): ?>
        <div class="category-head">
            <h2 class="category-head-title title-4"><?php echo $video_category->name; ?></h2>
            <div class="btn-holder">
                <a href="<?php echo get_term_link( $video_category, 'video_category' ); ?>" class="btn btn-accent-primary">
                    <?php echo $video_category->count; ?> Videos
                </a>
            </div>
        </div>
        <?php endif; ?>
        <?php if( $videos = get_field( 'videos') ): ?>
            <ul class="video-category">
                <?php global $post;
                foreach( $videos as $post ):
                setup_postdata( $post ); ?>
                <li>
                    <?php get_template_part( 'template-parts/loop', 'video' ); ?>
                </li>
                <?php endforeach; ?>
            </ul>
        <?php wp_reset_postdata(  );
        endif; ?>
        <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'o' => 'f', 'w' => 'h3', 'wc' => 'text-highlight title-4' ) ); ?>
        <?php if( have_rows( 'video_list' ) ): ?>
        <ul class="videos-list">
            <?php while( have_rows( 'video_list' ) ): the_row( ); ?>
            <li>
                <?php the_sub_field( 'video' ); ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>