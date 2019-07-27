<?php
if (is_home()) {
    get_header();
} else {
    get_header('pages');
}
?>

<?php if (have_posts()) { ?>
    <section class="hero" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>')">
        <div class="container hero-inner">
            <div class="intro-text">
                <h1><?php the_title(); ?></h1>
                <p><?php the_excerpt(); ?></p>
            </div>
        </div>
    </section>
    <div class="container spacing">
        <main>
            <?php while (have_posts()) {
                the_post(); ?>
                <?php echo granola_render('template-parts/page/content'); ?>
            <?php } ?>
        </main>

        <?php echo granola_render('template-parts/wordpress/paged-post'); ?>
        <?php echo granola_render('template-parts/wordpress/post-pagination'); ?>
        <?php //echo granola_render('template-parts/wordpress/comments'); ?>
    </div>
<?php } else { ?>
    <main class="container">
        <?php echo granola_render('template-parts/content-none'); ?>
    </main>
<?php } ?>

<?php get_footer(); ?>
