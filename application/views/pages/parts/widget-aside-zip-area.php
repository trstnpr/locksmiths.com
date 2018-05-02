<div class="zip-area-widget" id="zipcode-widget">
	<div class="widget-header">
		<h3><?php echo $city_data->name.', '.strtoupper($city_data->state); ?> Areas</h3>
	</div>
	<div class="widget-body">
		<?php
			$zipcode = preg_split('/,([\s])+/', $city_data->zip_code);
			foreach($zipcode as $zips) {
				$zip_code = trim('<a class="badge" href="'.base_url('zip/'.$zips).'" >'.$zips.'</a>', '/,([\s])+/');
				echo $zip_code;
			}
		?>
	</div>
</div>