<section class="title">
	<?php if ($this->method == 'create'): ?>
		<h4><?php echo lang('sliders.create_title');?></h4>
	<?php else: ?>
		<h4><?php echo sprintf(lang('sliders.edit_title'), $slider->title);?></h4>
	<?php endif; ?>
</section>

<section class="item">

	<?php echo form_open(uri_string(), 'class="crud"'); ?>

	<div class="tabs">
		<ul class="tab-menu">
			<li><a href="#slider-content"><span><?php echo lang('sliders.content_label');?></span></a></li>
		</ul>
		
		<!-- Content tab -->
		<div id="slider-content">
			<fieldset>
				<ul>
					<li class="<?php echo alternator('even', ''); ?>">
						<label for="title"><?php echo lang('sliders.title_label');?> <span>*</span></label>
						<div class="input"><?php echo form_input('title', $slider->title, 'id="title" maxlength="60"'); ?></div>
					</li>

					<li class="<?php echo alternator('even', ''); ?>">
						<label for="folder_id">Select an existing folder, or create a new one</label>
						<?php echo form_dropdown('folder_id', $folders, $slider->folder_id); ?>
					</li>
				</ul>
			</fieldset>
		</div>
	</div>

	<div class="buttons align-right padding-top">
		<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel') )); ?>
	</div>

	<?php echo form_close(); ?>
</section>