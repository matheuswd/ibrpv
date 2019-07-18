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

<div class="services-section">
    <section class="container service-time">
            <div class="service-card">
                <div class="service-card__line">
                    <img src="<?php echo get_template_directory_uri(). '/assets/images/calendar.png'; ?>" alt="Imagem de calendário para representar a agenda da Igreja Batista Reformada Palavra Viva" class="icon">
                    <p><?php echo esc_html($title_1); ?></p>
                </div>
                <div class="service-card__line">
                    <p class="line__description"><?php echo esc_html($description); ?></p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-card__line">
                    <img src="<?php echo get_template_directory_uri(). '/assets/images/maps-and-flags.png'; ?>" alt="Imagem de localização para representar a localização da Igreja Batista Reformada Palavra Viva" class="icon">
                    <p class="line__church-name"><?php echo esc_html($church_name); ?></p>
                </div>
                <div class="service-card__line">
                    <img src="<?php echo get_template_directory_uri(). '/assets/images/location-arrow.png'; ?>" alt="Ícone de mapa para representar a localização da Igreja Batista Reformada Palavra Viva" class="icon">
                    <p class="line__church-address"><?php echo esc_html($address); ?></p>
                </div>
            </div>
            <div class="service-card">
                <div class="service-card__line">
                    <button class="button--white-dark-blue"><?php esc_html_e('Google Maps', 'ibrpv'); ?></button>
                </div>
            </div>
    </section>
</div>
