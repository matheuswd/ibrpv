<?php get_header(); ?>

<?php if (have_posts()) { ?>
    <div class="container">
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
