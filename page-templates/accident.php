<?php
/*
Template Name: Accident
Template Post Type: page
*/
get_header(); ?>
<section class="main-section">
    <div class="container">
        <div class="main-wrapper">
            <aside class="sidebar">
                <div class="side-results wow side-item">
                    <span class="line-1">&nbsp;</span>
                    <span class="line-2">&nbsp;</span>
                    <?php if( have_rows( 'slider' ) ): ?>
                    <div class="results swiper">
                        <div class="swiper-wrapper">
                            <?php while( have_rows( 'slider' ) ): the_row( ); ?>
                            <div class="swiper-slide">
                                <div class="result-card">
                                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'title', 't' => 'h4' ) ); ?>
                                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'result', 't' => 'h2', 'tc' => 'result-card-subtitle' ) ); ?>
                                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'description', 't' => 'p' ) ); ?>
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
                </div>
                <div class="side-contact side-item">
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'form_heading', 't' => 'h2' ) ); ?>
                    <form action="#">
                        <h3 class="title-3"></h3>
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
                        <div class="form-field">
                            <select>
                                <option selected="" disabled="">&nbsp;</option>
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
                            <button class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
                <div class="side-nav bg-primary side-item">
                    <h2 class="side-nav-title title-3"><a href="#">Car Accidents</a></h2>
                    <?php if( have_rows( 'menus' ) ): ?>
                    <ul class="menu">
                        <?php while( have_rows( 'menus' ) ): the_row( ); 
                            get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'menu', 'w' => 'li' ) ); 
                        endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </aside>
            <div class="content">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_heading', 'o' => 'f', 't' => 'h2' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_sub_heading', 'o' => 'f', 't' => 'h3', 'tc' => 'subtitle' ) ); ?>
                <?php if( have_rows( 's1_buttons' ) ): ?>
                <div class="btn-block">
                    <?php while( have_rows( 's1_buttons' ) ): the_row( ); 
                        get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'link', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-block-item' ) );
                    endwhile; ?>
                </div>
                <?php endif; ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's1_content', 'o' => 'f', 't' => 'div', 'tc' => 'content-inner' ) ); ?>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="container">
        <div class="tile-module wow reverse">
            <div class="tile-module-content bg-white">
                <div class="content-wrap">
                    <span class="line-1">&nbsp;</span>
                    <span class="line-2">&nbsp;</span>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's2_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'section-headline-title title-2', 'w' => 'div', 'wc' => 'section-headline left wow' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's2_content', 'o' => 'f', 't' => 'div' ) ); ?>
                    <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 's2_cta', 'o' => 'f', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-holder' ) ); ?>
                </div>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 's2_image', 'o' => 'f', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'tile-module-visual v3' ) ); ?>
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

<section class="section">
    <div class="container">
        <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's3_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline wow' ) ); ?>
        <?php if( $testimonials = get_field( 's3_testimonials' ) ): ?>
        <ul class="row-list">
            <?php foreach( $testimonials as $testimonial ): ?>
            <li>
                <div class="review-card wow">
                    <span class="line-1">&nbsp;</span>
                    <span class="line-2">&nbsp;</span>
                    <blockquote>
                        <p><?php the_field( 'title', $testimonial ); ?></p>
                        <strong class="author">- <?php echo get_the_title( $testimonial ); ?></strong>
                    </blockquote>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 's3_cta', 'o' => 'f', 'c' => 'btn btn-primary', 'w' => 'div', 'wc' => 'btn-init' ) ); ?>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="cta-module wow">
            <span class="line-1">&nbsp;</span>
            <span class="line-2">&nbsp;</span>
            <div class="section-headline wow">
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's4_heading', 'o' => 'f', 't' => 'h2', 'tc' => 'section-headline-title' ) ); ?>
                <?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 's4_sub_heading', 'o' => 'f', 't' => 'p' ) ); ?>
            </div>
            <?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 's4_cta', 'o' => 'f', 'c' => 'btn btn-primary white', 'w' => 'div', 'wc' => 'cta-module-btn' ) ); ?>
        </div>
    </div>
    <div class="bg-stretch">
        <img src="<?php echo get_template_directory_uri() . '/assets/img/bg-section-04.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-04@2x.jpg'; ?> 2x">
    </div>
</section>
<?php get_footer(); ?>
