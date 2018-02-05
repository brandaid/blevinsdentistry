<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper search-wrapper">
	
	<div class="entry-content">

		<div class="container" id="content" tabindex="-1">
	
				<main class="site-main" id="main">
	
					<?php if ( have_posts() ) : ?>
	
						<header class="page-header">
	
							<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'understrap' ),
							'<span>' . get_search_query() . '</span>' ); ?></h1>
	
						</header><!-- .page-header -->
						
						<hr />
	
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
	
							<?php
							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'loop-templates/content', 'search' );
							?>
	
						<?php endwhile; ?>
	
					<?php else : ?>
	
						<?php get_template_part( 'loop-templates/content', 'none' ); ?>
	
					<?php endif; ?>
	
				</main><!-- #main -->
	
				<!-- The pagination component -->
				<?php understrap_pagination(); ?>
	
		</div><!-- Container end -->
	
	</div><!-- .entry-content -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
