<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Granola
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_single() || is_category()) :
            the_title('<h1 class="entry-title">', '</h1>');
            the_content();
        endif;
        ?>
    </header>

    <footer class="entry-footer">

    </footer>
</article>
