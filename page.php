<?php get_header(); ?>

<?php if (have_posts()) { ?>
    <div class="container spacing">
        <main>
            <?php while (have_posts()) {
                the_post(); ?>
                <?php echo granola_render('template-parts/page/content'); ?>
            <?php } ?>
        </main>

        <?php echo granola_render('template-parts/wordpress/paged-post'); ?>
        <?php echo granola_render('template-parts/wordpress/post-pagination'); ?>
        <?php echo granola_render('template-parts/wordpress/comments'); ?>
    </div>
<?php } else { ?>
    <main class="container">
        <?php echo granola_render('template-parts/content-none'); ?>
    </main>
<?php } ?>

<?php get_footer(); ?>
