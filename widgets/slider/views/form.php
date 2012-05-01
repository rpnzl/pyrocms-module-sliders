<ol>
	<?php echo form_hidden('api_version', $options['api_version']); ?>
	<?php echo form_hidden('format', $options['format']); ?>

	<fieldset>
		<legend>General Settings</legend>
		<li class="odd">
			<label for="slider_id">Choose Slider</label>
			<?php echo form_dropdown('slider_id', $select_slider, $options['slider_id']); ?>
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
			<label for="animSpeed">Anim Speed</label>
			<?php echo form_input('animSpeed', $options['animSpeed']); ?>
		</li>

		<li>
			<label for="pauseTime">Pause Time</label>
			<?php echo form_input('pauseTime', $options['pauseTime']); ?>
		</li>

		<li class="odd">
			<label for="directionNav">Direction Nav</label>
			<?php echo form_dropdown('directionNav', array('true' => 'On', 'false' => 'Off',), $options['directionNav']); ?>
		</li>

		<li>
			<label for="directionNavHide">Direction Nav Hide</label>
			<?php echo form_dropdown('directionNavHide', array('true' => 'On', 'false' => 'Off',), $options['directionNav']); ?>
		</li>

		<li class="odd">
			<label for="controlNav">Control Nav</label>
			<?php echo form_dropdown('controlNav', array('true' => 'On', 'false' => 'Off',), $options['controlNav']); ?>
		</li>

		<li>
			<label for="keyboardNav">Keyboard Nav</label>
			<?php echo form_dropdown('keyboardNav', array('true' => 'On', 'false' => 'Off',), $options['directionNav']); ?>
		</li>

		<li class="odd">
			<label for="pauseOnHover">Pause On Hover</label>
			<?php echo form_dropdown('pauseOnHover', array('true' => 'On', 'false' => 'Off',), $options['pauseOnHover']); ?>
		</li>

		<li>
			<label for="manualAdvance">Manual Advance</label>
			<?php echo form_dropdown('manualAdvance', array('true' => 'On', 'false' => 'Off',), $options['manualAdvance']); ?>
		</li>
	</fieldset>


	<fieldset>
		<legend>Effect Settings</legend>
		<li class="odd">
			<label for="slices">Slices</label>
			<?php echo form_input('slices', $options['slices']); ?>
		</li>

		<li>
			<label for="boxCols">Box Columns</label>
			<?php echo form_input('boxCols', $options['boxCols']); ?>
		</li>

		<li class="odd">
			<label for="boxRows">Box Rows</label>
			<?php echo form_input('boxRows', $options['boxRows']); ?>
		</li>
	</fieldset>
</ol>