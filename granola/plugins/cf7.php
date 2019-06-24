<?php
// phpcs:disable PSR1.Files.SideEffects
add_action('wp_enqueue_scripts', 'granola_cf7');

// ----------------------------------------------------
// CF7 needs to load CSS and JS to work properly, problem
// is that it does this on every page. Lets disable
// the loading of the scripts and then conditionally
// load them when needed
// ----------------------------------------------------
function granola_cf7()
{
    // ----------------------------------------------------
    // remove CF7 styles and scripts
    // ----------------------------------------------------
    add_filter('wpcf7_load_css', '__return_false');
    add_filter('wpcf7_load_js', '__return_false');

    // ----------------------------------------------------
    // An array of pages that we want to load CF7 scripts on
    // ----------------------------------------------------
    $pages_width_cf7_enabled = [
        'contact'
    ];

    // ----------------------------------------------------
    // Check if we are on one of the pages
    // ----------------------------------------------------
    if (is_page($pages_width_cf7_enabled) && function_exists('wpcf7_enqueue_scripts')) {
        wpcf7_enqueue_scripts();
    }
}
