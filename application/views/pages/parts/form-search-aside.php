<div class="inner-searchform">
	<div class="widget-header">
		<h3>Search</h3>
	</div>
	<div class="widget-body">
		<form class="search-directory" method="GET" action="<?php echo base_url('search'); ?>" data-validate="<?php echo base_url('search/validate?location='); ?>">
			<div class="input-group">
				<input type="text" class="form-control keyword" name="location" placeholder="Type your City or Zipcode ..." onKeyUp="strip_char()" id="keyword" data-suggest="<?php echo base_url('search/suggest'); ?>" required />
				<span class="input-group-btn">
					<button class="btn btn-primary input-group-btn-button" type="submit"><i class="fa fa-search"></i></button>
				</span>
		    </div>
		</form>
	</div>
</div>