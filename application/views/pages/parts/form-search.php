<form class="search-directory" method="GET" action="<?php echo base_url('search'); ?>" data-validate="<?php echo base_url('search/validate?location='); ?>">

	<div class="row">

		<div class="col-md-9 col-sm-9">

			<div class="form-group">

				<input type="text" class="form-control input-lg keyword" name="location" placeholder="Type your City or Zip Code ..." onKeyUp="strip_char()" id="keyword" data-suggest="<?php echo base_url('search/suggest'); ?>" required />

			</div>

		</div>

		<div class="col-md-3 col-sm-3">

			<div class="form-group">
				<button class="btn btn-lg btn-block btn-search" type="submit">Search</button>
			</div>

		</div>

	</div>

</form>