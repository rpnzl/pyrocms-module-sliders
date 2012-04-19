<div class="one_half">
	<section class="title">
		<h4><?php echo lang('sliders.list_title'); ?></h4>
	</section>
	
	<section class="item">
		<table>
			<thead>
				<tr>
					<th><?php echo form_checkbox(array('name' => 'action_to_all', 'class' => 'check-all')); ?></th>
					<th>Slider Title</th>
					<th>Images</th>
					<th></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="4"></td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach($sliders as $slider): ?>
					<tr>
						<td><?php echo form_checkbox('action_to[]', $slider->id); ?></td>
						<td><?php echo $slider->title; ?></td>
						<td class="collapse">TO DO</td>
						<td>
							<?php echo anchor('admin/sliders/edit/' . $slider->id, lang('global:edit'), 'class="btn orange edit"'); ?>
							<?php echo anchor('admin/sliders/delete/' . $slider->id, lang('global:delete'), array('class'=>'confirm btn red delete')); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<div class="table_action_buttons">
			<?php $this->load->view('admin/partials/buttons', array('buttons' => array('delete'))); ?>
		</div>
	</section>
</div>

<div class="one_half last scroll-follow">	
	<section class="title">
		<h4><?php echo lang('sliders.tree_explanation_title'); ?></h4>
	</section>
	
	<section class="item">
		<p>
			<?php echo lang('sliders.tree_explanation'); ?>
		</p>
	</section>
</div>