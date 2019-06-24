<?php
/**
 * Template Name: Flexible Content
*/
get_header();

if (have_posts()) { ?>
    <main>
        <?php while (have_posts()) {
            the_post();
            the_content();
        } ?>
    </main>
<?php } else { ?>
    <main class="container">
        <?php echo granola_render('template-parts/content-none'); ?>
    </main>
<?php }

get_footer(); ?>
