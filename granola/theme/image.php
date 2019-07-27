<?php

/**
 * Return and possibly output an image from the assets directory
 * @param string $name
 * @param array $args
 * @return string
 */
function granola_image($name, $args = [])
{
    $image = '';

    $args = wp_parse_args($args, [
        'name'   => $name,
        'alt'    => '',
        'class'  => '',
        'id'     => '',
    ]);

    if ($image_url = granola_get_image_url($args['name'])) {
        $attributes = [
            'src' => esc_url($image_url),
            'alt' => esc_attr($args['alt'])
        ];

        if ($attributes['alt'] == "") {
            $attributes['role'] = 'presentation';
        }

        if ($args['class'] !== "") {
            $attributes['class'] = esc_attr($args['class']);
        }

        if ($args['id'] !== "") {
            $attributes['id'] = esc_attr($args['id']);
        }

        $attributes_string = '';

        foreach ($attributes as $key => $value) {
            $attributes_string .= $key . '="' . $value . '" ';
        }

        $image = '<img ' . trim($attributes_string) . '>';
    }

    return $image;
}


/**
 * Build the URL for the image
 * @param string $name
 * @return string
 */
function granola_get_image_url($name)
{
    $directory  = '/assets/images/';
    $file       = get_stylesheet_directory() . $directory . $name;

    if (file_exists($file)) {
        return get_stylesheet_directory_uri() . $directory . $name;
    }

    return '';
}
