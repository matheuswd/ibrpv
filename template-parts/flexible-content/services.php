<?php
$args = wp_parse_args( $args );

$title_1       = $args['title_1'];
$services_data = $args['services_data'];

/**
 * Array ( [0] => Array ( [service_type] => Culto de Doutrina [service_days] => Todas as Terças-Feiras [service_time] => 20h00 ) [1] => Array ( [service_type] => Escola Bíblica [service_days] => Todos os Domingos [service_time] => 8h30 ) [2] => Array ( [service_type] => Culto ao Senhor [service_days] => Todos os Domingos [service_time] => 9h45 ) )
 */

?>

<section class="church-info">
	<div class="container">
		<?php foreach ( $services_data as $service ) { ?>
			<div class="column">
			<?php echo esc_html( $service['service_type'] ); ?>
			</div>
		<?php } ?>
	</div>
</section>
