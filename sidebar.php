<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Granola
 */

?>

<section class="post-categories">
    <p class="post-categories__heading">
        <?php esc_html_e('Categorias', 'ibrpv'); ?>
    </p>
    <?php wp_list_categories(array(
            'title_li' => '',
            'exclude'  => 1 // Removes the Uncategorized
        )); ?>
</section>
