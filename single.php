<?php get_header(); ?>

		<?php // echo breadcrumb_trail(array('separator' => ''));  ?>
		
		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
		
			<?php get_template_part('template-parts/content', 'post'); ?>
			
			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;
			?>
			
		<?php endwhile; ?>
		
	<?php else : ?>
		<?php get_template_part('template-parts/content', 'none'); ?>
	<?php endif; ?>

<?php get_footer(); ?>