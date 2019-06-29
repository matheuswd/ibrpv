<?php
add_filter('walker_nav_menu_start_el',  'ibrpv_addArrow', 12, 4);

/**
* Walker for the main menu
**/

add_filter('walker_nav_menu_start_el',  'ibrpv_addArrow', 12, 4);


function ibrpv_addArrow( $output, $item, $depth, $args ) {
    //Only add class to 'top level' items on the 'primary' menu.
    if ($args->theme_location == 'header') {
        if (in_array("menu-item-has-children", $item->classes)) {
            $output = ibrpv_sub_menu_toggle($output);
        }

        return $output;
    }
}

function ibrpv_product_menu_classes($classes, $item, $args, $depth) {
    if(ibrpv_products_menu($item)) {
        $classes[] = 'menu-item-has-children';
    }

    return $classes;
}

function ibrpv_product_menu_arrow( $output, $item, $depth, $args ) {
    if(ibrpv_products_menu($item)) {
        $output = ibrpv_sub_menu_toggle($output);
    }

    return $output;
}

function ibrpv_product_menu_content($item_output, $item, $depth, $args){
    if(ibrpv_products_menu($item)) {
        ob_start();

        // The brackets are placed together here to avoid
        // whitespace being output to the markup...
        // really this is just OCD
        ?><ul class="sub-menu"><?php
            echo "<li>test</li>";
        ?></ul><?php

        $item_output = $item_output . ob_get_clean();
    }

    return $item_output;
}

function ibrpv_products_menu($item){
    return in_array('products-menu', $item->classes);
}

function ibrpv_sub_menu_toggle($output){
    $svg = granola_svg('arrow');
    $output .= "<button class='sub-menu-toggle'>$svg</button>";

    return $output;
}
