<?php
// phpcs:disable PSR1.Files.SideEffects
// ----------------------------------------------------
// ----------------------------------------------------
// Granola configuration
// ----------------------------------------------------
// ----------------------------------------------------
// We don't want to have to dig in to the core files all
// the time to make changes so lets do what we can here
// to customize granola before we go digging and changing
// ----------------------------------------------------
define('GRANOLA_CACHE_NUMBER', file_get_contents(get_template_directory() . '/assets/timestamp.txt'));
define('GRANOLA_GOOGLE_API_KEY', '');
define('GRANOLA_CONTENT_WIDTH', 1200);
define('GRANOLA_FONTS_CSS', false);
define('GRANOLA_FONTS_JS', false);
define('GRANOLA_JQUERY_REQUIRED', false);
define('GRANOLA_JQUERY_IN_FOOTER', false);
define('GRANOLA_REMOVE_JQUERY_MIGRATE', true);

// ----------------------------------------------------
// Lazy loading
// ----------------------------------------------------
define('GRANOLA_LAZY_LOAD', true);
define('GRANOLA_LAZY_LOAD_CLASS', 'lazyload');
define('GRANOLA_LAZY_LOAD_PLACEHOLDER', true);
define('GRANOLA_LAZY_LOAD_BASE_64', false);

// ----------------------------------------------------
// Images
// ----------------------------------------------------
// Define an array of extra image sizes we need for the project
// ['name', width, height, hard crop (true/false)],
// ----------------------------------------------------
$GRANOLA_IMAGES = [
    ['lazy', 50, 50, false],
    ['wgd_500', 500, 0, false],
    ['wgd_1300', 1300, 0, false],
    ['super', 1500, 1500, false],
    ['super_duper', 2000, 2000, false],
    ['post_page', 370, 240, true],
];

// ----------------------------------------------------
// Menus
// ----------------------------------------------------
// Define an array of extra image sizes we need for the project
// ----------------------------------------------------
$GRANOLA_MENUS = [
    'header' => 'Header',
];

// ----------------------------------------------------
// Sidebars
// ----------------------------------------------------
// Define an array of sidebars to be used in the project.
// By default we have them all off
// ----------------------------------------------------
// $GRANOLA_SIDEBARS = [
//     [
//         'name'          => esc_html__( 'Sidebar', 'granola' ),
//         'id'            => 'sidebar-1',
//         'description'   => esc_html__( 'Add widgets here.', 'granola' ),
//         'before_widget' => '<section id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</section>',
//         'before_title'  => '<h4 class="widget-title">',
//         'after_title'   => '</h4>',
//     ]
// ];

// ----------------------------------------------------
// Plugins
// ----------------------------------------------------
$GRANOLA_ACF_OPTIONS_PAGES = [
    'Geral',
    'Rodapé',
];


// ----------------------------------------------------
// MIME Types
// ----------------------------------------------------
$GRANOLA_MIME_TYPES = [
    'svg' => 'image/svg+xml',
    // 'msg  => 'application/vnd.ms-outlook',
    // 'flv  => 'video/x-flv',
    // 'xls  => 'application/application/excel',
    // 'xlsx => 'application/application/vnd.ms-excel',
    // 'tiff => 'image/tiff',
    // 'tif  => 'image/tiff',
    // 'psd  => 'image/photoshop',
    // 'xlsx => 'application/application/vnd.ms-excel',
    // 'swf  => 'application/x-shockwave-flash',
];
