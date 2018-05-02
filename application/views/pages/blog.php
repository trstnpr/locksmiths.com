<div class="blogs-content">
	<section class="section-header data-img" data-bg="<?php echo base_url('build/images/banner-bg-11.jpeg'); ?>">
		<div class="overlay">
			<div class="container">
				<h1>
					Blog
				</h1>
			</div>
		</div>
	</section>

    <section class="section-blog">

    	<div class="container">

    		<div class="row">

    			<div class="col-md-8">

		    		<div class="section-content">

						<div class="blog-wrap">

						<?php
						if($blogs->result()) {
							foreach($blogs->result() as $blog) {
								$blog_thumb = ($blog->featured_image != NULL) ? base_url($blog->featured_image) : base_url('build/images/thumb.jpg');
						?>

							<div class="blog-item">
								<?php if($blog->featured_image != NULL) { ?>
								<div class="blog-thumb">
									<img src="<?php echo $blog_thumb; ?>" class="img-responsive" alt="<?php echo $blog->title; ?>" title="<?php echo $blog->title; ?>" />
								</div>
								<?php } ?>

								<div class="blog-body">

									<span class="blog-meta">Posted on <?php echo date_proper($blog->created_at).' by '.$blog->author; ?></span>

									<h2 class="blog-title"><?php echo $blog->title; ?></h2>

									<div class="blog-excerpt">
										
										<p><?php echo $blog->excerpt; ?></p>

									</div>

									<br/>

									<a href="<?php echo base_url($blog->slug); ?>" class="btn btn-danger btn-readmore">Read more</a>

								</div>

							</div>

						<?php
							}

		                    if (strlen($pagination)) {
		                        echo $pagination;
		                    }
						} else { ?>

		                
		                <h2 class="text-muted text-center">No Blog Posts Available</h2>

		                <?php } ?>

							
						</div>


					</div>

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