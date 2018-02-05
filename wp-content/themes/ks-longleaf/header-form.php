<div id="header-form" class="featured-box slideUp hidden-xs text-center">
	<h4>Call to make an appointment</h4>
	<a href="tel:<?php echo get_theme_mod( 'themeslug_phone' ); ?>" class="btn btn-info btn-block anchored">
		<span class="fa-stack">
			<i class="fa fa-circle fa-stack-2x"></i>
			<i class="fa fa-stack-1x fa-inverse fa-phone"></i>
		</span> 
		<?php echo get_theme_mod( 'themeslug_phone' ); ?>
	</a>
	<?php if (get_theme_mod ( 'themeslug_hide_button_one') == 'value2'  ) : ?>
			<a href="<?php echo get_theme_mod( 'themeslug_button_one_link' ); ?>" class="btn btn-success btn-sm btn-block">
				<span class="fa-stack">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-stack-1x fa-inverse <?php echo get_theme_mod( 'themeslug_button_one_icon' ); ?>"></i>
				</span> 
				<?php echo get_theme_mod( 'themeslug_button_one' ); ?>
			</a>
	<?php endif; ?>
	<?php if (get_theme_mod ( 'themeslug_hide_button_two') == 'value2'  ) : ?>
			<a href="<?php echo get_theme_mod( 'themeslug_button_two_link' ); ?>" class="btn btn-success btn-block btn-sm">
				<span class="fa-stack">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-stack-1x fa-inverse <?php echo get_theme_mod( 'themeslug_button_two_icon' ); ?>"></i>
				</span> 
				<?php echo get_theme_mod( 'themeslug_button_two' ); ?>
			</a>
	<?php endif; ?>
	<?php if (get_theme_mod ( 'themeslug_hide_button_three') == 'value2'  ) : ?>
			<a href="<?php echo get_theme_mod( 'themeslug_button_three_link' ); ?>" class="btn btn-success btn-block btn-sm">
				<span class="fa-stack">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-stack-1x fa-inverse <?php echo get_theme_mod( 'themeslug_button_three_icon' ); ?>"></i>
				</span> 
				<?php echo get_theme_mod( 'themeslug_button_three' ); ?>
			</a>
	<?php endif; ?>
	<?php if (get_theme_mod ( 'themeslug_hide_button_four') == 'value2'  ) : ?>
			<a href="<?php echo get_theme_mod( 'themeslug_button_four_link' ); ?>" class="btn btn-success btn-block btn-sm">
				<span class="fa-stack">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-stack-1x fa-inverse <?php echo get_theme_mod( 'themeslug_button_four_icon' ); ?>"></i>
				</span> 
				<?php echo get_theme_mod( 'themeslug_button_four' ); ?>
			</a>
	<?php endif; ?>
	<?php if (get_theme_mod ( 'themeslug_hide_button_five') == 'value2'  ) : ?>
			<a href="<?php echo get_theme_mod( 'themeslug_button_five_link' ); ?>" class="btn btn-success btn-block btn-sm">
				<span class="fa-stack">
				  <i class="fa fa-circle fa-stack-2x"></i>
				  <i class="fa fa-stack-1x fa-inverse <?php echo get_theme_mod( 'themeslug_button_five_icon' ); ?>"></i>
				</span> 
				<?php echo get_theme_mod( 'themeslug_button_five' ); ?>
			</a>
	<?php endif; ?>
</div><!-- /#header-form -->