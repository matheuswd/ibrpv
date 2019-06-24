<?php
// phpcs:disable PSR1.Files.SideEffects

add_filter( 'gutenberg_can_edit_post_type', 'granola_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'granola_disable_gutenberg', 10, 2 );

function granola_disable_editor( $id = false ) {
    $excluded_templates = [
        'page-templates/flexible-content.php',
    ];

    if(empty($id)){
        return false;
    }

    $id = intval($id);
    $template = get_page_template_slug($id);

    return in_array($template, $excluded_templates);
}

function granola_disable_gutenberg( $can_edit, $post_type ) {
    if(!(is_admin() && !empty($_GET['post']))){
        return $can_edit;
    }

    if(granola_disable_editor($_GET['post'])){
        $can_edit = false;
    }

    return $can_edit;
}
