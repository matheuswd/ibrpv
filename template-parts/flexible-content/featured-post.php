<?php

$args = ($args['featured_post']) ? $args['featured_post'] : false;

/**
 * The possible returns for $args are:
 * @string "Post em destaque"
 * @string "Último post"
 */

if ($args = "Post em destaque") {
    $query_args = array(
        'post_type' => 'post',
        'order' => 'DESC',
        'posts_per_page' => 1,
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'featured_post',
                'value' => 1,
                'compare' => '='
            )
        )
    );
    
    $query = new WP_Query($query_args);
} else {
    $query_args = array(
        'post_type' => 'post',
        'order' => 'DESC',
        'posts_per_page' => 1
    );
    
    $query = new WP_Query($query_args);
}

?>



<div class="container">
<?php

if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>   
        <div>
            <h2><?php the_title(); ?></h2>
            <!-- <?php the_content(); ?> -->
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
<?php endif;  ?>
</div>
