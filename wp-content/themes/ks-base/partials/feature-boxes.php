<?php if (get_theme_mod('themeslug_fboxes_format') == 'value1') : ?>
		
	<?php get_template_part( 'partials/fboxes', 'img-overlay' ); ?>
		
<?php else : ?>
		
	<?php get_template_part( 'partials/fboxes', 'img-above' ); ?>
		
<?php endif; ?>