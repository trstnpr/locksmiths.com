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
		    			<?php
							if($page->featured_image != NULL) {
								$content_thumb = ($page->featured_image != NULL) ? base_url($page->featured_image) : base_url('build/images/thumb.jpg');
						?>
							<div class="content-thumb">
								<img src="<?php echo $content_thumb; ?>" class="img-responsive" alt="<?php echo $page->title; ?>" title="<?php echo $page->title; ?>" /> 
							</div>
						<?php } ?>
						<div class="content-wrap">
							<h4 class="post-title"><?php echo $page->title; ?></h4>
							<p class="post-meta">Posted on <?php echo date_proper($page->created_at).' by '.$page->author; ?></p>
							<?php echo $page->content; ?>
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