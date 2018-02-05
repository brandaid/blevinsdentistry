<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="site-content">
		<div id="content" role="main">

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
					  <div class="col-sm-8 col-sm-offset-2">
						  <div class="featured-box">
							  <form action="<?php bloginfo('url'); ?>" method="get">
									<div class="input-group">
										<input id="s" name="s" type="text" class="form-control" placeholder="Search for Keyword" style="height:34px;">   
											<span class="input-group-btn">
												<button class="btn btn-primary" name="submit" type="submit">
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

		</div><!-- #content -->
	</div><!-- #primary -->
</div><!-- /.container -->
<?php get_footer(); ?>