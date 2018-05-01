<div class="page-content">
	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/banner-bg-12.jpeg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1 class="">
					<?php echo $page->title; ?>
				</h1>
			</div>
		</div>
	</section>

    <section class="section-page">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8">
		    		<div class="section-content">
			    		<div class="content-wrap">
							<?php echo $page->content; ?>
							<br/>
							<div class="form-wrap">
								<form class="submit-biz" method="post" action="<?php echo base_url('business/post/process'); ?>" enctype="multipart/form-data">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="exampleInputFile">Business Photo</label>
												<input type="file" class="biz_photo" name="photo" accept=".jpg, .jpeg, .png" onchange="readURL(this);" required />
												<p class="help-block">Format .jpg .jpeg and .png only.</p>
												<button type="button" class="btn btn-xs btn-warning remove-preview" style="display:none;">Remove</button>
												<img class="img-responsive preview" src="" />
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Business *</label>
												<input type="text" class="form-control input-lg biz_name" name="name" placeholder="Business Name" required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>City *</label>
												<input type="text" class="form-control input-lg biz_city" name="city" placeholder="City" required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>State *</label>
												<input type="text" class="form-control input-lg biz_state" name="state" placeholder="State Abbreviation" maxlength="2" required/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Zip Code *</label>
												<input type="text" class="form-control input-lg biz_zip" name="zip" placeholder="Zip Code" maxlength="5" required/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email *</label>
												<input type="email" class="form-control input-lg biz_email" name="email" placeholder="Email Address" required/>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Contact *</label>
												<input type="text" class="form-control input-lg biz_contact" name="contact" placeholder="Contact Number" required/>
											</div>
										</div>
									</div>
									<div class="g-recaptcha" data-sitekey="<?php echo the_config('gr_site_key') ?>"></div>
									<br/>
									<button type="submit" class="btn btn-danger submit-biz-btn">Submit <i class="fa fa-paper-plane"></i></button>
								</form>
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