<?php
/*
Template Name: About
Template Post Type: page
*/
get_header(); ?>
<section class="hero-section">
    <div class="container">
        <div class="hero-category wow">
            <span class="line-1">&nbsp;</span>
            <span class="line-2">&nbsp;</span>
            <div class="section-headline wow">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h1', 'tc' => 'section-headline-title' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'description', 'o' => 'f', 't' => 'p' ) ); ?>
        </div>
    </div>
    <?php if( $image = get_field( 'banner' ) ): ?>
    <div class="bg-stretch bg-overlay">
        <picture>
            <source srcset="<?php echo $image['sizes']['banner-lg']; ?>" media="(min-width: 768px)">
            <img src="<?php echo $image['sizes']['banner-sm']; ?>" alt="<?php echo $image['alt']; ?>">
        </picture>
    </div>
    <?php endif; ?>
</section>
<?php
$args = array(
    'post_type'         => 'testimonial',
    'post_status'       => 'publish',
    'posts_per_page'    => '-1'
);
$query = new WP_Query( $args ); 
if( $query->have_posts( ) ): ?>
<section class="section-module">
    <div class="container">
        <ul class="testimonial-list">
            <?php if( $query->have_posts( ) ): $query->the_post( ); ?>
            <li>
                <?php get_template_part( 'template-parts/loop', 'testimonial' ); ?>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</section>
<?php endif;
wp_reset_query(  ); ?>
<?php get_footer(); ?>