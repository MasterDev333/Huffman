<?php get_header(); 
global $wp; ?>
<?php echo breadcrumb_trail( array( 'separator' => '' ) );  ?>
<section class="blog-section">
    <div class="container">
        <div class="main-wrapper">
            <aside class="sidebar">
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
                    <h2 class="section-headline-title h2"><?php echo get_the_archive_title( ); ?></h2>
                </div>
                <?php 
                if( have_posts( ) ): ?>
                <ul class="row-list md">
                    <?php while( have_posts(  ) ): the_post( ); 
                    global $post; ?>
                    <li>
                        <div class="article-card">
                            <h3 class="article-card-title"><?php echo get_the_title( $post ); ?></h3>
                            <span class="time-block"><?php echo get_the_date( 'M j', $post ); ?></span>
                            <div class="text-wrap">
                                <?php echo get_the_excerpt( $post ); ?>
                            </div>
                            <a href="<?php echo get_the_permalink( $post ); ?>" class="btn btn-secondary">View Article</a>
                            <a href="<?php echo get_the_permalink( $post ); ?>" class="link-view">&nbsp;</a>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php else: ?>
                    <p>No Posts</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>