<?php
/**
 * Template part for horizontal categories
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Granola
 */

?>

<section class="blog-categories">
<?php

wp_list_categories(array(
    'title_li' => '',
    'exclude'  => 1 // Removes the Uncategorized
));

?>
</section>
<?php
