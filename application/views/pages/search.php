<div class="searchresult-content">
	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/banner-bg-5.jpeg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1>
					Results for <span class="location-inblock">"<?php echo ucwords($location); ?>"</span>
				</h1>
			</div>
		</div>
	</section>
    <section class="section-searchresults">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8">
    				<div class="section-content">
			    		<?php if($search_data != NULL) { ?>
				    		<div class="result-wrap">
				    		<?php foreach($search_data as $result) {
				    			$mapAddress = getLocation($result->name.', '.strtoupper($result->state));
								$coordinates = $mapAddress->lat.','.$mapAddress->lng;
								// dump(static_map($coordinates, '500x500', 17));
				    		?>
				    			<div class="result-item-wrap">
									<div class="media">
										<div class="media-left">
											<a href="<?php echo base_url('city/'.$result->slug); ?>">
												<img class="media-object" src="<?php echo static_map($coordinates, '500x500', 17); ?>" alt="<?php echo $result->name.', '.strtoupper($result->state); ?>" title="<?php echo $result->name.', '.strtoupper($result->state); ?>">
											</a>
										</div>
										<div class="media-body">
											<h4 class="media-heading">
												Locksmiths Services in <strong class="txt-inblock"><?php echo $result->name.', '.strtoupper($result->state); ?></strong>
											</h4>
											<p><small><?php echo base_url('city/'.$result->slug); ?></small></p>
											<p><?php echo truncate($result->zip_code, 200); ?></p>
											<a href="tel:<?php echo $result->phone; ?>" class="btn btn-primary btn-sm">Hotline <?php echo $result->phone; ?></a>
										</div>
									</div>
						    	</div>
					    	<?php } ?>
				    		</div>
			    		<?php } else { ?>

			    		<div class="well">
			    			<h3 class="txt-center" style="font-weight:bold;">No Results Found.</h3>
			    		</div>
			    		<?php } ?>
    				</div>
    			</div>
    			<div class="col-md-4">
    				<div class="aside">
    					<?php include('parts/form-search-aside.php'); ?>
    					<hr/>
    					<?php include('parts/widget-aside-search-map.php'); ?>
    					<br/>
		    			<?php include('parts/widget-aside-recent-blog.php'); ?>
	    			</div>
    			</div>
    		</div>
    	</div>
    </section>
</div>