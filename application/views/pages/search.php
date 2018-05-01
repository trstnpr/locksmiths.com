<div class="searchresult-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/random/3.jpg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1 class="txt-center">
					Results for <span class="location-inblock">"<?php echo ucwords($location); ?>"</span>
				</h1>
			</div>
		</div>
	</section>

    <section class="section-searchresults">

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
    					
			    		<?php if($search_data != NULL) { ?>

				    		<div class="result-wrap">

				    		<?php foreach($search_data as $result) {
				    			$rand_int = array_rand(range(1,12), 1);
				    			$ads_img = 'build/images/thumb-ad/'.$rand_int.'.jpg';
				    		?>
				    			<div class="result-item-wrap">

					    			<div class="result-details">
										<h3 clas="result-title">
											<a href="<?php echo base_url('city/'.$result->slug); ?>">
												Locksmith Boy Services in <strong class="txt-inblock"><?php echo $result->name.', '.strtoupper($result->state); ?></strong>
											</a>
										</h3>
										<a class="permalink" href="<?php echo base_url('city/'.$result->slug); ?>"><?php echo base_url('city/'.$result->slug); ?></a>
										<ul class="fa-ul">
											<li><i class="fa fa-location-arrow fa-li"></i> <?php echo $result->name.', '.strtoupper($result->state); ?></li>
											<li><i class="fa fa-phone fa-li"></i> <?php echo $result->phone; ?></li>
										</ul>
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

    					<div class="widget-map">
					    	<div class="widget-header">
    							<h3><i class="fa fa-map-pin hidden-xs"></i> Locations</h3>
    						</div>
    						<div class="map-wrap">
						    <?php if($search_data != NULL) { ?>
		    					<div id="search-map-overlay"></div>
		    				<?php } else { ?>
		    					<iframe frameborder="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo 'USA'; ?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=3&amp;output=embed" ></iframe>
		    				<?php } ?>
		    				</div>
		    			</div>

		    			<?php include('parts/widget-aside-recent-blog.php'); ?>

	    			</div>

    			</div>

    		</div>

    	</div>

    </section>

</div>