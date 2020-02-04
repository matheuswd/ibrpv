<?php

$args = wp_parse_args( $args );

/**
 * The possible returns for $args are:
 *
 * @string "Post em destaque"
 * @string "Último post"
 */

if ( $args = 'Post em destaque' ) {
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
} else {
	$query_args = array(
		'post_type'      => 'post',
		'order'          => 'DESC',
		'posts_per_page' => 1,
	);

	$query = new WP_Query( $query_args );
}

?>
<div class="container">
<?php
if ( $query->have_posts() ) :
	?>
	<?php
	while ( $query->have_posts() ) :
		$query->the_post();
		?>
		   
		<div class="featured-post">
			<div class="featured-post__thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'full', [ 'class' => 'img-responsive img-fit' ] ); ?>
				</a>
			</div>
			<div class="featured-post__content">
				<p><?php the_category( ' • ' ); ?></p>
				<a class="reset-link" href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
				<p class="subtitle">
					<?php echo get_post_meta( get_the_ID(), 'subtitle', true ); ?>
				</p>
			</div>
		</div>
		<?php
	endwhile;
	wp_reset_postdata();
	?>
<?php endif; ?>
</div>
