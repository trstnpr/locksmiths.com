<style>

</style>
<div class="home-content">
    <section class="section-banner data-img" data-bg="<?php echo base_url('build/images/banner-bg-10.jpg'); ?>" >
    	<div class="overlay">
	    	<div class="container">
	    		<div class="tagline-wrap">
		    		<h1>Welcome to <?php echo the_config('site_name'); ?>!</h1>
		    		<h2><?php echo the_config('tag_line'); ?></h2>
		    	</div>
		    	<br/><br/>
		    	<div class="row">
		    		<div class="col-md-8 col-md-offset-2">
						<div class="form-wrap">
			    			<form class="search-directory" method="GET" action="<?php echo base_url('search'); ?>" data-validate="<?php echo base_url('search/validate?location='); ?>">
								<div class="row">
									<div class="col-sm-9">
										<div class="form-group">	
											<input type="text" class="form-control input-lg keyword" name="location" placeholder="Type your City or Zip Code ..." onKeyUp="strip_char()" id="keyword" data-suggest="<?php echo base_url('search/suggest'); ?>" required />
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<button type="submit" class="btn btn-red btn-lg btn-search btn-block" type="button" title="Search for Locksmith NOW!"><span class="hidden-xs">Search</span><span class="visible-xs"><span class="fa fa-search"></span></span></button>
										</div>
									</div>
								</div>
							</form>
						</div>
		    		</div>
		    	</div>
	    	</div>
	    </div>
    </section>

    <?php if(key_services() != 0) { ?>
	<section class="section-offers">
		<div class="container">
			<div class="section-title">
				<h2>What We Offer</h2>
		    </div>
		    <div class="offer-wrap">
		    	<div class="slick-responsive slider-container">
					<?php
					$x = 0;
					foreach(key_services() as $key) {
					$data_thumb = base_url('build/images/random/'.$x++.'.jpg');
					?>
		    		<div class="item">
		    			<div class="item-block data-img" data-bg="<?php echo $data_thumb; ?>">
		    				<div class="overlay">
		    					<div class="content">
		    						<h3><?php echo $key->title; ?></h3>
		    						<br/>
		    						<p><?php echo truncate($key->excerpt,50); ?></p>
		    						<br/>
		    						<a href="<?php echo base_url($key->slug); ?>" class="btn btn-cta">Read More</a>
		    					</div>	
		    				</div>
		    			</div>
		    		</div>
		    		<?php } ?>
				</div>
		    </div>
		</div>
	</section>
	<?php } ?>

	<section class="section-featured">
		<div class="container">
			<h2 class="section-title">Featured Providers</h2>
			<div class="featured-wrap">
				<?php if($api != 0) { ?>
				<div class="row">
				<?php $x = 1;
					foreach($api as $item) {
						$mapAddress = getLocation(address_proper($item['address']));
						$coordinates = $mapAddress->lat.','.$mapAddress->lng;
				?>
					<div class="col-md-3">	
						<div class="feat-item">
							<div class="svc-details">
								<h4 class="svc-name"><?php echo $item['name']; ?></h4>
								<label class="label label-success svc-type">Locksmith</label>
							</div>
							<div class="svc-thumb">
								<figure class="sticker data-img" data-bg="<?php echo base_url('build/images/sticker.png'); ?>"></figure>
								<img src="<?php echo static_map($coordinates, '500x500', 17); ?>" class="img-responsive" alt="<?php echo $item['name']; ?>" title="<?php echo $item['name']; ?>" />
							</div>
							<div class="svc-footer">
								<ul class="fa-ul">
									<li><i class="fa fa-li fa-map-marker"></i> <?php echo address_proper($item['address']); ?></li>
									<li><i class="fa fa-li fa-phone"></i> <?php echo $item['phone']; ?></li>
								</ul>
							</div>
						</div>
					</div>
				<?php if ($x++ >= 4) break;
					} ?>
			</div>
			<?php } else { ?>
					<h4 class="text-center text-muted">No Data Available</h4>
				<?php } ?>
			</div>
		</div>
	</section>

    <?php
    $home_blogs = recent_blog(4);
    if(!empty($home_blogs)) {
    ?>
    <section class="section-blogs">
    	<div class="container">
    		<h2 class="section-title txt-center">Blog</h2>
		    <div class="blog-wrap">
				<div class="row">
					<?php
						foreach($home_blogs as $hblog) {
							$thumb = ($hblog->featured_image != NULL) ? base_url($hblog->featured_image) : base_url('build/images/biz-placeholder.png') ;
					?>
					<div class="col-md-3">
						<div class="blog-item">
							<div class="blog-thumb">
								<img src="<?php echo $thumb; ?>" class="img-responsive" alt="<?php echo $hblog->title; ?>" title="<?php echo $hblog->title; ?>" />
							</div>
							<div class="blog-content">
								<h3 class="blog-title"><?php echo $hblog->title; ?></h3>
								<span class="blog-date">Posted on <?php echo date_proper($hblog->created_at); ?></span>
								<p class="blog-excerpt">
									<?php echo truncate($hblog->excerpt, 120); ?> 
								</p>
								<br/>
								<a href="<?php echo base_url($hblog->slug); ?>" class="btn btn-primary btn-sm">Read more</a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
    	</div>
    </section>
    <?php } ?>

    <section class="section-topcity data-img" id="top_cities" data-bg="<?php echo base_url('build/images/banner-bg-9.jpeg'); ?>">
    	<div class="overlay">
	    	<div class="container">
	    		<h2 class="section-title txt-center">Top Cities</h2>
	    		<?php if(!empty(major_area())) { ?>
	    		<div class="citylist-wrap">
	    			<ul>
	    			<?php foreach(major_area() as $popcity) { ?>
				    	<li><a href="<?php echo base_url('city/'.$popcity->slug); ?>"><i class="fa fa-location-arrow"></i> <?php echo $popcity->name; ?></a></li>
	    			<?php } ?>
				    </ul>
	    		</div>
	    		<?php } ?>
	    	</div>
	    </div>
    </section>
</div>