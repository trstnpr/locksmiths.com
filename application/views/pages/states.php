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
    			<?php if($states) { ?>
					<div class="section-content">
						<div class="states-wrap">
		    				<div class="row">
		    					<?php foreach($states as $state) { ?>
		    					<div class="col-md-4 col-sm-6 state-item">
		    						<a href="<?php echo base_url('state/'.strtolower($state->abbrev)); ?>">
		    							<div class="list-state">
		    								<img src="<?php echo base_url('build/images/states/'.$state->abbrev.'.jpg'); ?>" class="img-responsive" alt="<?php echo $state->state; ?>" title="<?php echo $state->state; ?>" />
		    								<span><?php echo $state->state; ?></span>
		    							</div>
									</a>
		    					</div>
		    					<?php } ?>
		    				</div>
		    			</div>
					</div>
				<?php
					if (strlen($pagination)) {
                        echo $pagination;
                    }
				} else {
				?>
					<h2 class="text-muted text-center">No States Available</h2>
				<?php } ?>
				</div>

				<div class="col-md-4">
					<div class="aside">
						
						<?php include('parts/form-search-aside.php'); ?>
						<hr/>
						<?php include('parts/widget-aside-recent-blog.php'); ?>

					</div>

				</div>

			</div>

    	</div>

    </section>

</div>