<ol>
	<?php echo form_hidden('api_version', $options['api_version']); ?>
	<?php echo form_hidden('format', $options['format']); ?>

	<fieldset>
		<legend>General Settings</legend>
		<li class="odd">
			<label for="slider_id">Choose Slider</label>
			<?php echo form_dropdown('slider_id', $sliders, $options['slider_id']); ?>
		</li>
		<li>
			<label for="effect">Slider Effect</label>
			<?php echo form_dropdown(
				'effect',
				array(
					'fade' => 'Fade',
					'random' => 'Random',
				),
				$options['effect']
			); ?>
		</li>
		<li class="odd">
			<label for="slices">Slices</label>
			<?php echo form_input('slices', $options['slices']); ?>
		</li>
	</fieldset>
</ol>