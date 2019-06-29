<?php
/**
 * Displays main navigation
 * @package Granola
 */
?>
<?php if (has_nav_menu('header')) : ?>
    <nav class="header__navigation">
        <?php
        // it's better to have burger menu inside 'nav' tag
        // Read more: http://www.a11ymatters.com/pattern/mobile-nav/
        ?>
        <?php echo granola_render('template-parts/components/burger', [
            'aria-label' => __('Menu', 'granola'),
            'class' => 'header__burger js-header-burger',
            'aria-controls' => 'main-menu',
            'aria-expanded' => 'false',
        ]); ?>
        <div class="header__navigation-wrap">
            <?php wp_nav_menu(array(
                'theme_location'    => 'header',
                'depth'             => 0,
                'container'         => '',
                'menu_class'        => '',
                'menu_id'         => 'main-menu', // don't delete it, needed for 'aria-controls' in burger button.
                'fallback_cb'       => false,
            )); ?>
        </div>
    </nav>
<?php endif; ?>
