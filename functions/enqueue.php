<?php

/**
 * Enqueue scripts
 *
 * This function enqueues all the JS scripts of the website
 *
 **/

function ibrpv_enqueue_scripts()
{
    wp_enqueue_script('scrolling-header', get_template_directory_uri() . '/assets/scripts/scrolling-header.js', array('jquery'), false, false);
}

add_action('wp_enqueue_scripts', 'ibrpv_enqueue_scripts');
