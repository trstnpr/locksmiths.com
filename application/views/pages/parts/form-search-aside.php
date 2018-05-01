<form class="search-directory" method="GET" action="<?php echo base_url('search'); ?>" data-validate="<?php echo base_url('search/validate?location='); ?>">
	<div class="input-group">
		<input type="text" class="form-control keyword" name="location" placeholder="Type your City or Zipcode ..." onKeyUp="strip_char()" id="keyword" data-suggest="<?php echo base_url('search/suggest'); ?>" required />
		<span class="input-group-btn">
			<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
		</span>
    </div>
</form>