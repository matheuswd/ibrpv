<?php

$args = wp_parse_args( $args );

$title_1          = $args['title_1'];
$description      = $args['description'];
$church_name      = $args['church_name'];
$address          = $args['address'];
$link_google_maps = $args['link_google_maps'];

?>

<section class="church-info">
	<div class="container">
		<div class="column visiting">
			<p class="visiting__title">
			<?php
			echo granola_image(
				'calendar.png',
				array(
					'alt'   => 'Ícone de calendário',
					'class' => 'icon',
					'id'    => 'calendar',
				)
			);
			echo esc_html( $title_1 );
			?>
			</p>
			<?php
			echo granola_image(
				'calendar.png',
				array(
					'alt'   => 'Ícone de calendário',
					'class' => 'icon',
					'id'    => 'calendar-large',
				)
			);
			?>
			<p class="visiting__time"><?php echo esc_html( $description ); ?></p>
			<hr>
		</div>
		<div class="column address">
			<div class="address__info">
				<?php
				echo granola_image(
					'maps-and-flags.png',
					array(
						'alt'   => 'Ícone de localização',
						'class' => 'icon',
						'id'    => 'maps-and-flags',
					)
				);
				?>
				<p class="address__title">
				<?php
				echo granola_image(
					'maps-and-flags.png',
					array(
						'alt'   => 'Ícone de localização',
						'class' => 'icon',
						'id'    => 'maps-and-flags-large',
					)
				);
				echo esc_html( $church_name );
				?>
				</p>
				<p class="address__street-address">
				<?php
				echo granola_image(
					'location-arrow.png',
					array(
						'alt'   => 'ícone de mapa',
						'class' => 'icon',
						'id'    => 'location-arrow',
					)
				);
				echo esc_html( $address );
				?>
				</p>
			</div>
			<div class="address__gmaps">
				<button class="button--white-dark-blue"><a href="<?php echo esc_html( $link_google_maps ); ?>"><?php esc_html_e( 'Google Maps', 'ibrpv' ); ?></a></button>
			</div>
		</div>
	</div>
</section>
