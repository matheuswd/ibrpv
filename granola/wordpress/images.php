<?php
// phpcs:disable PSR1.Files.SideEffects

add_action('after_setup_theme', 'granola_register_post_thumbnails');
add_filter('image_size_names_choose', 'granola_custom_image_sizes');

function granola_register_post_thumbnails()
{

    global $GRANOLA_IMAGES;

    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150, true);

    if (is_array($GRANOLA_IMAGES)) {
        foreach ($GRANOLA_IMAGES as $key => $size) {
            if (empty($size[3])) {
                $size[3] = false;
            }

            add_image_size(
                $size[0],
                $size[1],
                $size[2],
                $size[3]
            );
        }
    }
}

function granola_custom_image_sizes($sizes)
{
    // https://codex.wordpress.org/Plugin_API/Filter_Reference/image_size_names_choose

    global $GRANOLA_IMAGES;

    if (is_array($GRANOLA_IMAGES)) {
        foreach ($GRANOLA_IMAGES as $key => $size) {
            $sizes[$size[0]] = ucfirst(str_replace('_', ' ', $size[0]));
        }
    }

    return $sizes;
}
