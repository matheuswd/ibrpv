<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Granola
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_single() ) : ?>
			<section class="post-content">
				<span class="post-info">
					<?php the_date( 'd/m/Y' ); ?> | 
					<span><?php the_category( ' • ' ); ?></span>
				</span>
				<?php the_content(); ?>
			</section>
			<?php get_sidebar(); ?>
			<section class="sharing">
				<span><?php esc_html_e( 'Compartilhar', 'ibrpv' ); ?></span>
				<div class="icons">
					<div class="icons__fb">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank">
							<?php
							echo granola_image(
								'social-icons/icon-fb-grey.png',
								array(
									'alt' => __( 'Ícone de compartilhamento do Facebook', 'ibrpv' ),
								)
							);
							?>
						</a>
					</div>
					<div class="icons__twitter">
						<a href="https://twitter.com/intent/tweet?text=<?php the_title(); echo ' em ' . get_permalink(); ?>" target="_blank">
							<?php
							echo granola_svg(
								'twitter-icon',
								array(
									'alt' => 'Ícone do Twitter',
								)
							);
							?>
						</a>
					</div>
					<div class="icons__email">
						<a href="mailto:email@youremail.com?subject=<?php the_title(); ?>&body=<?php the_excerpt(); ?>" target="_blank">
							<?php
							echo granola_svg(
								'email-icon',
								array(
									'alt' => 'Ícone do E-mail',
								)
							);
							?>
						</a>
					</div>
				</div>
			</section>
		<?php endif; ?>

	<footer class="entry-footer">

	</footer>
</article>
