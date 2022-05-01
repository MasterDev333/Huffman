
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