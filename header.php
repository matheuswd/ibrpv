<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php echo granola_render('template-parts/header/skip-link'); ?>
    <header class="header">
        <div class="header__inner container">
            <a class="header__logo" href="<?php echo esc_url(home_url('/')); ?>">
            <?php echo granola_svg(get_field('light_logo', 'option')['name'], [
                    'title' => get_bloginfo('name'),
                    'description' => get_bloginfo('description'),
                ]); ?>
            </a>
            <?php echo granola_render('template-parts/header/menu'); ?>
        </div>
    </header>
    <div class="site" id="maincontent">
