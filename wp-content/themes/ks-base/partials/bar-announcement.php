<div id="bar-announcement" class="bar">
	<div class="container">
		
		<span class="fa-stack fa-lg">
		  <i class="fa fa-circle fa-stack-2x"></i>
		  <i class="fa 
		  
			<?php if (get_theme_mod('themeslug_bar_announcement_icon') == 'value1') { ?>
				fa-flag
			<?php } elseif (get_theme_mod('themeslug_bar_announcement_icon') == 'value2') { ?>
				fa-bullhorn
			<?php } elseif (get_theme_mod('themeslug_bar_announcement_icon') == 'value3') { ?>
				fa-bell
			<?php } elseif (get_theme_mod('themeslug_bar_announcement_icon') == 'value4') { ?>
				fa-certificate
			<?php } elseif (get_theme_mod('themeslug_bar_announcement_icon') == 'value5') { ?>
				fa-clock-o
			<?php } elseif (get_theme_mod('themeslug_bar_announcement_icon') == 'value6') { ?>
				fa-comment
			<?php } elseif (get_theme_mod('themeslug_bar_announcement_icon') == 'value7') { ?>
				fa-exclamation
			<?php } elseif (get_theme_mod('themeslug_bar_announcement_icon') == 'value8') { ?>
				fa-heart
			<?php } elseif (get_theme_mod('themeslug_bar_announcement_icon') == 'value9') { ?>
				fa-microphone
			<?php } elseif (get_theme_mod('themeslug_bar_announcement_icon') == 'value10') { ?>
				fa-shield
			<?php } ?> 
		  
		  fa-stack-1x fa-inverse"></i>
		</span>

		<a href="<?php echo get_theme_mod( 'themeslug_bar_announcement_url' ); ?>"><?php echo get_theme_mod( 'themeslug_bar_announcement_text' ); ?></a>&nbsp;&nbsp;
		
		<?php if (get_theme_mod ( 'themeslug_bar_announcement_btn_text') ) : ?>
			<a href="<?php echo get_theme_mod( 'themeslug_bar_announcement_url' ); ?>" class="btn btn-primary"><?php echo get_theme_mod( 'themeslug_bar_announcement_btn_text' ); ?> <i class="fa fa-angle-right"></i></a>
		<?php endif; ?>
	</div>
</div><!-- /#hello-bar -->