<?php
get_header(); ?>
<section class="hero-section hero-center">
    <div class="container">
        <div class="hero-category wow">
            <span class="line-1">&nbsp;</span>
            <span class="line-2">&nbsp;</span>
            <div class="section-headline wow">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => '404_heading', 'o' => 'o', 't' => 'h1', 'tc' => 'section-headline-title' ) ); ?>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => '404_description', 'o' => 'o', 't' => 'p' ) ); ?>
            <div style="margin-top: 50px;">
                <a href="<?php echo home_url( '/' ); ?>" class="btn btn-white">Back To Home</a>
            </div>
        </div>
    </div>
    <?php if( $image = get_field( '404_background', 'options' ) ): ?>
    <div class="bg-stretch <?php echo $banner_style != 'left' ? 'bg-overlay' : 'end'; ?>">
        <picture>
            <source srcset="<?php echo $image['sizes']['banner-lg']; ?>" media="(min-width: 768px)">
            <img src="<?php echo $image['sizes']['banner-sm']; ?>" alt="<?php echo $image['alt']; ?>">
        </picture>
    </div>
    <?php endif; ?>
</section>
<?php get_footer(); ?>