<div class="state-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/states/'.$state->abbrev.'.jpg'); ?>">
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
    				<div class="section-content">
    					<div class="full-map-wrap">
    						<?php include('parts/widget-map-state.php'); ?>
    					</div>
			    		<div class="cities-wrap">
			    			<?php if(!empty($cities)) {
			    				foreach($cities as $city) {
			    					$mapAddress = getLocation($city->name.', '.strtoupper($city->state));
									$coordinates = $mapAddress->lat.','.$mapAddress->lng;
			    				?>
			    			<div class="city-item">
			    				<div class="media">
									<div class="media-left">
										<a href="<?php echo base_url('city/'.$city->slug); ?>">
											<img class="media-object" src="<?php echo static_map($coordinates, '500x500', 17); ?>" alt="<?php echo $city->name.', '.strtoupper($city->state); ?>">
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading"><?php echo $city->name.', '.strtoupper($city->state); ?></h4>
										<p><small><?php echo base_url('city/'.$city->slug); ?></small></p>
										<p><?php echo truncate($city->zip_code, 200); ?></p>
									</div>
								</div>
			    			</div>
			    			<?php }
			    				if (strlen($pagination)) {
			                        echo $pagination;
			                    }
			    			} else { ?>
			    			<h2 class="text-center">No Cities Available</h2>
			    			<?php } ?>
			    		</div>
    				</div>
    			</div>

    			<div class="col-md-4">
    				<div class="aside">
    					<?php include('parts/form-search-aside.php'); ?>
		    			<hr/>
	    				<?php include('parts/weather-state.php'); ?>
	    				<hr/>
	    				<?php include('parts/widget-aside-recent-blog.php'); ?>
	    			</div>
    			</div>
    		</div>
    	</div>
    </section>
</div>