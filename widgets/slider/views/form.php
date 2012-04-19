<ol>
	<?php echo form_hidden('api_version', $options['api_version']); ?>
	<?php echo form_hidden('format', $options['format']); ?>

	<fieldset>
		<legend>General Settings</legend>
		<li class="odd">
			<label for="slider_id">Choose Slider</label>
			<br>
			<?php echo form_dropdown('slider_id', $sliders, $options['slider_id']); ?>
		</li>
	</fieldset>
</ol>