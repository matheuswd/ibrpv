<?php
// phpcs:disable PSR1.Files.SideEffects

// http://tgmpluginactivation.com/configuration/
add_action('tgmpa_register', 'granola_tgmpa_register');

function granola_tgmpa_register()
{
    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = [

        /*
         * Advanced Custom Fields (required)
         * Use PRO version for local JSON feature
         */
        [
            'name'             => 'Advanced Custom Fields PRO',
            'slug'             => 'advanced-custom-fields-pro',
            'source'           => get_template_directory() . '/granola/binaries/advanced-custom-fields-pro.zip',
            'force_activation' => false,
            'is_callable'      => 'acf_add_options_page',
        ],

        /*
         * WordPress SEO by Yoast (optional)
         */
        [
            'name'             => 'WordPress SEO by Yoast',
            'slug'             => 'wordpress-seo',
            'force_activation' => true,
            'is_callable'      => 'wpseo_init',
        ],

        /*
         * BlogVault (optional)
         */
        [
            'name'             => 'BlogVault',
            'slug'             => 'blogvault-real-time-backup',
            'force_activation' => true,
            'is_callable'      => 'blogvault_init',
        ],

        /*
         * Plugin Auditor (optional)
         */
        [
            'name'             => 'Plugin Auditor',
            'slug'             => 'plugin-auditor',
            'force_activation' => true,
            'is_callable'      => 'pluginauditor_init',
        ]
    ];

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = [
        'id'           => 'granola',
        // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',
        // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins',
        // Menu slug.
        'parent_slug'  => 'themes.php',
        // Parent menu slug.
        'capability'   => 'edit_theme_options',
        // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true,
        // Show admin notices or not.
        'dismissable'  => true,
        // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',
        // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,
        // Automatically activate plugins after installation or not.
        'message'      => '',
        // Message to output right before the plugins table.

        
    ];

    tgmpa($plugins, $config);
}
