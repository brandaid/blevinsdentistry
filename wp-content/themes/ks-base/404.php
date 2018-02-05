<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();
?>
<hr />
<div class="wrapper" id="404-wrapper">

	<div class="container" id="content">

		<div class="row">
			
			<div class="col-12">
				
				<div class="content-area" id="primary">
	
					<main class="site-main" id="main" role="main">
	
						<div class="row text-center">
							<div class="col-sm-8 offset-sm-2">
								<article id="post-0" class="post error404 no-results not-found">
									<header class="entry-header">
										<h1 class="entry-title text-center">
											<span class="fa-stack fa-lg">
											  <i class="fa fa-circle fa-stack-2x"></i>
											  <i class="fa fa-cogs fa-stack-1x fa-inverse"></i>
											</span><br />
											We are currently working to improve this part of the website!</h1>
									</header>
					
									<div class="entry-content text-center">
										<p>However, running a search might help you find what you're looking for.</p>
										<?php /* get_search_form(); */ ?>
										
										<div class="row">
										  <div class="col-sm-8 offset-sm-2">
											  <div class="featured-box">
												  <form action="<?php bloginfo('url'); ?>" method="get">
														<div class="input-group">
															<input id="s" name="s" type="text" class="form-control" placeholder="Search for Keyword">   
																<span class="input-group-btn">
																	<button class="btn btn-primary" type="submit">
																    	<i class="fa fa-search"></i>
																    </button>
																</span>		               
														</div><!-- /input-group -->
													</form>
												</div>
										  </div>
										</div>
										
									</div><!-- .entry-content -->
								</article><!-- #post-0 -->
							</div>
						</div>
	
					</main><!-- #main -->
	
				</div><!-- #primary -->
			
			</div><!-- /.col-12 -->
			
		</div> <!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>