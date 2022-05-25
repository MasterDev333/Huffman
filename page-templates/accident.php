<?php
/*
Template Name: Accident
Template Post Type: page
*/
get_header(); ?>
<section class="main-section">
    <div class="container">
        <div class="main-wrapper">
            <aside class="sidebar">
                <div class="side-results wow side-item">
                    <span class="line-1">&nbsp;</span>
                    <span class="line-2">&nbsp;</span>
                    <?php if( have_rows( 'slider' ) ): ?>
                    <div class="results swiper">
                        <div class="swiper-wrapper">
                            <?php while( have_rows( 'slider' ) ): the_row( ); ?>
                            <div class="swiper-slide">
                                <div class="result-card">
                                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'title', 't' => 'h4' ) ); ?>
                                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'result', 't' => 'h2', 'tc' => 'result-card-subtitle' ) ); ?>
                                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'description', 't' => 'p' ) ); ?>
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
                </div>
                <div class="side-contact side-item">
                    <h2>NO FEE UNLESS WE WIN!</h2>
                    <?php // get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'form_heading', 't' => 'h2' ) ); ?>
                    <?php if( $form = get_field( 'cf_form', 'options' ) ): ?>
                        <?php echo do_shortcode( $form ); ?>
                    <?php endif; ?>
                </div>
                <?php if( $menu = get_field( 'menus' ) ): ?>
                <div class="side-nav bg-primary side-item">
                    <?php wp_nav_menu( array(
                        'menu'          => $menu,
                        'menu_class'    => 'menu',
                        'container'     => false,
                    ) ); ?>
                </div>
                <?php endif; ?>
            </aside>
            <div class="content">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_heading', 'o' => 'f', 't' => 'h2' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_sub_heading', 'o' => 'f', 't' => 'h3', 'tc' => 'subtitle' ) ); ?>
                <?php if( have_rows( 's1_buttons' ) ): ?>
                <div class="btn-block">
                    <?php while( have_rows( 's1_buttons' ) ): the_row( ); 
                        get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'link', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-block-item' ) );
                    endwhile; ?>
                </div>
                <?php endif; ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_content', 'o' => 'f', 't' => 'div', 'tc' => 'content-inner' ) ); ?>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="tile-module wow reverse">
            <div class="tile-module-content bg-white">
                <div class="content-wrap">
                    <span class="line-1">&nbsp;</span>
                    <span class="line-2">&nbsp;</span>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'about_heading', 'o' => 'o', 't' => 'h2', 'tc' => 'section-headline-title title-2', 'w' => 'div', 'wc' => 'section-headline left wow' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'about_content', 'o' => 'o', 't' => 'div', 'tc' => 'item-list__wrapper' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'about_cta', 'o' => 'o', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-holder' ) ); ?>
                </div>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'about_image', 'o' => 'o', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'tile-module-visual v3' ) ); ?>
        </div>
    </div>
    <div class="bg-stretch">
        <picture>
            <source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-05.jpg'; ?>" media="(min-width: 768px)">
            <source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-md-05.jpg'; ?>" media="(min-width: 1024px)">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-05.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-05@2x.jpg'; ?> 2x">
        </picture>
    </div>
</section>

<section class="section">
    <div class="container">
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'clients_heading', 'o' => 'o', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
        <?php if( $testimonials = get_field( 'clients_testimonials', 'options' ) ): ?>
        <ul class="row-list">
            <?php foreach( $testimonials as $testimonial ): ?>
            <li>
                <div class="review-card wow">
                    <span class="line-1">&nbsp;</span>
                    <span class="line-2">&nbsp;</span>
                    <blockquote>
                        <p><?php the_field( 'title', $testimonial ); ?></p>
                        <strong class="author">- <?php echo get_the_title( $testimonial ); ?></strong>
                    </blockquote>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'clients_cta', 'o' => 'o', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-init' ) ); ?>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="cta-module wow">
            <span class="line-1">&nbsp;</span>
            <span class="line-2">&nbsp;</span>
            <div class="section-headline wow">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'consultation_heading', 'o' => 'o', 't' => 'h2', 'tc' => 'section-headline-title' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'consultation_sub_heading', 'o' => 'o', 't' => 'p' ) ); ?>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'consultation_cta', 'o' => 'o', 'c' => 'btn btn-primary white', 'w' => 'div', 'wc' => 'cta-module-btn' ) ); ?>
        </div>
    </div>
    <div class="bg-stretch">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-04.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-04@2x.jpg'; ?> 2x">
    </div>
</section>
<?php get_footer(); ?>
