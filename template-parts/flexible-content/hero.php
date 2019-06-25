<?php

$hero_title = ($args['hero_title']) ? $args['hero_title'] : false;
$hero_image = ($args['hero_image']) ? $args['hero_image'] : false;
$hero_intro = ($args['hero_intro']) ? $args['hero_intro'] : false;

if ($hero_image) { ?>
<section class="hero">
    <div class="hero-inner">
        
        <div class="intro-text">
            <h1><?php echo esc_attr($hero_title); ?></h1>
            <p><?php echo esc_attr($hero_intro); ?></p>
        </div>
    </div>
</section>

<?php } else { ?>
<section class="hero">
    <div class="hero-inner">
        <header class="header">
            <div class="header__inner container">
                <a class="header__logo" href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo granola_svg('logo-ibrpv-white', [
                        'title' => get_bloginfo('name'),
                        'description' => get_bloginfo('description'),
                    ]); ?>
                </a>
                <?php echo granola_render('template-parts/header/menu'); ?>
            </div>
        </header>
    </div>
</section>
<?php } ?>
