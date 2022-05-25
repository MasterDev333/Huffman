<?php
/**
 * Template Name: Successes
 * Template Post Type: page
 */
get_header( ); ?>
<section class="our-successes">
    <div class="container">
        <?php if( $terms = get_terms( [
            'taxonomy'      => 'success_category'
        ] ) ): ?>
        <div class="category">
            <label for="category-select">Choose Category</label>
            <select name="category-select" id="category-select">
                <option value="">All</option>
                <?php foreach( $terms as $term ): ?>
                    <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
        <?php $query = new WP_Query([
            'post_type'         => 'success',
            'posts_per_page'    => -1
        ]);
        if( $query->have_posts( ) ): ?>
        <div class="successes-grid">
            <?php 
            while( $query->have_posts( ) ): $query->the_post( ); 
                get_template_part( 'template-parts/loop', 'success' );
            endwhile; ?>
        </div>
        <?php wp_reset_query(  );
        endif; ?> 
    </div>
</section>
<?php get_footer( ); ?>