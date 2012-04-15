<div class="one_half">
	<section class="title">
		<h4><?php echo lang('sliders.list_title'); ?></h4>
	</section>
	
	<section class="item">
		<div id="page-list">
		<ul class="sortable">
			<?php foreach($sliders as $slider): ?>
			<li><?php echo $slider->title; ?></li>
			<?php endforeach; ?>
		</ul>
		</div>
	</section>
</div>

<div class="one_half last scroll-follow">	
	<section class="title">
		<h4><?php echo lang('sliders.tree_explanation_title'); ?></h4>
	</section>
	
	<section class="item">
		<div id="page-details">
		<p>
			<?php echo lang('sliders.tree_explanation'); ?>
		</p>
		</div>
	</section>
</div>