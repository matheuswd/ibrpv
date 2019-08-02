<?php get_header(); ?>

<?php
if(!empty(get_option('page_for_posts'))) {
    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')), 'full');
    $featured_image = $img[0];
}
?>

<section class="hero" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo $featured_image; ?>')">
    <div class="container hero-inner">
        <div class="intro-text">
            <h1><?php wp_title(''); ?></h1>
        </div>
    </div>
</section>

<?php if (have_posts()) { ?>
<div class="container">
<?php if(is_blog()) {
            echo granola_render('template-parts/post/categories');
        } ?>
</div>
    <?php
    if(is_blog()) :
            echo granola_render('template-parts/flexible-content/featured-post');
            

    ?>
    
        <div class="container spacing">
            <main>
                <?php while (have_posts()) {
                    the_post();
                    ?>
            <div class="card-small">
                <div class="card-small__content">
                    <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo get_the_date('d/m/Y'); ?> | <span><?php the_category(' • '); ?></span> </p>
                    
                </div>
                <a href="<?php the_permalink(); ?>">
                    <div class="card-small__thumbnail">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail('full', ['class' => 'img-responsive img-fit']);
                    } else { ?>
                        <img src="<?php echo get_template_directory_uri() . '/assets/images/no-image.jpg';?>" alt="" class="img-responsive img-fit">
                    <?php } ?>
                    </div>
                </a>
            </div>
                    <?
                } 
                ?>
            </main>
            <?php echo granola_render('template-parts/wordpress/posts-pagination'); ?>
        </div>
        <?php else : ?>
    <?php endif; ?>
    
<?php } else { ?>
    <main class="container">
        <?php echo granola_render('template-parts/content-none'); ?>
    </main>
<?php } ?>

<?php get_footer();?>
