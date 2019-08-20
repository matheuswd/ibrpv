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
        <?php
        if (is_single()) :
        ?>
        <section class="post-content">
            <span class="post-info">
                <?php the_date('d/m/Y'); ?> | 
                <span><?php the_category(' • '); ?></span>
            </span>
            <?php the_content(); ?>
        </section>
        <section class="post-categories">
            <?php // the_content(); ?>
        </section>
        <section class="sharing">
            <span><?php esc_html_e('Compartilhar', 'ibrpv') ?></span>
            <div class="icons">
                <div class="icons__fb">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>" target="_blank">
                        <?php echo granola_image('social-icons/icon-fb-grey.png', array(
                            'alt' => __('Ícone de compartilhamento do Facebook', 'ibrpv')
                        )) ?>
                    </a>
                </div>
            </div>
        </section>
        <?php
        endif;
        ?>

    <footer class="entry-footer">

    </footer>
</article>
