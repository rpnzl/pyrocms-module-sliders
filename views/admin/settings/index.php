<div class="one_half">
	<section class="title">
		<h4><?php echo lang('sliders.setup_title'); ?></h4>
	</section>

	<section class="item">
		<?php echo form_open(uri_string(), 'class="crud"'); ?>
			<?php echo form_hidden('id', $settings->id); ?>
			<fieldset>
				<ul>
					<li class="<?php echo alternator('even', ''); ?>">
						<label for="jquery"><?php echo lang('sliders.jquery_label');?></label>
						<div class="input">
							<?php if($settings->jquery == 1): ?>
								<?php echo form_radio('jquery', 1, true); ?>&nbsp;Yes
							<?php else: ?>
								<?php echo form_radio('jquery', 1, false); ?>&nbsp;Yes
							<?php endif; ?>
						</div>
						<div class="input">
							<?php if($settings->jquery == 0): ?>
								<?php echo form_radio('jquery', 0, true); ?>&nbsp;No
							<?php else: ?>
								<?php echo form_radio('jquery', 0, false); ?>&nbsp;No
							<?php endif; ?>
						</div>
					</li>
				</ul>
			</fieldset>

			<div class="buttons align-right padding-top">
				<?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel') )); ?>
			</div>

		<?php echo form_close(); ?>
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