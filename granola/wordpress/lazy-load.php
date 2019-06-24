<?php
// phpcs:disable PSR1.Files.SideEffects

// Largely this code has been ripped off from two places
// There is currently a fallback in place for when javascript is dissabled of adding an image in a noscript tag
// https://developers.google.com/web/fundamentals/performance/lazy-loading-guidance/images-and-video/
// https://jhtechservices.com/changing-your-image-markup-in-wordpress/

add_filter('wp_get_attachment_image_attributes', 'granola_change_attachment_image_markup', 10, 3);
add_filter('the_content', 'granola_add_img_lazy_markup', 15);
/* hook into filter and use priority 15 to
 make sure it is run after the srcset and sizes attributes have been added.
 */
add_filter('get_image_tag_class', 'granola_image_tag_class', 10, 4);

function granola_change_attachment_image_markup($attributes, $attachment, $size)
{
    if (GRANOLA_LAZY_LOAD === true) {
        if (isset($attributes['src'])) {
            // Move the src to data-src
            $attributes['data-src'] = $attributes['src'];

            // Are we showing a placeholder
            if (GRANOLA_LAZY_LOAD_PLACEHOLDER === true) {
                // Strip dimensions from the src url
                $clean_src = preg_replace("/-\d+[Xx]\d+\./", ".", $attributes['src']);

                // get the image id by url
                $id = granola_get_image_id_by_url($clean_src);

                if ($id !== false) {
                    // get the lazy thumbnail url
                    $placeholder_thumb = wp_get_attachment_image_src($id, 'lazy');

                    // Alias the source
                    $lazy_src = $placeholder_thumb[0];

                    // Are we in-lining the image
                    if (GRANOLA_LAZY_LOAD_BASE_64 === true) {
                        $lazy_src = 'data:image/jpg;base64,' . base64_encode(
                            file_get_contents(
                                granola_uploads_image_path($lazy_src)
                            )
                        );
                    }

                    $attributes['src'] = $lazy_src;
                }
            } else {
                unset($attributes['src']);
            }
        }

        if (isset($attributes['srcset'])) {
            // Move the src-set to data-srcset
            $attributes['data-srcset'] = $attributes['srcset'];

            unset($attributes['srcset']);
        }

        $attributes['class'] .= ' ' . GRANOLA_LAZY_LOAD_CLASS;
    }

    return $attributes;
}

function granola_add_img_lazy_markup($the_content)
{

    // Return early if there is no content
    if ($the_content == "") {
        return $the_content;
    }

    if (GRANOLA_LAZY_LOAD === true) {
        $the_content = preg_replace_callback('/<img[^>]*>/', 'granola_convert_image', $the_content);
    }

    return $the_content;
}

function granola_convert_image($match)
{
    $attributes = granola_get_img_attributes($match[0]);
    $output = '';

    if(array_key_exists('class', $attributes) && strpos($attributes['class'], GRANOLA_LAZY_LOAD_CLASS)) {

        if (GRANOLA_LAZY_LOAD_PLACEHOLDER === true) {
            // Strip dimensions from the src url
            $clean_src = preg_replace("/-\d+[Xx]\d+\./", ".", $attributes['src']);

            // get the image id by url
            $id = granola_get_image_id_by_url($clean_src);

            // get the lazy thumbnail url
            $placeholder_thumb = wp_get_attachment_image_src($id, 'lazy');

            // Alias the source
            $lazy_src = $placeholder_thumb[0];

            // Are we in-lining the image
            if (GRANOLA_LAZY_LOAD_BASE_64 === true) {
                $lazy_src = 'data:image/jpg;base64,' . base64_encode(
                    file_get_contents(
                        granola_uploads_image_path($lazy_src)
                    )
                );
            }

            $attributes['src'] = $lazy_src;
        }

        $output = '<img ' . granola_create_attributes($attributes) . '>';
        $output .= '<noscript>' . granola_no_js_image($attributes) . '</noscript>';
    } else {
        $output = granola_no_js_image($attributes);
    }

    return $output;
}

function granola_no_js_image($attributes) {
    if(array_key_exists('data-src', $attributes)) {
        $attributes['src'] = $attributes['data-src'];
        unset($attributes['data-src']);
    }

    if(array_key_exists('data-srcset', $attributes)) {
        $attributes['srcset'] = $attributes['data-srcset'];
        unset($attributes['data-srcset']);
    }

    return '<img ' . granola_create_attributes($attributes) . '>';
}

function granola_create_attributes($attribute_array)
{
    $attributes = '';
    foreach ($attribute_array as $attribute => $value) {
        $attributes .= $attribute . '="' . $value . '" ';
    }

    // Removes the extra space after the last attribute
    return substr($attributes, 0, -1);
}

function granola_get_img_attributes($image_node)
{
    if (function_exists("mb_convert_encoding")) {
        $image_node = mb_convert_encoding($image_node, 'HTML-ENTITIES', 'UTF-8');
    }

    $dom = new DOMDocument();
    @$dom->loadHTML($image_node);
    $image = $dom->getElementsByTagName('img')->item(0);
    $attributes = array();
    foreach ($image->attributes as $attr) {
        $attributes[$attr->nodeName] = $attr->nodeValue;
    }
    return $attributes;
}


function granola_image_tag_class($class, $id, $align, $size)
{
    if (GRANOLA_LAZY_LOAD === true) {
        return $class . ' ' . GRANOLA_LAZY_LOAD_CLASS;
    }
}

function granola_get_image_id_by_url($image_url)
{
    global $wpdb;

    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url));

    if (is_array($attachment) && !empty($attachment)) {
        return $attachment[0];
    }

    return false;
}

function granola_uploads_image_path($source)
{
    $uploads = wp_upload_dir();
    $path = str_replace($uploads['baseurl'], $uploads['basedir'], $source);

    return $path;
}
