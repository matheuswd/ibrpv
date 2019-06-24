<?php
// phpcs:disable PSR1.Files.SideEffects
add_action('acf/init', 'granola_acf_init');
add_filter('the_content', 'granola_acf_the_content', 1);

// ----------------------------------------------------
// If ACF Exists, lets create all the options pages
// that have been configured
// ----------------------------------------------------
if (function_exists('acf_add_options_page') && isset($GRANOLA_ACF_OPTIONS_PAGES)) {
    if (is_array($GRANOLA_ACF_OPTIONS_PAGES) && !empty($GRANOLA_ACF_OPTIONS_PAGES)) {
        // ----------------------------------------------------
        // Add a default options page to nest everything under
        // ----------------------------------------------------
        acf_add_options_page();

        // ----------------------------------------------------
        // Loop through the pages configured and create them
        // ----------------------------------------------------
        foreach ($GRANOLA_ACF_OPTIONS_PAGES as $key => $page) {
            acf_add_options_sub_page($page);
        }
    }
}

// ----------------------------------------------------
// Configure ACF with our Google API key
// ----------------------------------------------------
function granola_acf_init()
{
    if ('GRANOLA_GOOGLE_API_KEY'!="") {
        acf_update_setting('google_api_key', GRANOLA_GOOGLE_API_KEY);
    }
}

function granola_acf_the_content($content)
{
    if (granola_is_flexible_content_template(get_the_id())) {
        if (!post_password_required()) {
            $content = granola_render(
                'template-parts/flexible-content/flexible-content',
                get_field('flexible_content')
            );
        } else {
            $content = '<div class="container">' . $content . '</div>';
        }

        // Disable autop to address extra tags around whitespace
        // Inside the if statement, we generate the content to be returned
        // before we remove the wpautop filter so we don't get p tags for
        // whitespace. If we performed the function call on the return
        // statement, we would have to remove the filter, then add it back
        // in when generating each of the content blocks.
        remove_filter('the_content', 'wpautop');
    }

    return $content;
}

/**
 * Determine if the template being loaded is build with flexible content
 * @param int|null $post_id
 * @return boolean
 */
function granola_is_flexible_content_template($post_id = null)
{
    if ($post_id === null) {
        $post_id = get_the_id();
    }

    return get_page_template_slug($post_id) === 'page-templates/flexible-content.php';
}
