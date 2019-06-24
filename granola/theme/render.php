<?php
/**
 * Retrieve a partial from the theme and pass arguments to it.
 *
 * Like https://developer.wordpress.org/reference/functions/echo granola_render/
 * but allows for arguments to be passed in the form or an array. Each partial
 * defines its own array arguments so view each partial to see what you
 * can/should pass
 * @param string $path
 * @param array $args
 * @return string $content
 */
function granola_render($partial, $args = [])
{
    $path = granola_resolve_template($partial);

    ob_start();

    if (file_exists($path)) {
        // Push the current partial on to the stack
        granola_push_partial($partial, $args);

        // Render the partial
        require $path;

        // Pop the current partial off the stack
        granola_pop_partial();
    }

    return ob_get_clean();
}

function granola_partial_stack()
{
    global $granola_render_stack;

    return $granola_render_stack;
}

function granola_current_partial()
{
    global $granola_render_stack;

    return array_values(array_slice($granola_render_stack, -1))[0];
}

function granola_push_partial($partial, $args = [])
{
    global $granola_render_stack;

    $granola_render_stack[] = [
        'partial' => $partial,
        'args' => $args
    ];
}

function granola_pop_partial()
{
    global $granola_render_stack;

    array_pop($granola_render_stack);
}

/**
 * Take a path and turn it in to a legitimate file path. Allows for a child
 * theme to implement a new version of the partial
 * @param string $path
 * @return string
 */
function granola_resolve_template($path)
{
    /**
     * See if the string ends with .php and remove it for consistency.
     * We will add it back in later
     */
    if (substr($path, -4) === '.php') {
        $path = substr($path, 0, -4);
    }

    // Consider get_theme_file_path
    // https://developer.wordpress.org/reference/functions/get_theme_file_path/
    return get_stylesheet_directory() . '/' . $path . '.php';
}
