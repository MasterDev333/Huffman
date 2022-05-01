<?php
/*
Template Name: Home
Template Post Type: page
*/
get_header(); ?>
<?php if( have_rows( 'modules' ) ): 
    while( have_rows( 'modules' ) ): the_row(); ?>
        <?php if( get_row_layout() == 'banner' ): ?>
            <section class="intro-section">
                <div class="container">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h1', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn btn-primary btn-white', 'w' => 'div', 'wc' => 'btn-unit' ) ); ?>
                </div>
                <div class="bg-stretch">
                    <?php if( $image = get_sub_field( 'background_mobile' ) ): ?>
                    <picture>
                        <?php if( $img = get_sub_field( 'background' ) ): ?>
                        <source srcset="<?php echo $img['url']; ?>" media="(min-width: 768px)">
                        <?php endif; ?>
                        <img src="<?php echo $image['url']; ?>" 
                            alt="<?php echo $image['alt']; ?>">
                    </picture>
                    <?php endif; ?>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'result_slider' ): ?>
            <section class="result-section">
                <div class="container">
                    <div class="slider-holder">
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'headtitle' ) ); ?>
                        <?php if( have_rows( 'slider' ) ): ?>
                        <div class="result-slider swiper">
                            <div class="swiper-wrapper">
                                <?php while( have_rows( 'slider' ) ): the_row( ); ?>
                                <div class="swiper-slide">
                                    <div class="result-card">
                                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h4' ) ); ?>
                                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'result', 't' => 'h2', 'tc' => 'result-card-subtitle' ) ); ?>
                                        <a href="#" class="btn-more">&nbsp;</a>
                                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'description', 't' => 'p', 'w' => 'div', 'wc' => 'expanded' ) ); ?>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="slider-navigation">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-unit' ) ); ?>
                        <div class="bg-stretch">
                            <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-04.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-04@2x.jpg 2x'; ?>">
                        </div>
                    </div>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'company_section' ): ?>
            <section class="company-section">
                <div class="container">
                    <div class="section-head">
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'headtitle' ) ); ?>
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'sub_heading', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
                    </div>
                    <div class="tile-unit">
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'left_content', 'w' => 'div', 'wc' => 'tile-unit-item' ) ); ?>

                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'right_content', 'w' => 'div', 'wc' => 'tile-unit-item' ) ); ?>
                    </div>
                    <div class="tile-module wow">
                        <div class="tile-module-content bg-primary">
                            <span class="line-1">&nbsp;</span>
                            <span class="line-2">&nbsp;</span>
                            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'tile_heading', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline center wow' ) ); ?>
                            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'tile_content', 't' => 'p' ) ); ?>
                        </div>
                        <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'image', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'tile-module-visual order' ) ); ?>
                    </div>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'about_section' ): ?>
            <section class="about-section">
                <div class="container">
                    <div class="tile-module wow reverse">
                        <div class="tile-module-content bg-white">
                            <div class="content-wrap">
                                <span class="line-1">&nbsp;</span>
                                <span class="line-2">&nbsp;</span>
                                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'section-headline-title title-2', 'w' => 'div', 'wc' => 'section-headline left wow' ) ); ?>
                                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content' ) ); ?>
                                <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-holder' ) ); ?>
                            </div>
                        </div>
                        <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'image', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'tile-module-visual v3' ) ); ?>
                    </div>
                </div>
                <div class="bg-stretch">
                    <picture>
                        <source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-05.jpg'; ?>" media="(min-width: 768px)">
                        <source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-md-05.jpg'; ?>" media="(min-width: 1024px)">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-05.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-05@2x.jpg'; ?> 2x">
                    </picture>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'speciality' ): ?>
            <section class="section">
                <div class="container">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
                    <?php if( have_rows( 'items' ) ): ?>
                    <ul class="services-list">
                        <?php while( have_rows( 'items' ) ): the_row( ); ?>
                        <li>
                            <?php if( $link = get_sub_field( 'link' ) ): ?>
                            <a href="<?php echo $link['url']; ?>" class="service-card" target="<?php echo $link['target'] ?: '_self'; ?>">
                                <span class="service-card-title"><?php echo $link['title']; ?></span>
                                <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'image', 'is' => false, 'v2x' => false, 'w' => 'span', 'wc' => 'bg-stretch' ) ); ?>
                            </a>
                            <?php endif; ?>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-unit' ) ); ?>
                </div>
                <div class="bg-stretch">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-01.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-01@2x.jpg'; ?> 2x">
                </div>
            </section>
        <?php elseif( get_row_layout() == 'contact' ): ?>
            <section class="cta-section section">
                <div class="container">
                    <div class="tile-module wow">
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content', 't' => 'div', 'tc' => 'tile-module-content' ) ); ?>
                        <div class="tile-module-content bg-primary">
                            <span class="line-1">&nbsp;</span>
                            <span class="line-2">&nbsp;</span>
                            <form action="#" class="cta-form">
                                <div class="section-headline wow">
                                    <h2 class="section-headline-title">Contact Our firm</h2>
                                    <span class="subtitle">Put Our Family to Work for Your family</span>
                                </div>
                                <div class="form-row">
                                    <div class="form-field">
                                        <input type="text" class="input-form">
                                        <label>First Name</label>
                                    </div>
                                    <div class="form-field">
                                        <input type="text" class="input-form">
                                        <label>Last Name</label>
                                    </div>
                                    <div class="form-field">
                                        <input type="tel" class="input-form">
                                        <label>Phone</label>
                                    </div>
                                    <div class="form-field">
                                        <input type="email" class="input-form">
                                        <label>Email</label>
                                    </div>
                                </div>
                                <div class="form-field">
                                    <select>
                                        <option selected="" disabled=""></option>
                                        <option value="1">Yes, I am a potential new client</option>
                                        <option value="2">No, I'm a current existing client</option>
                                        <option value="3">I'm neither.</option>
                                    </select>
                                    <label>Are you a new client?</label>
                                </div>
                                <div class="form-field">
                                    <textarea class="input-form"></textarea>
                                    <label>Message</label>
                                </div>
                                <div class="btn-form">
                                    <button class="btn btn-primary btn-white">Send Information</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="bg-stretch">
                    <picture>
                        <source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-06.jpg'; ?>" media="(min-width: 768px)">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-06.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-06@2x.jpg'; ?> 2x">
                    </picture>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'team' ): ?>
            <section class="team-section section">
                <div class="container">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
                    <?php if( have_rows( 'team' ) ): ?>
                    <div class="team-tabset">
                        <ul class="control-list">
                            <?php while( have_rows( 'team' ) ): the_row( ); ?>
                            <li class="<?php echo get_row_index() == 1 ? 'active' : ''; ?>">
                                <a href="#" data-tabs="tab-<?php echo get_row_index(); ?>">
                                    <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'image', 'is' => false, 'v2x' => false ) ); ?>
                                </a>
                            </li>
                            <?php endwhile; ?>
                        </ul>
                        <div class="team-slider swiper">
                            <div class="swiper-wrapper">
                                <?php while( have_rows( 'team' ) ): the_row( ); ?>
                                <div class="swiper-slide <?php echo get_row_index() == 1 ? 'active' : ''; ?>" data-tabs-name="tab-<?php echo get_row_index(); ?>">
                                    <div class="team-card">
                                        <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'image', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'team-card-visual' ) ); ?>
                                        <div class="team-card-content">
                                            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'name', 't' => 'h3', 'tc' => 'subtitle' ) ); ?>
                                            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'role', 't' => 'span', 'tc' => 'position' ) ); ?>
                                            <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'bio', 't' => 'p' ) ); ?>
                                            <a href="#" class="btn btn-secondary">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="slider-navigation">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-init' ) ); ?>
                </div>
                <div class="bg-stretch">
                    <picture>
                        <source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-03.jpg'; ?>" media="(min-width: 1024px)">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-03.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-03@2x.jpg'; ?> 2x">
                    </picture>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'testimonial' ): ?>
            <section class="testimonial-section">
                <div class="container">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
                    <?php if( have_rows( 'testimonials' ) ): ?>
                    <div class="testimonial-slider swiper">
                        <div class="swiper-wrapper">
                            <?php while( have_rows( 'testimonials' ) ): the_row( ); ?>
                            <div class="swiper-slide">
                                <blockquote>
                                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                                    <?php if( $name = get_sub_field( 'name' ) ): ?>
                                    <strong class="author">- <?php echo $name; ?>.</strong>
                                    <?php endif; ?>
                                </blockquote>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="slider-navigation">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn btn-primary', 't' => 'div', 'tc' => 'btn-init' ) ); ?>
                </div>
                <div class="bg-stretch">
                    <picture>
                        <source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-02.jpg'; ?>" media="(min-width: 768px)">
                        <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-02.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-sm-02@2x.jpg'; ?> 2x">
                    </picture>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'community' ): ?>
            <section class="community-section section">
                <div class="container">
                    <div class="tile-module wow">
                        <div class="tile-module-content bg-white">
                            <div class="content-wrap">
                                <span class="line-1">&nbsp;</span>
                                <span class="line-2">&nbsp;</span>
                                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                                <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-holder' ) ); ?>
                            </div>
                        </div>
                        <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'image', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'tile-module-visual' ) ); ?>
                    </div>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'content_section' ): ?>
            <section class="content-section section">
                <div class="container md">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content' ) ); ?>
                    <hr class="divider">
                    <div class="content-info">
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'content_info_heading', 't' => 'strong' ) ); ?>
                        <?php if( $link = get_sub_field( 'content_info_link' ) ): ?>
                        <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
                        <?php endif; ?>
                    </div>
                    <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'image', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'article-img' ) ); ?>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'videos' ): ?>
            <section class="video-section section">
                <div class="container">
                    <div class="section-headline wow">
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'section-headline-title' ) ); ?>
                        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'subtitle', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
                    </div>
                    <?php if( have_rows( 'video' ) ): ?>
                    <div class="slider-mobile swiper">
                        <div class="swiper-wrapper">
                            <?php while( have_rows( 'video' ) ): the_row( ); ?>
                            <div class="swiper-slide">
                                <div class="video-holder">
                                    <div class="thumb">
                                        <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'poster', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'bg-stretch' ) ); ?>
                                        <button class="btn-play">
                                            <svg width="162" height="161">
                                                <use xlink:href="<?php echo get_template_directory_uri() . '/assets/img/sprite.svg#play'; ?>"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <?php echo get_sub_field( 'external_video' ); ?>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="slider-navigation">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-unit' ) ); ?>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'blogs' ): ?>
            <section class="section">
                <div class="container">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
                    <?php if( $posts = get_sub_field( 'articles' ) ): ?>
                    <ul class="row-list">
                        <?php foreach( $posts as $post ): ?>
                        <li>
                            <?php get_template_part( 'template-parts/loop', 'post-card' ); ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-unit' ) ); ?>
                </div>
            </section>
        <?php endif; ?>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>