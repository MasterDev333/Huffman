<?php
/*
Template Name: Attorneys
Template Post Type: page
*/
get_header(); ?>
<section class="section md">
    <div class="container">
        <div class="section-head">
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h2', 'tc' => 'headtitle' ) ); ?>
            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
        </div>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'div', 'tc' => 'text-start' ) ); ?>
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'highlight', 'o' => 'f', 't' => 'h5', 'tc' => 'text-highlight' ) ); ?>
    </div>
</section>
<?php if( $people = get_field( 'people' ) ): ?>
<section class="section">
    <div class="container">
        <ul class="team-list">
            <?php foreach( $people as $person ): ?>
            <li>
                <div class="team-tile">
                    <?php if( has_post_thumbnail( $person ) ): ?>
                    <div class="team-tile-visual">
                        <img src="<?php echo get_the_post_thumbnail_url( $person ); ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <div class="team-tile-content">
                        <h5 class="team-tile-title"><?php echo get_the_title( $person ); ?></h5>
                        <?php if( $role = get_field( 'role', $person ) ): ?>
                        <span class="position"><?php echo $role; ?></span>
                        <?php endif; ?>
                    </div>
                    <a href="<?php echo get_the_permalink( $person ); ?>" class="link-view">&nbsp;</a>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>