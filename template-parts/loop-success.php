<?php global $post; ?>
<div class="single-success">
    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'benefits', 'o' => 'f', 't' => 'div', 'tc' => 'single-success__title' ) ); ?>
    <div class="single-success__content">
        <h3 class="single-success__heading"><?php echo get_the_title( ); ?></h3>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'description', 'o' => 'f', 't' => 'div', 'tc' => 'single-success__description' ) ); ?>
    </div>
</div>