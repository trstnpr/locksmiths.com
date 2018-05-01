<div class="page-content">

	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/banner-bg-12.jpeg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1>
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

							<?php
								if($page->featured_image != NULL) {
									$blog_thumb = ($page->featured_image != NULL) ? base_url($page->featured_image) : base_url('build/images/thumb.jpg');
							?>
								<div class="content-thumb">
									<img src="" class="img-responsive" alt="<?php echo $page->title; ?>" title="<?php echo $page->title; ?>" /> 
								</div>
								<br/>
							<?php } ?>
		    				
							<?php echo $page->content; ?>

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