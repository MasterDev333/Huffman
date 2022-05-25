<?php
/*
Template Name: Contact
Template Post Type: page
*/
get_header(); ?>
<section class="contact-info">
    <div class="container">
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'c1_heading', 'o' => 'f', 't' => 'h1', 'tc' => 'h2 section-headline-title', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'c1_sub_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'subtitle contact-info__subheading', 'w' => 'div', 'wc' => 'section-head' ) ); ?>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'c1_content', 'o' => 'f', 't' => 'p', 'tc' => 'contact-info__content' ) ); ?> 
    </div>
    <div class="bg-stretch">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-01.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-01@2x.jpg'; ?> 2x">
    </div>
</section>
<section class="form-map">
    <div class="container">
        <?php if( $form = get_field( 'form' ) ): ?>
            <div class="form-map__form bg-primary wow">
                <span class="line-1">&nbsp;</span>
                <span class="line-2">&nbsp;</span>
                <div class="cta-form">
                    <?php echo do_shortcode( $form ); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'map', 'o' => 'f', 't' => 'div', 'tc' => 'form-map__map' ) ); ?>
    </div>
</section>
<?php get_footer(); ?>