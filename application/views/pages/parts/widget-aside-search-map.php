<div class="widget-map">
	<div class="widget-header hide">
		<h3>Locations</h3>
	</div>
	<div class="map-wrap">
    <?php if($search_data != NULL) { ?>
		<div id="search-map-overlay"></div>
	<?php } else { ?>
		<iframe frameborder="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo 'USA'; ?>&amp;aq=&amp;sspn=0.111915,0.295601&amp;ie=UTF8&amp;hq=&amp;&amp;t=m&amp;z=3&amp;output=embed" ></iframe>
	<?php } ?>
	</div>
</div>