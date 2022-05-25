<a href="<?php echo get_the_permalink(); ?>" class="video-link">
    <?php if( has_post_thumbnail( ) ): ?>
    <img src="<?php echo get_the_post_thumbnail_url( ); ?>" alt="<?php echo get_the_title( ); ?>">
    <?php endif; ?>
    <span class="video-link-icon">
        <svg width="36" height="36">
            <use xlink:href="<?php echo get_template_directory_uri() . '/assets/img/sprite.svg#play2'; ?>"></use>
        </svg>
    </span>
    <span class="video-link-title h4"><?php echo get_the_title(); ?></span>
</a>