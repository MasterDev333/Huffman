<?php
/*
Template Name: Videos
Template Post Type: page
*/
get_header(); ?>
<?php echo breadcrumb_trail( array( 'separator' => '' ) );  ?>
<section class="videos-section section">
    <div class="container">
        <div class="category-head">
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'video_category', 'o' => 'f', 't' => 'h2', 'tc' => 'category-head-title title-4' ) ); ?>
            <?php $count = count( get_field( 'video_links' ) );
            $text = $count > 1 ? '(' . $count . ') Videos' : '(' . $count . ') Video'; ?>
            <div class="btn-holder">
                <a href="#" class="btn btn-accent-primary"><?php echo $text; ?></a>
            </div>
        </div>
        <?php if( have_rows( 'video_links' ) ): ?>
        <ul class="video-category">
            <?php while( have_rows( 'video_links' ) ): the_row( ); 
            $link = get_sub_field( 'video_link' ); ?>
            <li>
                <a href="<?php echo $link['url']; ?>" class="video-link" target="<?php echo $link['target']; ?>">
                    <?php if( $image = get_sub_field( 'image' ) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="image description">
                    <?php endif; ?>
                    <span class="video-link-icon">
                        <svg width="36" height="36">
                            <use xlink:href="<?php echo get_template_directory_uri() . '/assets/img/sprite.svg#play2'; ?>"></use>
                        </svg>
                    </span>
                    <span class="video-link-title h4"><?php echo $link['title']; ?></span>
                </a>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
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