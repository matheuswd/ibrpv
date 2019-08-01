<?php
// ----------------------------------------------------
// Granola
// ----------------------------------------------------
// Not only a theme but is also a framework, Granola
// aims to make WordPress and our WordPress themes
// a little greener :)
// ----------------------------------------------------
// Wholegrain Digital
// ----------------------------------------------------
require_once 'granola/granola.php';

// ----------------------------------------------------
// Put everything else below here please
// ----------------------------------------------------
// If implementing custom functions, please put them
// in the function folder and not in the granola folder
// ----------------------------------------------------
require_once 'functions/image-optimisation.php';
require_once 'functions/enqueue.php';
require_once 'functions/menu.php';

function is_blog () {
    global $post;
    $posttype = get_post_type($post);
    return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}
