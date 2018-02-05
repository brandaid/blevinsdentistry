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
?>

<div class="wrapper" id="page-wrapper">
	
	<?php if ( get_field( 'turn_on_header_block' ) ): ?>
		<header class="text-center jumbotron jumbotron-fluid <?php if (has_post_thumbnail()) : ?>jumbotron-with-bg<?php endif; ?> <?php if (get_field('header_block_alignment') == "Left") { ?>text-lg-left<?php } elseif (get_field('header_block_alignment') == "Right") { ?>text-lg-right<?php } else { ?><?php } ?>"
			
			<?php if (has_post_thumbnail()) : ?>
				style="background: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>) no-repeat center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"
			<?php endif; ?> >
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<h1 class="display-4"><?php the_field('h1'); ?></h1>
						
						<?php if ( get_field( 'lead_paragraph' ) ): ?>
							<p class="lead text-muted"><?php the_field('lead_paragraph'); ?></p>
						<?php endif; ?>
						
					</div><!-- /.col-10 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
			<div class="overlay"></div>
		</header><!-- .jumbotron -->
	<?php else : ?>
		<hr />
	<?php endif; ?>

	<div class="container">

		<div class="row">

			<div class="col-12 col-sm-10 offset-sm-1">
				
				<main class="site-main" id="main">
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php get_template_part( 'loop-templates/content', 'page' ); ?>
	
						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>
	
					<?php endwhile; // end of the loop. ?>
	
				</main><!-- #main -->

			</div><!-- .col -->

		</div><!-- .row -->

	</div><!-- /.container -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>