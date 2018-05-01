<section class="zip-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/banner-bg-5.jpeg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1 class="txt-center">
					Seeking Emergency Locksmith Experts in <span class="location-inblock"><?php echo $city_data->name.', '.strtoupper($city_data->state).' '.$zip; ?>?</span> <a href="tel:<?php echo $city_data->phone; ?>" class="phone-inblock">Call <?php echo $city_data->phone; ?></a>
				</h1>
				<br/>
				<h4 class="txt-center">Locksmith Services in <span class="location-inblock"><?php echo $city_data->name.', '.strtoupper($city_data->state).' '.$zip; ?></span></h4>
			</div>
		</div>
	</section>

    <section class="section-zip-wrap">
   		<div class="container">
    		<div class="row">
    			<div class="col-md-8">

    				<div class="section-search">
						<div class="searchform-wrap">
							<div class="row">
								<div class="col-md-10 col-md-offset-1">
									<h2 class="section-label txt-center">Search Locksmith Services</h2>
									<?php include('parts/form-search.php'); ?>
								</div>
							</div>
					    </div>
					</div>

					<div class="zip-promo-wrap">
	    				<div class="promo-item">
	    					<div class="overlay">
	    						<h3>If you're seeking Reliable Locksmith Companies in <span class="location-inblock"><?php echo ucwords($location); ?></span></h3>
								<h2><a href="tel:<?php echo $city_data->phone; ?>" class="phone-inblock">Call <?php echo $city_data->phone; ?></a></h2>
	    					</div>
	    				</div>
		    		</div>

    				<div class="section-content">

			 			<div class="service-item-wrap">

			    		<?php
		    				if($res_count != 0) {
		    					$business = $api;
		    					foreach($business as $biz) {
		    						$address1 = (isset($biz['location']['address'])) ? $biz['location']['address'] : NULL;
		    						$address2 = $biz['location']['city'].' '.$biz['location']['zipcode'].', '.$biz['location']['state'];
		    						$category = join(', ', $biz['categories']);
		    						$thumb = (!empty($biz['photos']['primary'])) ? $biz['photos']['primary'] : base_url('build/images/biz-placeholder.png');

		    			?>
			    			<div class="biz-item">

			    				<div class="row">
			    					<div class="col-md-3">
										<div class="biz-img">
					    					<img src="<?php echo $thumb; ?>" class="img-responsive" alt="<?php echo $biz['name']; ?>" title="<?php echo $biz['name']; ?>" />
					    				</div>
									</div>
			    					<div class="col-md-9">
						    			<h3 class="biz-title"><?php echo $biz['name']; ?></h3>
						    			<div class="biz-info">
											<ul class="list-info fa-ul">
												<li><i class="fa fa-map-marker fa-li"></i> <?php echo $address1; ?></li>
												<li><i class="fa fa-location-arrow fa-li"></i> <?php echo $address2; ?></li>
												<li><i class="fa fa-li fa-puzzle-piece"></i> <?php echo $category; ?></li>
											</ul>
										</div>
									</div>
						    	</div>

				    		</div>

				    	<?php
				    			}
				    		} else {
				    	?>

				    		<div class="well">No Results Found.</div>

				    	<?php } ?>
				    		
			    		</div>

			    	</div>

    			</div>

    			<div class="col-md-4">
    				
    				<div class="aside">

    					<div class="widget-map">
					    	<div class="widget-header">
    							<h3><i class="fa fa-map-pin hidden-xs"></i> <?php echo $city_data->name.', '.$state->state; ?></h3>
    						</div>
						    <div class="map-wrap">
	    					<?php
		    					if(empty($map_data)) {
		    				?>
		    					<iframe frameborder="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $location; ?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=6&amp;output=embed" ></iframe>
		    				<?php } else { ?>
		    					<div id="map-overlay"></div>
		    				<?php } ?>
		    				</div>
		    			</div>

	    				<?php include('parts/weather-cityzip.php'); ?>

	    				<div class="widget-promo">

    						<div class="widget-header">
    							<h3><i class="fa fa-info-circle hidden-xs"></i> Promotion</h3>
    						</div>

		    				<div class="promo-wrap data-img" data-bg="<?php echo base_url('build/images/banner-bg-1.jpg'); ?>">
		    					<div class="overlay">
			    					<h3>Are you in need of a Locksmith Expert in <span class="location-inblock"><?php echo ucwords($location); ?></span></h3>
									<h2><a href="tel:<?php echo $city_data->phone; ?>">CALL <?php echo $city_data->phone; ?></a></h2>
								</div>
		    				</div>
		    			</div>

		    			<?php include('parts/widget-aside-recent-blog.php'); ?>

    				</div>

    			</div>

    		</div>

    	</div>

    </section>

</section>