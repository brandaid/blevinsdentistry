<div id="loc1-modal" class="modal fade">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-map-marker"></i> <?php echo get_theme_mod( 'themeslug_loc1_name' ); ?> Directions</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
					<div class="col-sm-4">
						<p><?php echo get_theme_mod( 'themeslug_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_address_zip' ); ?></p>
						<a href="tel:<?php echo get_theme_mod( 'themeslug_phone' ); ?>" class="btn btn-primary btn-block"><i class="fa fa-phone"></i> <?php echo get_theme_mod( 'themeslug_phone' ); ?></a>
					</div>
					<div class="col-sm-8">
						<?php echo get_theme_mod( 'themeslug_gmap' ); ?>
					</div>
				</div>
				<hr />
				<div class="card">
					<div class="card-block">
						<form action="http://maps.google.com/maps" method="get" target="_blank">
							<div class="input-group">
								<label for="saddr" class="sr-only">Enter your location for customized directions</label>
								<input type="text" placeholder="Enter your location for customized directions!" name="saddr" class="form-control" />
								<input type="hidden" name="daddr" value="<?php echo get_theme_mod( 'themeslug_address_street' ); ?>, <?php echo get_theme_mod( 'themeslug_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_address_zip' ); ?>" />
								<span class="input-group-btn">
									<input type="submit" value="Go!" class="btn btn-primary" />
								</span>
							</div>
						</form>
					</div><!-- /.card-block -->
				</div><!-- /.card -->
      </div>
    </div>
  </div>
</div>

<?php if (get_theme_mod ( 'themeslug_loc2_name') ) : ?>
	<div id="loc2-modal" class="modal fade">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"><i class="fa fa-map-marker"></i> <?php echo get_theme_mod( 'themeslug_loc2_name' ); ?> Directions</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
						<div class="col-sm-4">
							<p><?php echo get_theme_mod( 'themeslug_loc2_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc2_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc2_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc2_address_zip' ); ?></p>
							<a href="tel:<?php echo get_theme_mod( 'themeslug_loc2_phone' ); ?>" class="btn btn-primary btn-block"><i class="fa fa-phone"></i> <?php echo get_theme_mod( 'themeslug_loc2_phone' ); ?></a>
						</div>
						<div class="col-sm-8">
							<?php echo get_theme_mod( 'themeslug_loc2_gmap' ); ?>
						</div>
					</div>
					<hr />
					<div class="card">
						<div class="card-block">
							<form action="http://maps.google.com/maps" method="get" target="_blank">
								<div class="input-group">
									<label for="saddr" class="sr-only">Enter your location for customized directions</label>
									<input type="text" placeholder="Enter your location for customized directions!" name="saddr" class="form-control" />
									<input type="hidden" name="daddr" value="<?php echo get_theme_mod( 'themeslug_loc2_address_street' ); ?>, <?php echo get_theme_mod( 'themeslug_loc2_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc2_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc2_address_zip' ); ?>" />
									<span class="input-group-btn">
										<input type="submit" value="Go!" class="btn btn-primary" />
									</span>
								</div>
							</form>
						</div><!-- /.card-block -->
					</div><!-- /.card -->
	      </div>
	    </div>
	  </div>
	</div>
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_loc3_name') ) : ?>
	<div id="loc3-modal" class="modal fade">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"><i class="fa fa-map-marker"></i> <?php echo get_theme_mod( 'themeslug_loc3_name' ); ?> Directions</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
						<div class="col-sm-4">
							<p><?php echo get_theme_mod( 'themeslug_loc3_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc3_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc3_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc3_address_zip' ); ?></p>
							<a href="tel:<?php echo get_theme_mod( 'themeslug_loc3_phone' ); ?>" class="btn btn-primary btn-block"><i class="fa fa-phone"></i> <?php echo get_theme_mod( 'themeslug_loc3_phone' ); ?></a>
						</div>
						<div class="col-sm-8">
							<?php echo get_theme_mod( 'themeslug_loc3_gmap' ); ?>
						</div>
					</div>
					<hr />
					<div class="card">
						<div class="card-block">
							<form action="http://maps.google.com/maps" method="get" target="_blank">
								<div class="input-group">
									<label for="saddr" class="sr-only">Enter your location for customized directions</label>
									<input type="text" placeholder="Enter your location for customized directions!" name="saddr" class="form-control" />
									<input type="hidden" name="daddr" value="<?php echo get_theme_mod( 'themeslug_loc3_address_street' ); ?>, <?php echo get_theme_mod( 'themeslug_loc3_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc3_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc3_address_zip' ); ?>" />
									<span class="input-group-btn">
										<input type="submit" value="Go!" class="btn btn-primary" />
									</span>
								</div>
							</form>
						</div><!-- /.card-block -->
					</div><!-- /.card -->
	      </div>
	    </div>
	  </div>
	</div>
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_loc4_name') ) : ?>
	<div id="loc4-modal" class="modal fade">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"><i class="fa fa-map-marker"></i> <?php echo get_theme_mod( 'themeslug_loc4_name' ); ?> Directions</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
						<div class="col-sm-4">
							<p><?php echo get_theme_mod( 'themeslug_loc4_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc4_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc4_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc4_address_zip' ); ?></p>
							<a href="tel:<?php echo get_theme_mod( 'themeslug_loc4_phone' ); ?>" class="btn btn-primary btn-block"><i class="fa fa-phone"></i> <?php echo get_theme_mod( 'themeslug_loc4_phone' ); ?></a>
						</div>
						<div class="col-sm-8">
							<?php echo get_theme_mod( 'themeslug_loc4_gmap' ); ?>
						</div>
					</div>
					<hr />
					<div class="card">
						<div class="card-block">
							<form action="http://maps.google.com/maps" method="get" target="_blank">
								<div class="input-group">
									<label for="saddr" class="sr-only">Enter your location for customized directions</label>
									<input type="text" placeholder="Enter your location for customized directions!" name="saddr" class="form-control" />
									<input type="hidden" name="daddr" value="<?php echo get_theme_mod( 'themeslug_loc4_address_street' ); ?>, <?php echo get_theme_mod( 'themeslug_loc4_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc4_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc4_address_zip' ); ?>" />
									<span class="input-group-btn">
										<input type="submit" value="Go!" class="btn btn-primary" />
									</span>
								</div>
							</form>
						</div><!-- /.card-block -->
					</div><!-- /.card -->
	      </div>
	    </div>
	  </div>
	</div>
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_loc5_name') ) : ?>
	<div id="loc5-modal" class="modal fade">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"><i class="fa fa-map-marker"></i> <?php echo get_theme_mod( 'themeslug_loc5_name' ); ?> Directions</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
						<div class="col-sm-4">
							<p><?php echo get_theme_mod( 'themeslug_loc5_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc5_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc5_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc5_address_zip' ); ?></p>
							<a href="tel:<?php echo get_theme_mod( 'themeslug_loc5_phone' ); ?>" class="btn btn-primary btn-block"><i class="fa fa-phone"></i> <?php echo get_theme_mod( 'themeslug_loc5_phone' ); ?></a>
						</div>
						<div class="col-sm-8">
							<?php echo get_theme_mod( 'themeslug_loc5_gmap' ); ?>
						</div>
					</div>
					<hr />
					<div class="card">
						<div class="card-block">
							<form action="http://maps.google.com/maps" method="get" target="_blank">
								<div class="input-group">
									<label for="saddr" class="sr-only">Enter your location for customized directions</label>
									<input type="text" placeholder="Enter your location for customized directions!" name="saddr" class="form-control" />
									<input type="hidden" name="daddr" value="<?php echo get_theme_mod( 'themeslug_loc5_address_street' ); ?>, <?php echo get_theme_mod( 'themeslug_loc5_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc5_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc5_address_zip' ); ?>" />
									<span class="input-group-btn">
										<input type="submit" value="Go!" class="btn btn-primary" />
									</span>
								</div>
							</form>
						</div><!-- /.card-block -->
					</div><!-- /.card -->
	      </div>
	    </div>
	  </div>
	</div>
<?php endif; ?>

<?php if (get_theme_mod ( 'themeslug_loc6_name') ) : ?>
	<div id="loc6-modal" class="modal fade">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title"><i class="fa fa-map-marker"></i> <?php echo get_theme_mod( 'themeslug_loc6_name' ); ?> Directions</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
						<div class="col-sm-4">
							<p><?php echo get_theme_mod( 'themeslug_loc6_address_street' ); ?><br /> <?php echo get_theme_mod( 'themeslug_loc6_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc6_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc6_address_zip' ); ?></p>
							<a href="tel:<?php echo get_theme_mod( 'themeslug_loc6_phone' ); ?>" class="btn btn-primary btn-block"><i class="fa fa-phone"></i> <?php echo get_theme_mod( 'themeslug_loc6_phone' ); ?></a>
						</div>
						<div class="col-sm-8">
							<?php echo get_theme_mod( 'themeslug_loc6_gmap' ); ?>
						</div>
					</div>
					<hr />
					<div class="card">
						<div class="card-block">
							<form action="http://maps.google.com/maps" method="get" target="_blank">
								<div class="input-group">
									<label for="saddr" class="sr-only">Enter your location for customized directions</label>
									<input type="text" placeholder="Enter your location for customized directions!" name="saddr" class="form-control" />
									<input type="hidden" name="daddr" value="<?php echo get_theme_mod( 'themeslug_loc6_address_street' ); ?>, <?php echo get_theme_mod( 'themeslug_loc6_address_city' ); ?>, <?php echo get_theme_mod( 'themeslug_loc6_address_state' ); ?> <?php echo get_theme_mod( 'themeslug_loc6_address_zip' ); ?>" />
									<span class="input-group-btn">
										<input type="submit" value="Go!" class="btn btn-primary" />
									</span>
								</div>
							</form>
						</div><!-- /.card-block -->
					</div><!-- /.card -->
	      </div>
	    </div>
	  </div>
	</div>
<?php endif; ?>