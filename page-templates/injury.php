<?php
/*
Template Name: Injury
Template Post Type: page
*/
get_header(); ?>
<section class="content-section section">
    <div class="container">
        <div class="section-head text-center">
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'headtitle' ) ); ?>
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_sub_heading', 'o' => 'f', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
        </div>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_content', 'o' => 'f', 't' => 'div' ) ); ?>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_highlight', 'o' => 'f', 't' => 'div', 'tc' => 'text-highlight bg-primary' ) ); ?>
        <div class="text-start">
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's2_heading', 'o' => 'f', 't' => 'h3', 'tc' => 'subtitle' ) ); ?>
            <?php if( have_rows( 's2_faqs' ) ): ?>
            <ul class="item-list">
                <?php while( have_rows( 's2_faqs' ) ): the_row( ); ?>
                <li>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'question', 't' => 'strong' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'answer', 't' => 'div' ) ); ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="areas-section section">
    <div class="container">
        <div class="tile-module wow reverse">
            <div class="tile-module-content bg-primary">
                <span class="line-1">&nbsp;</span>
                <span class="line-2">&nbsp;</span>
                <div class="content-wrap">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's3_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline left wow' ) ); ?>
                    <?php if( have_rows( 's3_tabs' ) ): ?>
                    <ul class="tab-list">
                        <?php while( have_rows( 's3_tabs' ) ): the_row( ); ?>
                        <li class="<?php echo get_row_index() == 1 ? 'active' : ''; ?>">
                            <a href="#" data-tab="tab-<?php echo get_row_index(); ?>"><?php the_sub_field( 'text' ); ?></a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 's3_cta', 'o' => 'f', 'c' => 'btn btn-primary white', 'w' => 'div', 'wc' => 'btn-holder' ) ); ?>
                </div>
            </div>
            <?php if( have_rows( 's3_tabs' ) ): ?>
            <div class="tile-module-tabs order">
                <div class="tab-items">
                    <?php while( have_rows( 's3_tabs' ) ): the_row( ); 
                        if( $image = get_sub_field( 'image' ) ): ?>
                        <div class="tab-image <?php echo get_row_index() == 1 ? 'active' : ''; ?>" data-tab-name="tab-<?php echo get_row_index(); ?>">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        </div>
                    <?php endif;
                    endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="bg-stretch">
        <picture>
            <source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-07.jpg'; ?>" media="(min-width: 768px)">
            <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-07.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-07@2x.jpg'; ?> 2x">
        </picture>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="tile-unit">
            <div class="tile-unit-item">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's4_left_heading', 'o' => 'f', 't' => 'h3', 'tc' => 'subtitle' ) ); ?>
                <?php if( have_rows( 's4_faqs' ) ): ?>
                <ul class="item-list">
                    <?php while( have_rows( 's4_faqs' ) ): the_row( ); ?>
                    <li>
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'question', 't' => 'strong' ) ); ?>
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'answer' ) ); ?>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
            </div>
            <div class="tile-unit-item">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's4_right_heading', 'o' => 'f', 't' => 'h3', 'tc' => 'subtitle' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's4_right_content', 'o' => 'f', 't' => 'div' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's4_highlight', 'o' => 'f', 't' => 'div', 'tc' => 'text-highlight bg-primary' ) ); ?>
            </div>
        </div>
        <div class="tile-module text-center wow">
            <div class="tile-module-content bg-primary">
                <span class="line-1">&nbsp;</span>
                <span class="line-2">&nbsp;</span>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's5_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline center wow' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's5_content', 'o' => 'f', 't' => 'div' ) ); ?>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 's5_image', 'o' => 'f', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'tile-module-visual order' ) ); ?>
        </div>
    </div>
</section>
<section class="values-section section bg-primary">
    <div class="container">
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's6_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'section-headline-title text-white', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
        <?php if( have_rows( 'values' ) ): ?>
        <ul class="values-list">
            <?php 
            $svgs = ['one', 'two', 'three', 'four', 'five', 'six'];
            while( have_rows( 'values' ) ): the_row( ); ?>
            <li>
                <span class="icon">
                    <svg width="8" height="24">
                        <use xlink:href="<?php echo get_template_directory_uri() . '/assets/img/sprite.svg#' . $svgs[get_row_index() - 1]; ?>"></use>
                    </svg>
                </span>
                <span class="h4"><?php the_sub_field( 'text' ); ?></span>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>