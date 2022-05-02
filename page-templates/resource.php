<?php
/*
Template Name: Resource
Template Post Type: page
*/
get_header(); ?>
<section class="section md">
    <div class="container">
        <div class="text-start">
            <div class="section-head text-start">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h2', 'tc' => 'headtitle' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'description', 'o' => 'f', 't' => 'div' ) ); ?>
        </div>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'highlight', 'o' => 'f', 't' => 'h5', 'tc' => 'text-highlight' ) ); ?>
        <div class="text-start">
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'resource_heading', 'o' => 'f', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
            <?php if( have_rows( 'resources' ) ): ?>
            <ul class="item-list">
                <?php while( have_rows( 'resources' ) ): the_row( ); ?>
                <li>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'link' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'description', 't' => 'span' ) ); ?>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'bottom_highlight', 'o' => 'f', 't' => 'h5', 'tc' => 'text-highlight' ) ); ?>
    </div>
</section>
<?php get_footer(); ?>