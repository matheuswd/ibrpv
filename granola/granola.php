<?php
// ----------------------------------------------------
// ----------------------------------------------------
// Welcome to the Granola
// ----------------------------------------------------
// ----------------------------------------------------
// The objective is to streamline WordPress theme
// development by including helpers for required tasks
// as well as customising WordPress to be greener.
// Granola isn't like every other starter theme, its
// opinionated whilst being minimal
// ----------------------------------------------------


// ----------------------------------------------------
// We rely on composer for tgmpa
// Lets auto-load composer
// ----------------------------------------------------
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require __DIR__ . '/vendor/autoload.php';
}

// ----------------------------------------------------
// Load the config file
// ----------------------------------------------------
require_once 'config.php';

// ----------------------------------------------------
// Core customisation
// ----------------------------------------------------
require_once 'wordpress/cleanup.php';
require_once 'wordpress/gutenberg.php';
require_once 'wordpress/gutenberg-template.php';
require_once 'wordpress/images.php';
require_once 'wordpress/iframes.php';
require_once 'wordpress/menus.php';
require_once 'wordpress/required_plugins.php';
require_once 'wordpress/scripts.php';
require_once 'wordpress/settings.php';
require_once 'wordpress/sidebars.php';
require_once 'wordpress/upload_mimes.php';
require_once 'wordpress/lazy-load.php';

// ----------------------------------------------------
// Plugin customisation
// ----------------------------------------------------
require_once 'plugins/acf.php';
// require_once 'plugins/cf7.php';
require_once 'plugins/gravity_forms.php';
require_once 'plugins/yoast_seo.php';

// ----------------------------------------------------
// Theme helpers
// ----------------------------------------------------
require_once 'theme/render.php';
require_once 'theme/clean_for_id.php';
require_once 'theme/image.php';
require_once 'theme/svg.php';
