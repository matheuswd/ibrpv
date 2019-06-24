<?php
function granola_menus()
{
    // http://codex.wordpress.org/Function_Reference/register_nav_menus

    global $GRANOLA_MENUS;

    if (is_array($GRANOLA_MENUS)) {
        register_nav_menus($GRANOLA_MENUS);
    }
}
