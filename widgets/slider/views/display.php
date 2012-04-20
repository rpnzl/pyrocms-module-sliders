<div class="slider-wrapper theme-default">
	<div id="slider_<?php echo $slider->id; ?>" class="nivoSlider">
		<?php foreach($images as $image): ?>
		<img src="<?php echo $image->path; ?>" alt="Cool." />
		<?php endforeach; ?>
	</div>
</div>
<script type="text/javascript">
	// Set these as widget options
	// also set image height and width as widget settings
	// also set theme choice as a setting?

	$('#slider_<?php echo $slider->id; ?>').nivoSlider({
		effect: 'fade',
		slices: 15,
		boxCols: 8,
		boxRows: 4,
		animSpeed: 500,
		pauseTime: 3000,
		startSlide: 0,
		directionNav: true, // L & R arrows
		directionNavHide: true, // Only show on hover
		controlNav: true,
		controlNavThumbs: false,
		controlNavThumbsFromRel: false,
		controlNavThumbsSearch: '.jpg',
		controlNavThumbsReplace: '_thumb.jpg',
		keyboardNav: true,
		pauseOnHover: true,
		manualAdvance: false,
		// callbacks
	});
</script>