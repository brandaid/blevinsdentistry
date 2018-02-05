<div id="slideout-form" class="card hidden-md-down">
	<button id="open-form-btn" class="btn btn-secondary" data=slidepanel="panel"><?php echo get_theme_mod( 'themeslug_slideout_form_btn' ); ?> <i class="fa fa-angle-up"></i></button>
	<button id="close-form-btn" class="btn btn-info btn-sm" data=slidepanel="panel"><i class="fa fa-times"></i></button>
    <div class="card-block">
      <h4 class="card-title"><?php echo get_theme_mod( 'themeslug_slideout_form_header' ); ?></h4>
      <h6 class="card-subtitle mb-2 text-muted"><?php echo get_theme_mod( 'themeslug_slideout_form_text' ); ?></h6>
      <hr />
      <?php echo do_shortcode( '[contact-form-7 id="9" title="Contact form 1"]' ); ?>
    </div>
</div>