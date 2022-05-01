<section class="section pt-7 py-8">
	<div class="container _sm">
		<div class="main-heading">
			<?php 
			$categories = get_the_category(); 
			if( $categories ): ?>
			<div class="tag-block">
				<?php foreach( $categories as $category ): ?>
				<span class="tag"><?php echo $category->name; ?></span>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
			<h1><?php the_title( ); ?></h1>
			<!-- <p><?php the_excerpt(  ); ?></p> -->
			<div class="testimonials-item _row">
				<?php
				$author_id = get_the_author_ID(  );
				if( $img = get_field( 'avatar', 'user_' . $author_id ) ): 
					$src = $img['sizes']['avatar'];
					$srcset = $img['sizes']['avatar-2x']; 
				else: 
					$src = get_avatar_url( $author_id, array( 'size' => 'avatar' ) ); 
					$srcset = get_avatar_url( $author_id, array( 'size' => 'avatar-2x' ) );
				endif; 
				$first_name = get_the_author_meta( 'first_name' );
				$last_name = get_the_author_meta( 'last_name' );
				$full_name = $first_name . ' ' . $last_name; 
				?>
				<div class="testimonials-item_img">
					<img src="<?php echo $src; ?>" 
						width="48" height="48" alt="<?php echo get_the_author_nickname( $author_id ); ?>" 
						srcset="<?php echo $srcset; ?> 2x">
				</div>
				<div class="testimonials-item_content">
					<span class="testimonials-item_name">
						<?php echo ( $first_name || $last_name ) ? $full_name : get_author_name( $author_id ); ?>
					</span>
					<?php if( $role = get_field( 'role', 'user_' . $author_id ) ): ?>
						<p><?php echo $role; ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="blog-single">
			<?php if( has_post_thumbnail( get_the_ID( ) ) ):
				echo get_the_post_thumbnail( get_the_ID( ) );
			endif; ?>
			<?php the_content(); ?>
			<div class="entry-row">
				<div class="block-share">
				<div class="testimonials-item">
					<div class="testimonials-item_img _md">
					<img src="<?php echo $src; ?>" 
						width="48" height="48" alt="<?php echo get_the_author_nickname( $author_id ); ?>" 
						srcset="<?php echo $srcset; ?> 2x">
					</div>
					<div class="testimonials-item_content">
						<span class="testimonials-item_name">
							<?php echo ( $first_name || $last_name ) ? $full_name : get_author_name( $author_id ); ?>
						</span>
						<?php if( $role = get_field( 'role', 'user_' . $author_id ) ): ?>
							<p><?php echo $role; ?></p>
						<?php endif; ?>
					</div>
				</div>
				<div class="share">
					<span>Share Article</span>
					<ul class="social-share">
						<li>
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(  ); ?>"><i class="icon icon-facebook"></i></a>
						</li>
						<li>
							<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink( ); ?>"><i class="icon icon-linkedin"></i></a>
						</li>
						<li>
							<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(  ); ?>&text="><i class="icon icon-twitter"></i></a>
						</li>
					</ul>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>
<?php if( $related_posts = get_field( 'related' ) ): ?> 
<section class="section section-post pb-8 pt-md-2 pb-md-12">
	<div class="container _sm">
		<h2>You might also be interested in:</h2>
		<div class="swiper swiper-post-mobile">
			<div class="swiper-wrapper">
				<?php foreach ( $related_posts as $related_post ): ?>
				<div class="swiper-slide">
					<div class="box-post">
						<div class="box-post_img">
							<a href="<?php echo get_the_permalink( $related_post ); ?>">
								<img src="<?php echo get_the_post_thumbnail_url( $related_post, 'related-post-thumbnail' ); ?>" 
									width="314" height="154" 
									srcset="<?php echo get_the_post_thumbnail_url( $related_post, 'related-post-thumbnail-2x' ); ?> 2x"
									alt="">
							</a>
						</div>
						<h3 class="box-post_ttl">
							<a href="<?php echo get_the_permalink( $related_post ); ?>"><?php echo get_the_title( $related_post ); ?></a>
						</h3>
						<p>
							<?php echo get_the_excerpt( $related_post ); ?>
						</p>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>