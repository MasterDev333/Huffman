<?php $banner_style = get_field( 'banner_style' ); ?>
<section class="hero-section hero-<?php echo $banner_style; ?>">
    <div class="container">
        <?php if( $banner_style == 'single' ): ?>
            <div class="section-headline left wow">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_heading', 'o' => 'f', 't' => 'h1', 'tc' => 'section-headline-title title-1' ) ); ?>
            </div>
        <?php elseif( $banner_style == 'center' ): ?>
            <div class="hero-category wow">
                <span class="line-1">&nbsp;</span>
                <span class="line-2">&nbsp;</span>
                <div class="section-headline wow">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_heading', 'o' => 'f', 't' => 'h1', 'tc' => 'section-headline-title' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_sub_heading', 'o' => 'f', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
                </div>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_description', 'o' => 'f', 't' => 'p' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 's1_cta', 'o' => 'f', 'c' => 'btn btn-primary' ) ); ?>
            </div>
        <?php else: ?>
            <div class="hero-holder wow">
                <span class="line-1">&nbsp;</span>
                <span class="line-2">&nbsp;</span>
                <div class="section-headline left wow">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_heading', 'o' => 'f', 't' => 'h1', 'tc' => 'section-headline-title title-1' ) ); ?>
                </div>
                <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 's1_cta', 'o' => 'f', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-holder'  ) ); ?>
            </div>
        <?php endif; ?>
    </div>
    <?php if( $image = get_field( 'banner_image' ) ): ?>
    <div class="bg-stretch <?php echo $banner_style != 'left' ? 'bg-overlay' : 'end'; ?>">
        <picture>
            <source srcset="<?php echo $image['sizes']['banner-lg']; ?>" media="(min-width: 768px)">
            <img src="<?php echo $image['sizes']['banner-sm']; ?>" alt="<?php echo $image['alt']; ?>">
        </picture>
    </div>
    <?php endif; ?>
</section>