<?php
// phpcs:disable PSR1.Files.SideEffects

add_action('wp_enqueue_scripts', 'granola_assets_load');
add_filter('wp_default_scripts', 'granola_remove_jquery_migrate');
add_action('wp_default_scripts', 'granola_move_jquery_into_footer');
add_action('wp_head', 'granola_javascript_detection', 0);
add_action('admin_init', 'granola_admin_init');

function granola_admin_init()
{
    add_editor_style(get_theme_file_uri('/assets/styles/editor.css'));
}

function granola_assets_load()
{
    // ------------------------------------------
    // If we are on the admin screen we dont need
    // to load the custom scripts and styles
    // ------------------------------------------
    if (is_admin()) {
        wp_enqueue_style('granola-stylesheet', get_stylesheet_uri());
        return;
    }

    // ------------------------------------------
    // Custom fonts registrations
    // We define this so that we don't have to come
    // in here and register files all the time
    // Just define in granola.php and job done
    // Not sure we need to version this as versioning
    // is handled by the source
    // ------------------------------------------
    if (defined('GRANOLA_FONTS_CSS') && GRANOLA_FONTS_CSS !== false) {
        wp_enqueue_style('granola-fonts', GRANOLA_FONTS_CSS, array(), GRANOLA_CACHE_NUMBER, 'all');
    }
    if (defined('GRANOLA_FONTS_JS') && GRANOLA_FONTS_JS !== false) {
        wp_enqueue_script('granola-fonts', GRANOLA_FONTS_JS, array(), GRANOLA_CACHE_NUMBER, true);
    }

    // ------------------------------------------
    // Enqueue Granola CSS
    // ------------------------------------------
    wp_enqueue_style('granola-styles', get_theme_file_uri('/assets/styles/styles.css'), array(), GRANOLA_CACHE_NUMBER);

    // ------------------------------------------
    // Build our script dependencies
    // ------------------------------------------
    $granola_script_dependencies = [];
    if (defined('GRANOLA_JQUERY_REQUIRED') && GRANOLA_JQUERY_REQUIRED === true) {
        $granola_script_dependencies[] = 'jquery';
    }

    // ------------------------------------------
    // Load our javascript files and their dependencies
    // ------------------------------------------
    wp_enqueue_script(
        'granola-scripts',
        get_theme_file_uri('/assets/scripts/scripts.js'),
        $granola_script_dependencies,
        GRANOLA_CACHE_NUMBER,
        true
    );

    // ------------------------------------------
    // Just in case we need pass PHP variables to JS
    // We should wrap this in a constant so we can
    // turn this on and off
    // ------------------------------------------
    wp_localize_script('granola-scripts', 'granola_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'home_url' => home_url(),
    ));

    /* Enqueue comment-reply script if needed */
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

function granola_remove_jquery_migrate(&$scripts)
{
    if (is_admin()===false && GRANOLA_REMOVE_JQUERY_MIGRATE===true) {
        $scripts->remove('jquery');
        $scripts->add('jquery', false, array('jquery-core'), '1.12.4');
    }
}

// ------------------------------------------
// Move jQuery to footer but put it in the
// the header if needed
// https://wordpress.stackexchange.com/questions/173601/enqueue-core-jquery-in-the-footer/240612#240612
// ------------------------------------------
// So this is pretty clever. We move jQuery to
// the footer by default. If nothing requires
// it be loaded in the header, it will stay in
// the footer. But if a plugin requires it in
// the header, it will be magically moved :)
// ------------------------------------------
function granola_move_jquery_into_footer($wp_scripts)
{
    if (is_admin()===false && GRANOLA_JQUERY_IN_FOOTER===true) {
        $wp_scripts->add_data('jquery', 'group', 1);
        $wp_scripts->add_data('jquery-core', 'group', 1);
    }
}

// ------------------------------------------
// Handles JavaScript detection.
// Adds a `js` class to the root `<html>` element when JavaScript is detected.
// Needs to be added in the header to avoid FOUC.
// ------------------------------------------
function granola_javascript_detection()
{
    echo "<script>(function(html){html.className = ".
    "html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
