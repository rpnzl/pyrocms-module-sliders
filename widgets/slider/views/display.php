<div class="slider-wrapper theme-default">
	<div id="slider_<?php echo $slider->id; ?>" class="nivoSlider">
		<?php foreach($images as $image): ?>
		<img src="<?php echo $image->path; ?>" alt="" />
		<?php endforeach; ?>
	</div>
	<div id="htmlcaption" class="nivo-html-caption">
		<strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
	</div>
</div>
<script type="text/javascript">
	$('#slider_<?php echo $slider->id; ?>').nivoSlider();
</script>