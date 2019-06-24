<?php
// phpcs:disable PSR1.Files.SideEffects
add_action('after_setup_theme', 'granola_add_gutenberg_support');
add_action('enqueue_block_editor_assets', 'granola_block_editor_styles');

function granola_add_gutenberg_support()
{

    // Some blocks such as the image or video block have the possibility to define a “wide” or “full” alignment
    // 'align-wide' support adds the corresponding classname to the block’s wrapper ( .alignwide or .alignfull )
    add_theme_support('align-wide');

    // By default, the color palette offered to blocks,
    // allows the user to select a custom color from a color picker field.
    // Let's disable it by default.
    add_theme_support('disable-custom-colors');

    // Customize the default Gutenberg color palette with our SCSS variables
    // @Note: add_theme_support('editor-color-palette') ATM doesn't support single array as a second argument so
    // we need to introduce workaround that will make our code work
    $granola_color_palette = granola_parse_scss_color_variables();
    if ($granola_color_palette) {
        array_unshift($granola_color_palette, 'editor-color-palette');
        call_user_func_array('add_theme_support', $granola_color_palette);
    }

    // Core blocks include default styles. The styles are enqueued for editing but are not enqueued for viewing
    // unless the theme opts-in to the core styles.
    // If you’d like to use default styles in your theme, add theme support for wp-block-styles:
    // add_theme_support( 'wp-block-styles' );
}

// Enqueue Gutenberg editor backend stylesheet
function granola_block_editor_styles()
{
    if (file_exists(get_theme_file_path('assets/styles/editor.css'))) {
        wp_enqueue_style(
            'granola-gutenberg-editor-styles',
            get_theme_file_uri('assets/styles/editor.css'),
            false,
            GRANOLA_CACHE_NUMBER
        );
    }
}

// Take the colors.json file that is generated from our SCSS variables
// and create an array of arrays with colors that we can pass to Gutenberg.
function granola_parse_scss_color_variables()
{
    $colors_json = get_theme_file_path('/assets/styles/colors.json');
    if (!file_exists($colors_json)) {
        return null;
    }

    $json_data = file_get_contents($colors_json);
    if (false === $json_data) {
        return null;
    }

    $json_data = json_decode($json_data, true);
    $colors = $json_data['colors'];

    $granola_palette = [];
    foreach ($colors as $color => $value) {
        $granola_palette[] = [
            'name' => 'granola ' . $color,
            'color' => $value,
        ];
    }

    return $granola_palette;
}
