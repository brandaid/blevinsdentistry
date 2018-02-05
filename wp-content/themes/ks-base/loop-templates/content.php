<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>
	<div class="col-md-6 col-lg-4">
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="card">
				<div class="card-block">
					<header class="entry-header">
						<div class="feature-image-container" style="background: url(<?php the_post_thumbnail_url( $size ); ?>) no-repeat center center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
						</div>
					
						<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),'</a></h4>' ); ?>
					</header><!-- .entry-header -->
				
					<?php the_excerpt(); ?>
				
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
							'after'  => '</div>',
						) );
					?>
				
					<footer class="entry-footer">
						<?php understrap_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</div><!-- /.card-block -->
			</div><!-- /.card -->
		</article><!-- #post-## -->
	</div>