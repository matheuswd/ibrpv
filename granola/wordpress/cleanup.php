<?php
// phpcs:disable PSR1.Files.SideEffects

add_action('init', 'granola_head_cleanup');
add_filter('wp_head', 'granola_remove_wp_widget_recent_comments_style', 1);
add_action('wp_head', 'granola_remove_recent_comments_style', 1);
add_filter('gallery_style', 'granola_gallery_style');

// filter to remove TinyMCE emojis
add_action('init', 'granola_disable_wp_emoji');
add_filter('tiny_mce_plugins', 'disable_emoji_tinymce');

// Remove mullenweg bloat
remove_filter('the_title', 'capital_P_dangit', 11);
remove_filter('the_content', 'capital_P_dangit', 11);
remove_filter('comment_text', 'capital_P_dangit', 31);

// Dont convert :) to an image
remove_filter('the_content', 'convert_smilies', 20);


//Let's clean the mess.
function granola_head_cleanup()
{
    // Remove EditURI link
    remove_action('wp_head', 'rsd_link');

    // Remove Windows live writer
    remove_action('wp_head', 'wlwmanifest_link');

    // Remove index link
    remove_action('wp_head', 'index_rel_link');

    // Remove previous link
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);

    // Remove start link
    remove_action('wp_head', 'start_post_rel_link', 10, 0);

    // Remove links for adjacent posts
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

    // Remove WP version
    remove_action('wp_head', 'wp_generator');
}

// Remove injected CSS for recent comments widget
function granola_remove_wp_widget_recent_comments_style()
{
    if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
        remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
}

// Remove injected CSS from recent comments widget
function granola_remove_recent_comments_style()
{
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action(
            'wp_head',
            array(
                $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
                'recent_comments_style'
            )
        );
    }
}

// Remove injected CSS from gallery
function granola_gallery_style($css)
{
    return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

function granola_disable_wp_emoji()
{

    // all actions related to emojis
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
}

function disable_emoji_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, ['wpemoji']);
    } else {
        return [];
    }
}
