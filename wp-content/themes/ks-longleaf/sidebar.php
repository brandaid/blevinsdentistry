<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div class="widget-area col-md-3">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
			<?php /* get_template_part('social'); */ ?>
		</div><!-- #secondary -->
	<?php endif; ?>