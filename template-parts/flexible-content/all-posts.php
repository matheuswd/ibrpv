<?php

$args = wp_parse_args($args, [
    'show_posts' => $args['show_posts'],
]);

if ($args['show_posts']) {
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

    $ignored_posts = array();

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            $id = array_push($ignored_posts, get_the_ID());
        endwhile;
        wp_reset_postdata();
    endif;

    $query_args = array(
        'post_type' => 'post',
        'order' => 'DESC',
        'posts_per_page' => 4,
        'post__not_in' => $ignored_posts,
    );
    
    $query = new WP_Query($query_args);
?>
<div class="container">
    <div class="cards-container">
        <?php
        if ($query->have_posts()) : ?>    
        <?php while ($query->have_posts()) :
            $query->the_post(); ?>
        <div class="card-small">
            <a href="<?php the_permalink(); ?>">
                <div class="card-small__thumbnail">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('full', ['class' => 'img-responsive img-fit']);
                } else { ?>
                    <img src="<?php echo get_template_directory_uri() . '/assets/images/no-image.jpg';?>" alt="" class="img-responsive img-fit">
                <?php } ?>
                </div>
            </a>
            <div class="card-small__content">
                <h2><a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), 3); ?></a></h2>
                <p><?php the_date('d/m/Y'); ?></p>
                <?php the_category(); ?>
            </div>
            
        </div>
        <?php endwhile;
        wp_reset_postdata();
        endif;  ?>
    </div>
</div>
<?php }
