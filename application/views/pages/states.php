<div class="states-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/banner-bg-12.jpeg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1>States</h1>
			</div>
		</div>
	</section>

    <section class="section-states">

    	<div class="container">

    		<div class="row">

    			<div class="col-md-8">

					<div class="section-content">

						<div class="states-wrap">
		    		
		    				<div class="row">
		    					<?php

			    					foreach($states as $state) {

			    				?>
		    					<div class="col-md-4 col-sm-6 state-item">
		    						
									<a href="<?php echo base_url('state/'.strtolower($state->abbrev)); ?>" class="list-state">
										<i class="fa fa-location-arrow"></i> <?php echo $state->state; ?>
									</a>
		    							
		    					</div>
		    					<?php } ?>

		    				</div>
		    				
		    			</div>

					</div>

				</div>

				<div class="col-md-4">

					<div class="aside">
						
						<div class="inner-searchform">
							
							<div class="widget-header">
								<h3>Search</h3>
							</div>

							<div class="widget-body">
								
								<?php include('parts/form-search-aside.php'); ?>

							</div>

						</div>

						<hr/>

						<?php include('parts/widget-aside-recent-blog.php'); ?>

					</div>

				</div>

			</div>

    	</div>

    </section>

</div>