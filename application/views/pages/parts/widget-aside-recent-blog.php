<?php
	$recent_blogs = recent_blog(5);
	if(!empty($recent_blogs)) {
?>

<div class="widget-recent-blog">
	<div class="widget-header">
		<h3>Recent Posts</h3>
	</div>
	<div class="widget-body">
		<ul>
		<?php foreach($recent_blogs as $rblog) { ?>
			<li><a href="<?php echo base_url($rblog->slug); ?>"><?php echo $rblog->title; ?></a></li>
		<?php
			}
		?>
		</ul>
	</div>
</div>
<?php } ?>