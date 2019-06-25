<?php
// phpcs:disable PSR1.Files.SideEffects

add_filter('gform_confirmation_anchor', '__return_false');
add_action('gform_enqueue_scripts', 'granola_dequeue_gf_stylesheets', 11);
add_filter('gform_get_form_filter', 'granola_gform_get_form_filter', 10, 2);
add_filter('gform_progressbar_start_at_zero', '__return_true');
add_filter('gform_init_scripts_footer', '__return_true');

// ----------------------------------------------------
// Gravity likes to output a lot of CSS
// We don't like that...
// ----------------------------------------------------
function granola_dequeue_gf_stylesheets()
{
    // ----------------------------------------------------
    // Check if we are not on the administration screen and
    // if we are not viewing a gravity forms demo screen
    // ----------------------------------------------------
    if (!is_admin() && !array_key_exists('gf_page', $_GET)) {
        wp_dequeue_style('gforms_reset_css');
        wp_dequeue_style('gforms_datepicker_css');
        wp_dequeue_style('gforms_formsmain_css');
        wp_dequeue_style('gforms_ready_class_css');
        wp_dequeue_style('gforms_browsers_css');
    }
}

// ----------------------------------------------------
// Gravity forms likes to output style tags directly
// in the markup, most annoyingly when using the list
// field type. This will search gravity output and remove
// any inline style tags
// ----------------------------------------------------
function granola_gform_get_form_filter($form_string, $form)
{
    return preg_replace(
        '/<\s*style.+?<\s*\/\s*style.*?>/si',
        ' ',
        $form_string
    );
}

add_filter('gform_enable_field_label_visibility_settings', '__return_true');

// Changes Gravity Forms Ajax Spinner (next, back, submit) to a transparent image
// this allows you to target the css and create a pure css spinner
add_filter('gform_ajax_spinner_url', 'spinner_url', 10, 2);
function spinner_url($image_src, $form)
{
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}
