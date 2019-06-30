<?php

$hero_title = ($args['hero_title']) ? $args['hero_title'] : false;
$hero_image = ($args['hero_image']) ? $args['hero_image'] : get_template_directory_uri() . '/assets/images/ibrpv.jpg';
$hero_intro = ($args['hero_intro']) ? $args['hero_intro'] : false;

if ($hero_title) { ?>
<section class="hero" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo $hero_image; ?>')">
    <div class="container hero-inner">
        
        <div class="intro-text">
            <h1><?php echo esc_attr($hero_title); ?></h1>
            <p><?php echo esc_attr($hero_intro); ?></p>
        </div>
    </div>
</section>

<?php } ?>
