<!-- 3 Boxes -->
    <div id="mobile-feature-boxes" class="visible-xs-block">
		<a class="btn btn-primary btn-block" href="<?php echo get_theme_mod( 'themeslug_box-one-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-one-title' ); ?>"><img src="<?php echo get_theme_mod( 'themeslug_box-one-pic' ); ?>" alt="" class="img-circle"><?php echo get_theme_mod( 'themeslug_box-one-title' ); ?></a>
		
		<a class="btn btn-primary btn-block" href="<?php echo get_theme_mod( 'themeslug_box-two-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-two-title' ); ?>"><img src="<?php echo get_theme_mod( 'themeslug_box-two-pic' ); ?>" alt="" class="img-circle"><?php echo get_theme_mod( 'themeslug_box-two-title' ); ?></a>
		
		<a class="btn btn-primary btn-block" href="<?php echo get_theme_mod( 'themeslug_box-three-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-three-title' ); ?>"><img src="<?php echo get_theme_mod( 'themeslug_box-three-pic' ); ?>" alt="" class="img-circle"><?php echo get_theme_mod( 'themeslug_box-three-title' ); ?></a>

<!-- Optional 4th Box -->		
	<?php if (get_theme_mod ( 'themeslug_fboxes-count') == 'value2'  ) : ?>
		<a class="btn btn-primary btn-block" href="<?php echo get_theme_mod( 'themeslug_box-four-link' ); ?>" title="<?php echo get_theme_mod( 'themeslug_box-four-title' ); ?>"><img src="<?php echo get_theme_mod( 'themeslug_box-four-pic' ); ?>" alt="" class="img-circle"><?php echo get_theme_mod( 'themeslug_box-four-title' ); ?></a>
	<?php endif; ?>
</div><!-- /#feature-boxes -->
