<section class="zip-content">
	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/states/'.strtoupper($city_data->state).'.jpg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1>
					Seeking Emergency Locksmith Experts in <span class="location-inblock"><?php echo $city_data->name.', '.strtoupper($city_data->state).' '.$zip; ?>?</span>
				</h1>
				<br/>
				<h4><span class="location-inblock"><?php echo $city_data->name.', '.strtoupper($city_data->state).' '.$zip; ?></span> <a href="tel:<?php echo $city_data->phone; ?>" class="phone-inblock">Call <?php echo $city_data->phone; ?></a></h4>
			</div>
		</div>
	</section>

    <section class="section-zip-wrap">
   		<div class="container">
    		<div class="row">
    			<div class="col-md-8">
    				<div class="section-content">
			 			<div class="service-item-wrap">
			    		<?php
		    				if($res_count != 0) {
		    					foreach($api as $item) {
		    						$mapAddress = getLocation(address_proper($item['address']));
									$coordinates = $mapAddress->lat.','.$mapAddress->lng;

		    			?>
			    			<div class="biz-item">
			    				<div class="media">
									<div class="media-body">
										<h4 class="media-heading"><?php echo $item['name']; ?></h4>
										<ul class="fa-ul">
											<li><i class="fa fa-li fa-map-marker"></i> <?php echo address_proper($item['address']); ?></li>
											<li><i class="fa fa-li fa-phone"></i> <?php echo $item['phone']; ?></li>
										</ul>
										<?php
											foreach($item['entityTypeHints'] as $cat) {
												echo '<label class="label label-primary">'.$cat.'</label>&nbsp;';
											}
										?>
									</div>
									<div class="media-right">
										<a href="<?php echo static_map($coordinates, '500x500', 17); ?>">
											<img class="media-object" src="<?php echo static_map($coordinates, '500x500', 17); ?>" alt="<?php echo $item['name']; ?>" title="<?php echo $item['name']; ?>" />
										</a>
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
    					<?php include('parts/form-search-aside.php'); ?>
    					<hr/>
	    				<?php include('parts/weather-cityzip.php'); ?>
	    				<hr/>
		    			<?php include('parts/widget-aside-recent-blog.php'); ?>
	    				<hr/>
	    				<?php include('parts/widget-aside-promo-city.php'); ?>
    				</div>

    			</div>

    		</div>

    	</div>

    </section>

</section>