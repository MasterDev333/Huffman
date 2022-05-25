<div <?php post_class('post') ?> id="post-<?php the_ID(); ?>">
	<div class="container">
		<div class="content-inner">
			<?php the_content(__('Read more', 'am')); ?>
		</div><!-- /entry -->
	</div>
</div><!-- /post -->