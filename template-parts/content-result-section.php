<section class="result-section">
    <div class="container">
        <div class="slider-holder">
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'rc_heading', 'o' => 'o', 't' => 'h2', 'tc' => 'headtitle' ) ); ?>
            <?php if( have_rows( 'rc_items', 'options' ) ): ?>
            <div class="result-slider swiper">
                <div class="swiper-wrapper">
                    <?php while( have_rows( 'rc_items', 'options' ) ): the_row( ); ?>
                    <div class="swiper-slide">
                        <div class="result-card">
                            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h4' ) ); ?>
                            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'result', 't' => 'h2', 'tc' => 'result-card-subtitle' ) ); ?>
                            <a href="#" class="btn-more">&nbsp;</a>
                            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'description', 't' => 'p', 'w' => 'div', 'wc' => 'expanded' ) ); ?>
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
            <?php endif; ?>
            <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'rc_cta', 'o' => 'o', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-unit' ) ); ?>
            <div class="bg-stretch">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-04.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-04@2x.jpg 2x'; ?>">
            </div>
        </div>
    </div>
</section>