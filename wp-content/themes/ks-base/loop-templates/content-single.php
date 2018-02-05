<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<div class="entry-content">
			
			<header class="entry-header">
				<p class="text-muted"><em>Blog</em></p>
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
							
				<div class="post-meta text-muted">
					<small><i class="fa fa-clock-o"></i> <?php the_date(); ?></small>
				</div>
							
				<div class="feature-image-container" style="background: url(<?php the_post_thumbnail_url( $size ); ?>) no-repeat center center; -webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
				</div>
							
				<?php get_template_part( 'partials/buttons', 'share' ); ?>
							
			</header><!-- .entry-header -->
						
			<?php the_content(); ?>
				
			<?php
	        wp_link_pages(array(
	            'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
	            'after'  => '</div>',
	        ));        ?>
		</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<div class="arrows arrowsFixed hidden-md-down">
		<a href="<?php bloginfo('url') ?>/blog" class="back"><i class="fa fa-th"></i><span> Blog</span></a>
		<?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span>&nbsp;' . esc_html_x( 'Prev', 'Previous post', 'panel' ) ); ?>
		<?php next_post_link( '%link', '<span class="meta-nav">&rarr;</span>&nbsp;' . esc_html_x( 'Next', 'Next post', 'panel' ) ); ?>
	</div>
</article><!-- #post-## -->
