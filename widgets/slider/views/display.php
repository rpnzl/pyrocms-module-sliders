<div class="slider-wrapper">
	<div id="slider_<?php echo $slider->id; ?>" class="nivoSlider">
		<?php foreach($images as $image): ?>
		<img src="<?php echo $image->path; ?>" alt="Cool." />
		<?php endforeach; ?>
	</div>
</div>
<script type="text/javascript">
	$('#slider_<?php echo $slider->id; ?>').nivoSlider();
</script>