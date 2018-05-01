		</main>
		<footer class="footer">
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<div class="row">
								<div class="col-md-6">
									<div class="footer-menu">
										<ul class="nav-menu">
											<li><a href="<?php echo base_url(); ?>">Home</a></li>
											<li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
											<li><a href="<?php echo base_url('states'); ?>">States</a></li>
											<li><a href="<?php echo (current_url() == base_url()) ? '#top_cities' : base_url('#top_cities'); ?>" class="top-cities">Top Cities</a></li>
											<li><a href="<?php echo base_url('privacy-policy') ?>">Privacy Policy</a></li>
											<li><a href="<?php echo base_url('contact-us'); ?>">Contact Us</a></li>
											<li><a href="<?php echo base_url('add-business') ?>">Add Business</a></li>
										</ul>
									</div>
								</div>
								<div class="col-md-6">
									<div class="footer-social">
										<ul class="nav-social">
											<li>
												<a href="<?php echo the_config('facebook_link'); ?>" title="Facebook"><i class="fa fa-facebook"></i></a>
											</li>
											<li>
												<a href="<?php echo the_config('twitter_link'); ?>" title="Twitter"><i class="fa fa-twitter"></i></a>
											</li>
											<li>
												<a href="<?php echo the_config('googleplus_link'); ?>" title="Google Plus"><i class="fa fa-google-plus"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="container">
					<p class="copyright">© <?php echo date('Y'); ?> Copyright <?php echo the_config('site_name'); ?>. <br class="visible-xs"/>All Rights Reserved.</p>
				</div>
			</div>
		</footer>

        <script type="text/javascript" src="<?php echo base_url('build/js/master-scripts.js?v=1'); ?>"></script>
        <script src="http://maps.google.com/maps/api/js?key=<?php echo the_config('gmap_apikey'); ?>" 
            type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('build/js/scripts.js?v=1'); ?>"></script>

        <script type="text/javascript">
        	// START Google Map Loads
        	<?php
                if(!empty($search_data)) {
                $cities = array();
					foreach($search_data as $result) {
						$cities[] = '"'.$result->name.', '.strtoupper($result->state).'"';
					}
					$city = '['.join(',', $cities).']';
					
					?>
					
			var map;
			var elevator;
			var myOptions = {
				zoom: 3,
				center: new google.maps.LatLng(39, -95),
				mapTypeId: 'terrain'
			};
			map = new google.maps.Map($('#search-map-overlay')[0], myOptions);

			var addresses = <?php echo $city; ?>;

			for (var x = 0; x < addresses.length; x++) {
				$.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
					var p = data.results[0].geometry.location
					var latlng = new google.maps.LatLng(p.lat, p.lng);
					new google.maps.Marker({
						position: latlng,
						map: map
					});
				});
			}
        	<?php } ?>
        	

			<?php if(!empty($map_data)) { ?>

			var locations = [
				<?php
				foreach($map_data as $biz) {
					echo $biz.',';
				}
				?>
			];

			var map = new google.maps.Map(document.getElementById('map-overlay'), {
				
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

			var infowindow = new google.maps.InfoWindow();
			var bounds = new google.maps.LatLngBounds();

			var marker, i;

			for (i = 0; i < locations.length; i++) {  
				marker = new google.maps.Marker({
					position: new google.maps.LatLng(locations[i][1], locations[i][2]),
					map: map
				});

				bounds.extend(marker.position);

				google.maps.event.addListener(marker, 'click', (function(marker, i) {
					return function() {
						infowindow.setContent(locations[i][0]);
						infowindow.open(map, marker);
					}
				})(marker, i));
			}

			map.fitBounds(bounds);


			var listener = google.maps.event.addListener(map, "idle", function () {
			    map.setZoom(10);
			    google.maps.event.removeListener(listener);
			});

			<?php } ?>
			// END Google Map Load

        </script>

    </body>

</html>