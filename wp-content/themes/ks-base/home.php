<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
$posts_style = get_theme_mod( 'understrap_posts_index_style' );

if ( is_front_page() && is_home() ) {
	get_sidebar( 'hero' );

	get_sidebar( 'statichero' );
}
?>

<div class="wrapper entry-content" id="wrapper-home">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

				<main class="site-main" id="main">
					
					<h1 class="text-center">Blog</h1>

					<?php if ( have_posts() ) : ?>

						<?php /* Start the Loop */ ?>
						
						<div class="row">
							<?php while ( have_posts() ) : the_post(); ?>
	
								<?php
									get_template_part( 'loop-templates/content', get_post_format() );
								?>
	
							<?php endwhile; ?>
						</div>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

			</main><!-- #main -->

			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>