<?php if (get_theme_mod ( 'themeslug_nav_top_left_on') == 'value1'  ) : ?>

	<!-- Left Item 1 -->
	<?php if (get_theme_mod ( 'themeslug_nav_top_left_item1_text') ) : ?>
		<li class="nav-item hidden-lg-up">
			<?php if (get_theme_mod ( 'themeslug_nav_top_left_item1_dropdown1_text') ) : ?>
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" id="dropdownLeft1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo get_theme_mod( 'themeslug_nav_top_left_item1_text' ); ?></a>
						<div class="dropdown-menu" aria-labelledby="dropdownLeft1">
							<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown1_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown1_text' ); ?></a>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item1_dropdown2_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown2_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown2_text' ); ?></a>
							<?php endif; ?>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item1_dropdown3_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown3_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown3_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item1_dropdown4_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown4_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown4_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item1_dropdown5_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown5_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown5_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item1_dropdown6_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown6_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item1_dropdown6_text' ); ?></a>
							<?php endif; ?>
						</div>
				</div>	
			<?php else : ?>
				<a href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item1_url' ); ?>" class="nav-link"><?php echo get_theme_mod( 'themeslug_nav_top_left_item1_text' ); ?></a>
			<?php endif; ?>
		</li>
	<?php endif; ?>
	
	<!-- Left Item 2 -->
	<?php if (get_theme_mod ( 'themeslug_nav_top_left_item2_text') ) : ?>
		<li class="nav-item hidden-lg-up">
			<?php if (get_theme_mod ( 'themeslug_nav_top_left_item2_dropdown1_text') ) : ?>
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" id="dropdownLeft1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo get_theme_mod( 'themeslug_nav_top_left_item2_text' ); ?></a>
						<div class="dropdown-menu" aria-labelledby="dropdownLeft1">
							<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown1_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown1_text' ); ?></a>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item2_dropdown2_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown2_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown2_text' ); ?></a>
							<?php endif; ?>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item2_dropdown3_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown3_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown3_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item2_dropdown4_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown4_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown4_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item2_dropdown5_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown5_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown5_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item2_dropdown6_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown6_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item2_dropdown6_text' ); ?></a>
							<?php endif; ?>
						</div>
				</div>	
			<?php else : ?>
				<a href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item2_url' ); ?>" class="nav-link"><?php echo get_theme_mod( 'themeslug_nav_top_left_item2_text' ); ?></a>
			<?php endif; ?>
		</li>
	<?php endif; ?>
	
	<!-- Left Item 3 -->
	<?php if (get_theme_mod ( 'themeslug_nav_top_left_item3_text') ) : ?>
		<li class="nav-item hidden-lg-up">
			<?php if (get_theme_mod ( 'themeslug_nav_top_left_item3_dropdown1_text') ) : ?>
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" id="dropdownLeft1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo get_theme_mod( 'themeslug_nav_top_left_item3_text' ); ?></a>
						<div class="dropdown-menu" aria-labelledby="dropdownLeft1">
							<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown1_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown1_text' ); ?></a>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item3_dropdown2_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown2_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown2_text' ); ?></a>
							<?php endif; ?>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item3_dropdown3_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown3_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown3_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item3_dropdown4_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown4_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown4_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item3_dropdown5_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown5_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown5_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item3_dropdown6_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown6_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item3_dropdown6_text' ); ?></a>
							<?php endif; ?>
						</div>
				</div>	
			<?php else : ?>
				<a href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item3_url' ); ?>" class="nav-link"><?php echo get_theme_mod( 'themeslug_nav_top_left_item3_text' ); ?></a>
			<?php endif; ?>
		</li>
	<?php endif; ?>
	
	<!-- Left Item 4 -->
	<?php if (get_theme_mod ( 'themeslug_nav_top_left_item4_text') ) : ?>
		<li class="nav-item hidden-lg-up">
			<?php if (get_theme_mod ( 'themeslug_nav_top_left_item4_dropdown1_text') ) : ?>
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" id="dropdownLeft1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo get_theme_mod( 'themeslug_nav_top_left_item4_text' ); ?></a>
						<div class="dropdown-menu" aria-labelledby="dropdownLeft1">
							<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown1_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown1_text' ); ?></a>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item4_dropdown2_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown2_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown2_text' ); ?></a>
							<?php endif; ?>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item4_dropdown3_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown3_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown3_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item4_dropdown4_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown4_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown4_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item4_dropdown5_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown5_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown5_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_left_item4_dropdown6_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown6_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_left_item4_dropdown6_text' ); ?></a>
							<?php endif; ?>
						</div>
				</div>	
			<?php else : ?>
				<a href="<?php echo get_theme_mod( 'themeslug_nav_top_left_item4_url' ); ?>" class="nav-link"><?php echo get_theme_mod( 'themeslug_nav_top_left_item4_text' ); ?></a>
			<?php endif; ?>
		</li>
	<?php endif; ?>
	
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_nav_top_right_on') == 'value1'  ) : ?>

	<!-- Right Item 1 -->
	<?php if (get_theme_mod ( 'themeslug_nav_top_right_item1_text') ) : ?>
		<li class="nav-item hidden-lg-up">
			<?php if (get_theme_mod ( 'themeslug_nav_top_right_item1_dropdown1_text') ) : ?>
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" id="dropdownright1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo get_theme_mod( 'themeslug_nav_top_right_item1_text' ); ?></a>
						<div class="dropdown-menu" aria-labelledby="dropdownright1">
							<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown1_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown1_text' ); ?></a>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item1_dropdown2_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown2_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown2_text' ); ?></a>
							<?php endif; ?>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item1_dropdown3_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown3_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown3_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item1_dropdown4_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown4_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown4_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item1_dropdown5_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown5_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown5_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item1_dropdown6_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown6_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item1_dropdown6_text' ); ?></a>
							<?php endif; ?>
						</div>
				</div>	
			<?php else : ?>
				<a href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item1_url' ); ?>" class="nav-link"><?php echo get_theme_mod( 'themeslug_nav_top_right_item1_text' ); ?></a>
			<?php endif; ?>
		</li>
	<?php endif; ?>
	
	<!-- Right Item 2 -->
	<?php if (get_theme_mod ( 'themeslug_nav_top_right_item2_text') ) : ?>
		<li class="nav-item hidden-lg-up">
			<?php if (get_theme_mod ( 'themeslug_nav_top_right_item2_dropdown1_text') ) : ?>
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" id="dropdownright1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo get_theme_mod( 'themeslug_nav_top_right_item2_text' ); ?></a>
						<div class="dropdown-menu" aria-labelledby="dropdownright1">
							<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown1_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown1_text' ); ?></a>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item2_dropdown2_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown2_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown2_text' ); ?></a>
							<?php endif; ?>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item2_dropdown3_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown3_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown3_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item2_dropdown4_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown4_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown4_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item2_dropdown5_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown5_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown5_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item2_dropdown6_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown6_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item2_dropdown6_text' ); ?></a>
							<?php endif; ?>
						</div>
				</div>	
			<?php else : ?>
				<a href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item2_url' ); ?>" class="nav-link"><?php echo get_theme_mod( 'themeslug_nav_top_right_item2_text' ); ?></a>
			<?php endif; ?>
		</li>
	<?php endif; ?>
	
	<!-- Right Item 3 -->
	<?php if (get_theme_mod ( 'themeslug_nav_top_right_item3_text') ) : ?>
		<li class="nav-item hidden-lg-up">
			<?php if (get_theme_mod ( 'themeslug_nav_top_right_item3_dropdown1_text') ) : ?>
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" id="dropdownright1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo get_theme_mod( 'themeslug_nav_top_right_item3_text' ); ?></a>
						<div class="dropdown-menu" aria-labelledby="dropdownright1">
							<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown1_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown1_text' ); ?></a>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item3_dropdown2_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown2_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown2_text' ); ?></a>
							<?php endif; ?>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item3_dropdown3_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown3_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown3_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item3_dropdown4_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown4_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown4_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item3_dropdown5_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown5_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown5_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item3_dropdown6_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown6_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item3_dropdown6_text' ); ?></a>
							<?php endif; ?>
						</div>
				</div>	
			<?php else : ?>
				<a href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item3_url' ); ?>" class="nav-link"><?php echo get_theme_mod( 'themeslug_nav_top_right_item3_text' ); ?></a>
			<?php endif; ?>
		</li>
	<?php endif; ?>
	
	<!-- Right Item 4 -->
	<?php if (get_theme_mod ( 'themeslug_nav_top_right_item4_text') ) : ?>
		<li class="nav-item hidden-lg-up">
			<?php if (get_theme_mod ( 'themeslug_nav_top_right_item4_dropdown1_text') ) : ?>
				<div class="dropdown">
					<a class="nav-link dropdown-toggle" id="dropdownright1" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo get_theme_mod( 'themeslug_nav_top_right_item4_text' ); ?></a>
						<div class="dropdown-menu" aria-labelledby="dropdownright1">
							<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown1_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown1_text' ); ?></a>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item4_dropdown2_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown2_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown2_text' ); ?></a>
							<?php endif; ?>
								      
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item4_dropdown3_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown3_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown3_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item4_dropdown4_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown4_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown4_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item4_dropdown5_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown5_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown5_text' ); ?></a>
							<?php endif; ?>
										
							<?php if (get_theme_mod ( 'themeslug_nav_top_right_item4_dropdown6_text')) : ?>
								<a class="dropdown-item" href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown6_url' ); ?>"><?php echo get_theme_mod( 'themeslug_nav_top_right_item4_dropdown6_text' ); ?></a>
							<?php endif; ?>
						</div>
				</div>	
			<?php else : ?>
				<a href="<?php echo get_theme_mod( 'themeslug_nav_top_right_item4_url' ); ?>" class="nav-link"><?php echo get_theme_mod( 'themeslug_nav_top_right_item4_text' ); ?></a>
			<?php endif; ?>
		</li>
	<?php endif; ?>
	
<?php endif; ?>