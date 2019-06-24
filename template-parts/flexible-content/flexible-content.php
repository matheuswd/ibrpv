<?php

// Check if flexible content is an array
// If not return early
if (is_array($args)) {
    // Begin looping the blocks
    foreach ($args as $key => $block_args) {
        // Store the block key as an argument so we know where we are in
        // the loop
          $block_args['_key'] = $key;

        // Modify the block name to be consistent with the naming
        // conventions within the theme
        $block_name = str_replace('_', '-', $block_args['acf_fc_layout']);

        // Build a path to the file we want to load
        $path = 'template-parts/flexible-content/' . $block_name;

        // Load the component and parse the args
        echo granola_render($path, $block_args);
    }
}
