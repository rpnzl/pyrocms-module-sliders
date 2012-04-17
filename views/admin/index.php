<div class="one_half">
	<section class="title">
		<h4><?php echo lang('sliders.list_title'); ?></h4>
	</section>
	
	<section class="item">
		<div id="page-list">
		<ul class="sortable">
			<?php foreach($sliders as $slider): ?>
			<li>
				<?php echo $slider->title; ?>
				<?php echo anchor('admin/sliders/preview/' . $slider->id, lang('global:preview'), 'rel="modal-large" class="iframe btn green" target="_blank"'); ?>
				<?php echo anchor('admin/sliders/edit/' . $slider->id, lang('global:edit'), 'class="btn orange edit"'); ?>
				<?php echo anchor('admin/sliders/delete/' . $slider->id, lang('global:delete'), array('class'=>'confirm btn red delete')); ?>
			</li>
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