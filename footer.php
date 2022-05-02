		<?php if( get_field( 'enable_clients' ) ): 
			$style = get_field( 'clients_style' );
			$title_class = ( $style == 'blue' ) ? 'section-headline-title text-white' : 'section-headline-title';
			$text_class = ( $style == 'blue' ) ? 'text-secondary' : '';
			$btn_class = ( $style == 'blue' ) ? 'btn btn-primary white' : 'btn btn-primary'; ?>
			<section class="clients-section section <?php echo $style == 'blue' ? 'bg-primary' : ''; ?>">
				<div class="container">
					<?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'ct_heading', 'o' => 'o', 't' => 'h2', 'tc' => $title_class, 'w' => 'div', 'wc' => 'section-headline left wow' ) ); ?>
					<?php if( $testimonials = get_field( 'testimonials', 'option' ) ): ?>
					<div class="tile-module wow reverse">
						<div class="tile-module-content <?php echo $style == 'blue' ? 'bg-white' : 'bg-primary'; ?>">
							<span class="line-1">&nbsp;</span>
							<span class="line-2">&nbsp;</span>
							<div class="content-wrap">
								<div class="testimonial-slider swiper">
									<div class="swiper-wrapper">
										<?php foreach( $testimonials as $testimonial ): ?>
										<div class="swiper-slide">
											<h3 class="subtitle <?php echo $text_class; ?>"><?php the_field( 'title', $testimonial ); ?></h3>
											<blockquote>
												<p><?php echo the_field( 'content', $testimonial ); ?></p>
												<strong class="author">- <?php echo get_the_title( $testimonial ); ?></strong>
											</blockquote>
										</div>
										<?php endforeach; ?>
									</div>
									<div class="slider-navigation">
										<div class="swiper-button-prev"></div>
										<div class="swiper-pagination"></div>
										<div class="swiper-button-next"></div>
									</div>
								</div>
							</div>
						</div>
						<?php endif; ?>
						<?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'ct_image', 'o' => 'o', 'is' => false, 'v2x' => false, 'c' => 'img-sm', 'w' => 'div', 'wc' => 'tile-module-visual order' ) ); ?>
					</div>
					<?php get_template_part_args( 'template-parts/content-modules-cta', array( 'v' => 'cta', 'o' => 'o', 'c' => $btn_class, 'w' => 'div', 'wc' => 'btn-init' ) ); ?>
				</div>
			</section>
		<?php endif; ?>
		<?php if( get_field( 'enable_recovered_clients' ) ): ?>
			<?php get_template_part( 'template-parts/content', 'result-section' ); ?>
		<?php endif; ?>
		<?php if( get_field( 'enable_form' ) ): ?>
			<section class="contact-section section md">
				<div class="container">
					<div class="tile-module wow">
						<div class="tile-module-content">
							<form action="#" class="contact-form">
								<div class="section-headline center wow">
									<?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'cf_heading', 'o' => 'o', 't' => 'h2', 'tc' => 'section-headline-title' ) ); ?>
									<?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'cf_sub_heading', 'o' => 'o', 't' => 'span', 'tc' => 'subtitle' ) ); ?>
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
									<button class="btn btn-primary">Send Information</button>
								</div>
							</form>
						</div>
						<div class="tile-module-content bg-primary">
							<span class="line-1">&nbsp;</span>
							<span class="line-2">&nbsp;</span>
							<?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'tile_headline', 'o' => 'o', 't' => 'h2', 'tc' => 'section-headline-title', 'w' => 'div', 'wc' => 'section-headline left wow' ) ); ?>
							<?php if( have_rows( 'tile_list', 'options' ) ): ?>
							<ul class="values-list">
								<?php while( have_rows( 'tile_list', 'options' ) ): the_row( ); ?>
								<li>
									<span class="icon">
										<img src="<?php echo get_template_directory_uri() . '/assets/img/logo-icon.svg'; ?>" alt="image description">
									</span>
									<?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'text', 't' => 'span', 'tc' => 'h4' ) ); ?>
								</li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="bg-stretch">
					<picture>
						<source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-section-06.jpg'; ?>" media="(min-width: 768px)">
						<img src="<?php echo get_template_directory_uri() . '/assets/img/bg-contact-section.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-contact-section@2x.jpg'; ?> 2x">
					</picture>
				</div>
			</section>
		<?php endif; ?>
		<footer class="footer">
			<div class="upper-footer">
				<div class="container">
					<div class="footer-unit">
						<div class="footer-unit-item">
							<a href="<?php echo esc_url( home_url() ); ?>" class="footer-logo">
								<?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'logo', 'o' => 'o', 'is' => false, 'v2x' => false ) ); ?> 
							</a>
							<div class="footer-info">
								<?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'footer_title' ,'o' => 'o', 't' => 'h5', 'tc' => 'footer_title' ) ); ?>
								<?php if( $phone = get_field( 'phone', 'options' ) ): ?>
								<a href="tel:<?php echo $phone; ?>" class="footer-info-tel"><?php echo $phone; ?></a>
								<?php endif; ?>
							</div>
							<div class="social-holder">
								<h5 class="footer-title">Follow Us</h5>
								<?php if( $socials = get_field( 'social_links', 'options' ) ): ?>
								<ul class="socials">
									<?php if( $socials['facebook'] ): ?> 
									<li>
										<a href="<?php echo $socials['facebook']; ?>" target="_blank">
											<svg width="18" height="36">
												<use xlink:href="<?php echo get_template_directory_uri() . '/assets/img/sprite.svg#facebook'; ?>"></use>
											</svg>
										</a>
									</li>
									<?php endif;
									if( $socials['linkedin'] ): ?>
									<li>
										<a href="<?php echo $socials['linkedin']; ?>" target="_blank">
											<svg width="36" height="34">
												<use xlink:href="<?php echo get_template_directory_uri() . '/assets/img/sprite.svg#linkedin'; ?>"></use>
											</svg>
										</a>
									</li>
									<?php endif;
									if( $socials['youtube'] ): ?>
									<li>
										<a href="<?php echo $socials['youtube']; ?>" target="_blank">
											<svg width="36" height="36">
												<use xlink:href="<?php echo get_template_directory_uri() . '/assets/img/sprite.svg#youtube'; ?>"></use>
											</svg>
										</a>
									</li>
									<?php endif; ?>
								</ul>
								<?php endif; ?>
							</div>
						</div>
						<?php if( have_rows( 'footer_widget', 'options' ) ): 
							while( have_rows( 'footer_widget', 'options' ) ): the_row( ); ?>
							<div class="footer-unit-item">
								<?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'title', 't' => 'h5', 'tc' => 'footer-title' ) ); ?>
								<?php if( $phone = get_sub_field( 'phone' ) ): ?>
								<a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a>
								<?php endif; ?>
								<?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'address', 't' => 'address' ) ); ?>
								<?php if( $map = get_sub_field( 'map' ) ): ?>
								<a href="<?php echo $map['url']; ?>" class="location-link" target="_blank">
									<svg width="28" height="36">
										<use xlink:href="<?php echo get_template_directory_uri() . '/assets/img/sprite.svg#map'; ?>"></use>
									</svg>
									<span><?php echo $map['title']; ?></span>
								</a>
								<?php endif; ?>
							</div>
						<?php endwhile;
						endif; ?>
						<div class="footer-unit-item">
							<h5 class="footer-title">Quick Links</h5>
							<?php 
							wp_nav_menu( array(
								'menu' => 'Footer Menu',
								'menu_class' => 'footer-list',
								'container' => false,
							) ); ?>
						</div>
					</div>
					<div class="bg-stretch">
						<picture>
							<source srcset="<?php echo get_template_directory_uri() . '/assets/img/footer-bg.jpg'; ?>" media="(min-width: 767px)">
							<img src="<?php echo get_template_directory_uri() . '/assets/img/footer-bg-sm.jpg'; ?>" alt="image description" srcset="<?php echo get_template_directory_uri() . '/assets/img/footer-bg-sm@2x.jpg'; ?> 2x">
						</picture>
					</div>
				</div>
			</div>
			<div class="under-footer">
				<div class="container">
					<?php get_template_part_args( 'template-parts/content-modules-text', array( 'v' => 'information', 'o' => 'o', 't' => 'p' ) ); ?>
					<span class="copy">&copy; <?php the_date('Y'); ?> All Rights Reserved.</span>
				</div>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>	
</body>
</html>