<?php
/*
Template Name: About
Template Post Type: page
*/
get_header(); ?>
<section class="about-us-section section">
    <div class="container">
        <div class="tile-module wow">
            <div class="tile-module-content text-start">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_heading', 'o' => 'f', 't' => 'h2' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_sub_heading', 'o' => 'f', 't' => 'h2', 'h2' => 'text-secondary h3' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_content', 'o' => 'f', 't' => 'div' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 's1_cta', 'o' => 'f', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-holder' ) ); ?>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 's1_image', 'o' => 'f', 'w' => 'div', 'wc' => 'tile-module-visual v2' ) ); ?>
        </div>
    </div>
</section>

<section class="staff-section section">
    <div class="container">
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's2_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
        <?php 
        $args = array(
            'post_type'         => 'person',
            'post_status'       => 'publish',
            'posts_per_page'    => '-1'
        );
        $query = new WP_Query( $args ); 
        if( $query->have_posts() ): ?>
        <div class="staff-slider swiper">
            <div class="swiper-wrapper">
                <?php while( $query->have_posts() ): $query->the_post( ); ?>
                <div class="swiper-slide">
                    <div class="team-tile">
                        <?php if( has_post_thumbnail( ) ): ?>
                        <div class="team-tile-visual">
                            <img src="<?php echo get_the_post_thumbnail_url( ); ?>" alt="image description">
                        </div>
                        <?php endif; ?>
                        <div class="team-tile-content">
                            <h5 class="team-tile-title"><?php echo get_the_title( ); ?></h5>
                            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'role', 'o' => 'f', 't' => 'span', 'tc' => 'position' ) ); ?>
                        </div>
                        <a href="<?php echo get_the_permalink( ); ?>" class="link-view">&nbsp;</a>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            <div class="slider-navigation">
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
        <?php endif;
        wp_reset_query(  ); ?>
        <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 's2_cta', 'o' => 'f', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-init' ) ); ?>
    </div>
    <div class="bg-stretch">
        <picture>
            <source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-07.jpg'; ?>" media="(min-width: 768px)">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-07.jpg'; ?>" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-07@2x.jpg'; ?> 2x">
        </picture>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's3_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'headtitle', 'w' => 'div', 'wc' => 'section-head' ) ); ?>
        <div class="tile-unit">
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's3_left_content', 'o' => 'f', 't' => 'div', 'tc' => 'tile-unit-item' ) ); ?>
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's3_right_content', 'o' => 'f', 't' => 'div', 'tc' => 'tile-unit-item' ) ); ?>
        </div>
        <div class="tile-module text-center wow">
            <div class="tile-module-content bg-primary">
                <span class="line-1">&nbsp;</span>
                <span class="line-2">&nbsp;</span>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's4_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline center wow' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's4_content', 'o' => 'f', 't' => 'p' ) ); ?>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 's4_image', 'o' => 'f', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'tile-module-visual order' ) ); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>