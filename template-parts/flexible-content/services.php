<?php

$args = wp_parse_args($args, [
    'services' => ($args['services']) ? $args['services'] : false,
]);

$title_1 = $args['title_1'];
$description = $args['description'];
$church_name = $args['church_name'];
$address = $args['address'];
$link_google_maps = $args['link_google_maps'];

?>

<section class="church-info">
    <div class="container">
        <div class="column visiting">
            <p class="visiting__title"><img src="<?php echo get_template_directory_uri() . '/assets/images/calendar.png' ?>" class="icon" id="calendar" alt="">Venha nos visitar</p>
            <p class="visiting__time">Terça-feira às 20h - Domingo às 19h</p>
            <hr>
        </div>
        <div class="column address">
            <div class="address__info">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/maps-and-flags.png' ?>" class="icon" id="maps-and-flags" alt="">
                <p class="address__title"><img src="<?php echo get_template_directory_uri() . '/assets/images/maps-and-flags.png' ?>" class="icon" id="maps-and-flags-large" alt="">Igreja Batista Reformada Palavra Viva</p>
                <p class="address__street-address"><img src="<?php echo get_template_directory_uri() . '/assets/images/location-arrow.png' ?>" class="icon" id="location-arrow" alt="">Avenida Flavio Fulvio Biazzi, 280</p>
            </div>
            <div class="address__gmaps">
                <button class="button--white-dark-blue"><a href="#">Google Maps</a></button>
            </div>
        </div>
    </div>
</section>
