<?php
/*
Template Name: Testimonials
Template Post Type: page
*/
get_header(); ?>
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
            <?php while( $query->have_posts( ) ): $query->the_post( ); ?>
            <li>
                <?php get_template_part( 'template-parts/loop', 'testimonial' ); ?>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
</section>
<?php endif;
wp_reset_query(  ); ?>
<?php get_footer(); ?>