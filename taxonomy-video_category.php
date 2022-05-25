<?php get_header(); ?>
<?php echo breadcrumb_trail( array( 'separator' => '' ) );  ?>

<section class="videos-section section">
    <div class="container">
        <div class="category-head">
            <h2 class="category-head-title title-4"><?php single_cat_title(); ?></h2>
        </div>
        <?php if( have_posts( ) ): ?>
        <ul class="video-category">
            <?php while( have_posts( ) ): the_post( ); ?>
            <li>
                <?php get_template_part( 'template-parts/loop', 'video' ); ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>