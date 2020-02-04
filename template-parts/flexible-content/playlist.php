<?php

$args = wp_parse_args( $args );

$playlist_url = $args['playlist_url'];
$grey_text    = $args['playlist_grey_text'];
$red_text     = $args['playlist_red_text'];

?>

<div class="video-section">
	<div class="container">
		<h2 class="latest-posts"><?php echo esc_html( $grey_text ); ?><span><?php echo esc_html( $red_text ); ?></span></h2>
		<?php echo $playlist_url; ?>
	</div>
</div>
