<?php

$args = wp_parse_args($args, [
    'services' => ($args['services']) ? $args['services'] : false,
]);

$services = $args['the_services'];
$services_columns = sizeof($services);

?>

<div class="services-section">
    <section class="container service-time">
        <?php
        foreach ($services as $service) {
            ?>
            <div class="service-card">
                <h2 class="service-card__time"><?php echo esc_attr($service['service_time']) ?></h2>
                <span class="service_card__day"><?php echo esc_attr($service['service_day']) ?></span> | 
                <span class="service_card__type"><?php echo esc_attr($service['service_type']) ?></span>
            </div>
            <?php
        }
        ?>
    </section>
</div>
