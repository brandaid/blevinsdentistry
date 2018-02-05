<div id="myModal1" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-pop-up">
				<div class="row">
					<div class="col-sm-8">
						<?php echo get_theme_mod( 'themeslug_gmap' ); ?>
					</div><!-- /col8 -->
					<div class="col-sm-4">
						<h3><i class="fa fa-map-marker"></i> Address</h3>
						<p><?php echo get_theme_mod( 'themeslug_address' ); ?></p>
						
						<hr />
						
						<h3><i class="fa fa-phone"></i> Phone</h3>
						<p><?php echo get_theme_mod( 'themeslug_phone' ); ?></p>
					</div><!-- /col4 -->
				</div><!-- /row -->
				
				<div class="featured-box">
					<form action="http://maps.google.com/maps" method="get" target="_blank">
						<div class="input-group">
							<label for="saddr" class="sr-only">Enter your location for customized directions</label>
							<input type="text" placeholder="Enter your location for customized directions!" name="saddr" class="form-control" />
							<input type="hidden" name="daddr" value="Blevins Dentistry" />
							<span class="input-group-btn">
								<input type="submit" value="Get Directions" class="btn btn-primary" />
							</span>
						</div>
					</form>
				</div><!-- /.fbox -->
			</div>
		</div>
	</div>
</div>