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
    <div class="container spacing">
        <main>
            <?php while (have_posts()) {
                the_post();
                echo granola_render('template-parts/post/content');
            } ?>
        </main>
        <?php echo granola_render('template-parts/wordpress/posts-pagination'); ?>
    </div>
<?php } else { ?>
    <main class="container">
        <?php echo granola_render('template-parts/content-none'); ?>
    </main>
<?php } ?>

<?php get_footer();?>
