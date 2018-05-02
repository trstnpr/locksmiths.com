<div class="widget-map">
	<div class="widget-header">
		<h3>State of <?php echo $state->state; ?></h3>
	</div>
    <div class="map-wrap">
		<iframe frameborder="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo $state->state.', '.$state->abbrev; ?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=7&amp;output=embed" ></iframe>
	</div>
</div>