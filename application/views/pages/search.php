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