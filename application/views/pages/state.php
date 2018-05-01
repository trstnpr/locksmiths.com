<div class="state-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/banner-bg-4.jpeg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1><?php echo $state->state; ?></h1>
			</div>
		</div>
	</section>

    <section class="section-state-wrap">

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

    				<div class="section-content">
			    		
			    		<div class="cities-wrap">

		    				<?php if(!empty($cities)) { ?>

		    					<div class="row">

		    						<?php

		    							foreach($cities as $city) {
		    								$state_abbrev = $city->state;
		    								$city_name = strtolower(str_replace(' ', '-', $city->name));
			    							$city_url =  base_url('city/'.$city_name.'-'.$state_abbrev);
		    						?>

		    						<div class="col-md-4 col-sm-6 city-item">

		    							<a href="<?php echo $city_url; ?>" class="list-state">
		    								<i class="fa fa-map-marker"></i> <?php echo $city->name; ?>
		    							</a>

			    					</div>

			    					<?php } ?>

		    					</div>

		    				<?php } ?>
				    		
			    		</div>

			    		<?php if ($city_count > $limit) { ?>
			    		<button type="button" class="btn btn-orange btn-block load-more-cities hide" data-loadmore="<?php echo base_url('states/loadcities'); ?>">Show More</button>
			    		<input type="hidden" id="state" value="<?php echo $state->abbrev; ?>" />
			            <input type="hidden" id="row" value="0" />
			            <input type="hidden" id="all" value="<?php echo $city_count; ?>" />
			            <?php } ?>

    				</div>

    			</div>

    			<div class="col-md-4">

    				<div class="aside">

					    <div class="widget-map">
					    	<div class="widget-header">
    							<h3><?php echo $state->state; ?></h3>
    						</div>
						    <div class="map-wrap">
		    					<iframe frameborder="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $state->state.', '.$state->abbrev; ?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=7&amp;output=embed" ></iframe>
		    				</div>
		    			</div>

	    				<?php include('parts/weather-state.php'); ?>

	    				<?php include('parts/widget-aside-recent-blog.php'); ?>

	    			</div>

    			</div>

    		</div>

    	</div>

    </section>

</div>