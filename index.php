<?php get_header(); ?>

<?php
if(!empty(get_option('page_for_posts'))) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')), 'full');
    $featured_image = $img[0];
}

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
    'posts_per_page' => 6,
    'post__not_in' => $ignored_posts,
    'cat' => $args['categories']
);

$query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$query = new WP_Query($query_args);
?>

<section class="hero" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo $featured_image; ?>')">
    <div class="container hero-inner">
        <div class="intro-text">
            <h1><?php wp_title(''); ?></h1>
        </div>
    </div>
</section>

<section class="fullwidth-white categories-list">
    <div class="container">
        <ul>
            <?php wp_list_categories( array(
                'title_li' => '',
                'exclude' => 1,
            ) ); ?>
        </ul>
    </div>
</section>

<?php if( ! is_paged() ) {
    echo granola_render('template-parts/flexible-content/featured-post');
} ?>

<div class="cards-section">
    <div class="container">
        <div class="cards-container">
            <?php
            $i = 0;
            if ($query->have_posts()) : ?>    
            <?php while ($query->have_posts()) :
                $query->the_post(); ?>
            <div class="card-small">
                <div class="card-small__content">
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo get_the_date('d/m/Y'); ?> | <span><?php the_category(' • '); ?></span> </p>
                    
                </div>
                <a href="<?php the_permalink(); ?>">
                    <div class="card-small__thumbnail">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('post_page', ['class' => 'img-responsive img-fit']);
                    } else { ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/no-image.jpg';?>" alt="" class="img-responsive img-fit">
                    <?php } ?>
                    </div>
                </a>
            </div>
            <?php $i++; endwhile;
            wp_reset_postdata();
            endif;  ?>
        </div>
        <?php echo granola_render('template-parts/wordpress/posts-pagination'); ?>
    </div>
</div>

<?php get_footer();?>
