<?php
/*
Template Name: Blogs
Template Post Type: page
*/
get_header(); ?>
<?php echo breadcrumb_trail( array( 'separator' => '' ) );  ?>
<section class="blog-section">
    <div class="container">
        <div class="main-wrapper">
            <aside class="sidebar">
                <?php if( $posts = get_field( 'popular_posts' ) ): ?>
                <div class="side-nav side-item">
                    <h2 class="side-nav-title title-3">Most Popular</h2>
                    <ul class="menu">
                        <?php foreach( $posts as $post ): ?>
                        <li><a href="<?php echo get_the_permalink( $post ); ?>"><?php echo get_the_title( $post ); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php 
                wp_reset_postdata(  );
                endif; ?>
                <?php if( $categories = get_categories( array( 'hide_empty' => false ) ) ): ?>
                <div class="side-nav side-item">
                    <h2 class="side-nav-title title-3">Categories</h2>
                    <ul class="menu">
                        <?php foreach( $categories as $category ): ?>
                            <li class="<?php echo (get_term_link( $category ) == home_url( $wp->request  . '/') ) ? 'active' : ''; ?>"><a href="<?php echo get_term_link( $category ); ?>"><?php echo $category->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <!-- <div class="side-nav side-item">
                    <h2 class="side-nav-title title-3">Archives</h2>
                    <ul class="menu">
                        <li>
                            <a href="#">2022 <i>(7)</i></a>
                            <ul>
                                <li><a href="#">April <i>(1)</i></a></li>
                                <li><a href="#">March <i>(2)</i></a></li>
                                <li><a href="#">February <i>(2)</i></a></li>
                                <li><a href="#">January <i>(2)</i></a></li>
                            </ul>
                        </li>
                    </ul>
                </div> -->
            </aside>
            <div class="content">
                <div class="section-headline left wow">
                    <h2 class="section-headline-title h2">Recent News</h2>
                </div>
                <?php 
                $args = array( 
                    'post_type'         => 'post',
                    'post_status'       => 'publish',
                    'posts_per_page'    => 16
                );
                $query = new WP_Query( $args ); 
                if( $query->have_posts( ) ): ?>
                <ul class="row-list md">
                    <?php while( $query->have_posts(  ) ): $query->the_post( ); ?>
                    <li>
                        <div class="article-card">
                            <h3 class="article-card-title"><?php echo get_the_title(  ); ?></h3>
                            <span class="time-block"><?php echo get_the_date( 'M j' ); ?></span>
                            <div class="text-wrap">
                                <?php echo get_the_excerpt( ); ?>
                            </div>
                            <a href="<?php echo get_the_permalink(  ); ?>" class="btn btn-secondary">View Article</a>
                            <a href="<?php echo get_the_permalink(  ); ?>" class="link-view">&nbsp;</a>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php else: ?>
                    <p>No Posts</p>
                <?php endif;
                wp_reset_query(  ); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>