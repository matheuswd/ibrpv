<?php
// phpcs:disable PSR1.Files.SideEffects

add_action('widgets_init', 'granola_widgets_init');

function granola_widgets_init()
{
    global $GRANOLA_SIDEBARS;

    if (is_array($GRANOLA_SIDEBARS)) {
        foreach ($GRANOLA_SIDEBARS as $key => $sidebar) {
            register_sidebar($sidebar);
        }
    }
}
