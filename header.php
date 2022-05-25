<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php /*<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">*/ ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="wrapper">
		<header class="header">
			<div class="header-menu-wrapper">
				<div class="container">
					<a href="<?php echo home_url( ); ?>" class="logo">
						<?php get_template_part_args( 'template-parts/content-modules-image', array( 'v' => 'logo', 'o' => 'o', 'c' => 'logo-light' ) ); ?>
					</a>

					<div class="nav-drop">
						<nav class="nav">
							<?php wp_nav_menu( array(
								'menu' 			=> 'Main Menu',
								'menu_class'	=> 'header-menu',
								'container'		=> false
							) ); ?>
							<div class="header-social">
								<?php if( $location = get_field( 'location', 'options' ) ): ?>
								<a href="<?php echo $location['url']; ?>" class="btn btn-primary" target="<?php echo $location['target'] ?: '_self'; ?>">
									<?php echo $location['title']; ?>
								</a>
								<?php endif; ?>
								<strong class="header-social-title">Follow Us</strong>
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
						</nav>
					</div>
					<div class="header-holder">
						<?php if( $phone = get_field( 'phone', 'option' ) ): ?>
						<a href="tel:<?php echo $phone; ?>" class="contact-block">
							<span class="contact-block-icon">
								<svg width="18" height="18">
									<use xlink:href="<?php echo get_template_directory_uri() . '/assets/img/sprite.svg#phone'; ?>"></use>
								</svg>
							</span>
							<span class="contact-block-inner">
								<span>Call Us</span>
								<strong><?php echo $phone; ?></strong>
								<span></span>
							</span>
						</a>
						<?php endif; ?>
						<div class="header-holder-btn">
							<a href="#" class="btn btn-accent-primary">Contact Us</a>
						</div>
					</div>
					<button class="nav-opener"><span></span></button>
				</div>
			</div>
		</header>
		<?php if( !is_404( ) && !is_singular( 'video' ) ): ?>
			<?php if( is_page( ) ): ?>
				<?php 
					if( !is_page_template( 'page-templates/home.php' ) ):
						get_template_part( 'template-parts/content', 'banner' ); 
					endif;
				?>
			<?php else: ?>
				<section class="hero-section hero-single">
					<div class="container">
						<div class="section-headline left wow">
							<h1 class="section-headline-title title-1">
								<?php $title = get_the_title( ); ?>
								<?php 
								if( is_tax( 'video_category' ) ):
									$title = 'Videos';
								elseif( is_archive(  ) ): 
									$title = 'Blog';
								endif; ?>
								<?php echo $title; ?>
							</h1>
						</div>
					</div>
					<div class="bg-stretch bg-overlay">
						<picture>
							<source srcset="<?php echo get_template_directory_uri() . '/assets/img/bg-hero-02.jpg'; ?>" media="(min-width: 768px)">
							<img src="<?php echo get_template_directory_uri() . '/assets/img/bg-hero-sm-02.jpg'; ?>" alt="image description">
						</picture>
					</div>
				</section>
			<?php endif; ?>
		<?php endif; ?>
