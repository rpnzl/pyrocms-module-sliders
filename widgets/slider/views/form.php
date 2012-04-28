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
					'sliceDown' => 'Slice Down',
					'sliceDownLeft' => 'Slice Down Left',
					'sliceUp' => 'Slice Up',
					'sliceUpLeft' => 'Slice Up Left',
					'sliceUpDown' => 'Slice Up Down',
					'sliceUpDownLeft' => 'Slice Up Down Left',
					'fold' => 'Fold',
					'fade' => 'Fade',
					'random' => 'Random',
					'slideInRight' => 'Slide In Right',
					'slideInLeft' => 'Slide In Left',
					'boxRandom' => 'Box Random',
					'boxRain' => 'Box Rain',
					'boxRainReverse' => 'Box Rain Reverse',
					'boxRainGrow' => 'Box Rain Grow',
					'boxRainGrowReverse' => 'Box Rain Grow Reverse',
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