<?php
$query_args = array(
	'post_type'      => 'post',
	'order'          => 'DESC',
	'posts_per_page' => 1,
	'meta_query'     => array(
		'relation' => 'AND',
		array(
			'key'     => 'featured_post',
			'value'   => 1,
			'compare' => '=',
		),
	),
);

$query = new WP_Query( $query_args );

$ignored_posts = array();

if ( $query->have_posts() ) :
	while ( $query->have_posts() ) :
		$query->the_post();
		$the_id = array_push( $ignored_posts, get_the_ID() );
	endwhile;
	wp_reset_postdata();
endif;

$query_args = array(
	'post_type'      => 'post',
	'order'          => 'DESC',
	'posts_per_page' => 3,
	'post__not_in'   => $ignored_posts,
	'cat'            => $args['categories'],
);

$query = new WP_Query( $query_args );

?>

<section class="related-posts fullwidth-grey">
<div class="cards-section">
	<div class="container">
		<h2 class="latest-posts"><?php esc_html_e( 'Últimas', 'ibrpv' ); ?><span><?php esc_html_e( 'Postagens', 'ibrpv' ); ?></span></h2>
		<div class="cards-container">
			<?php
			$i = 0;
			if ( $query->have_posts() ) :
				?>
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
			<div class="card-small">
				<div class="card-small__content">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php echo get_the_date( 'd/m/Y' ); ?> | <span><?php the_category( ' • ' ); ?></span> </p>
				</div>
				<a href="<?php the_permalink(); ?>">
					<div class="card-small__thumbnail">
					<?php
					if ( has_post_thumbnail() ) {
						the_post_thumbnail( 'post_page', [ 'class' => 'img-responsive img-fit' ] );
					} else {
						?>
						<img src="<?php echo get_template_directory_uri() . '/assets/images/no-image.jpg'; ?>" alt="" class="img-responsive img-fit">
					<?php } ?>
					</div>
				</a>
			</div>
					<?php
					$i++;
endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
		<?php echo granola_render( 'template-parts/wordpress/posts-pagination' ); ?>
	</div>
</div>
</section>
