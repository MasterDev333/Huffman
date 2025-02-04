<div class="testimonial-card">
    <div class="testimonial-card-content">
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'title', 'o' => 'f', 't' => 'h3', 'tc' => 'testimonial-card-title' ) ); ?>
        <blockquote>
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'p' ) ); ?>
            <span class="author">- <?php the_title( ); ?></span>
        </blockquote>
    </div>
    <?php if( $ratings = get_field( 'rating' ) ): ?>
    <div class="rating-block">
        <ul class="rating-list">
            <?php for( $i = 0; $i < intval( $ratings ); $i++ ): ?>
            <li>
                <svg width="24" height="24">
                    <use xlink:href="<?php echo get_template_directory_uri(  ) . '/assets/img/sprite.svg#star'; ?>"></use>
                </svg>
            </li>
            <?php endfor; ?>
        </ul>
    </div>
    <?php endif; ?>
</div>