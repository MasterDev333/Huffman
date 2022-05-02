<?php
/*
Template Name: FAQ
Template Post Type: page
*/
get_header(); ?>
<section class="section md">
    <div class="container">
        <div class="section-head text-center">
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h2', 'tc' => 'headtitle' ) ); ?>
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
        </div>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'w', 'tc' => 'text-start' ) ); ?>
    </div>
</section>
<?php if( have_rows( 'qas' ) ): ?>
<section class="section bg-primary">
    <div class="container">
        <div class="accordion-holder">
            <?php while( have_rows( 'qas' ) ): the_row( ); ?>
            <div class="accordion-item">
                <?php if( $title = get_sub_field( 'question' ) ): ?>
                <span class="title-toggle">Q: <?php echo $title; ?></span> 
                <?php endif; ?>
                <?php if( $answer = get_sub_field( 'answer' ) ): ?>
                <div class="expanded">
                    <p data-parent="A:"><?php echo $answer; ?></p>
                </div>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_template_part( 'template-parts/content', 'result-section' ); ?>

<?php get_footer(); ?>