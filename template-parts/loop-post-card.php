<div class="article-card">
    <h3 class="article-card-title"><?php echo get_the_title(); ?></h3>
    <span class="time-block">
        <time content="<?php echo get_the_date( 'M d' ); ?>"><?php echo get_the_date( 'M d' ); ?></time>
    </span>
    <div class="text-wrap">
        <p><?php echo get_the_excerpt( ); ?></p>
    </div>
    <a href="<?php echo get_the_permalink( ); ?>" class="btn btn-secondary">View Article</a>
</div>