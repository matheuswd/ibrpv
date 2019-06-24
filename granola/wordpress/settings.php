<?php
// phpcs:disable PSR1.Files.SideEffects

add_action('after_setup_theme', 'granola_setup');
add_action('after_setup_theme', 'granola_content_width');
add_action('after_setup_theme', 'granola_menus');

/**
 * Theme initial settings.
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Granola
 *
 * Table of content:
 * - Initial setup
 */

if (!function_exists('granola_setup')) {
    function granola_setup()
    {

        // Make theme available for translation.
        // @link https://codex.wordpress.org/Function_Reference/load_theme_textdomain
        load_theme_textdomain('granola', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        // @link https://codex.wordpress.org/Automatic_Feed_Links
        //add_theme_support( 'automatic-feed-links' );

        // Let WordPress manage the document title.
        // @link http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
        add_theme_support('title-tag');

        // HTML5 markup support
        // @link http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }
}

function granola_content_width()
{
    // ------------------------------------------
    // Lets define the site width so that images are
    // rendered properly in a WYSIWYG
    // ------------------------------------------
    if (defined('GRANOLA_CONTENT_WIDTH')) {
        $GLOBALS['content_width'] = GRANOLA_CONTENT_WIDTH;
    } else {
        $GLOBALS['content_width'] = 1200;
    }
}
