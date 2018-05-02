<div class="widget-map">
	<div class="widget-header">
		<h3><i class="fa fa-map-pin hidden-xs"></i> <?php echo $city_data->name.', '.$state->state; ?></h3>
	</div>
    <div class="map-wrap">
	<?php
		if(empty($map_data)) {
	?>
		<iframe frameborder="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $location; ?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=6&amp;output=embed" ></iframe>
	<?php } else { ?>
		<div id="map-overlay"></div>
	<?php } ?>
	</div>
</div>