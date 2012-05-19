<ol>
	<fieldset>
		<legend>General Settings</legend>
		<li class="<?php echo alternator('even', ''); ?>">
			<label for="slider_id">Choose Slider</label>
			<?php echo form_dropdown('slider_id', $select_slider, $options['slider_id']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="theme">Theme</label>
			<?php echo form_dropdown('theme', array('none' => 'None', 'default' => 'NivoDefault', 'orman' => 'Orman', 'pascal' => 'Pascal',), $options['theme']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="captions">Captions</label>
			<?php echo form_dropdown('captions', array('true' => 'On', 'false' => 'Off',), $options['captions']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
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

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="animSpeed">Anim Speed</label>
			<?php echo form_input('animSpeed', $options['animSpeed']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="pauseTime">Pause Time</label>
			<?php echo form_input('pauseTime', $options['pauseTime']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="directionNav">Direction Nav</label>
			<?php echo form_dropdown('directionNav', array('true' => 'On', 'false' => 'Off',), $options['directionNav']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="directionNavHide">Direction Nav Hide</label>
			<?php echo form_dropdown('directionNavHide', array('true' => 'On', 'false' => 'Off',), $options['directionNavHide']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="controlNav">Control Nav</label>
			<?php echo form_dropdown('controlNav', array('true' => 'On', 'false' => 'Off',), $options['controlNav']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="controlNavThumbs">Control Nav Thumbs</label>
			<?php echo form_dropdown('controlNavThumbs', array('true' => 'On', 'false' => 'Off',), $options['controlNavThumbs']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="keyboardNav">Keyboard Nav</label>
			<?php echo form_dropdown('keyboardNav', array('true' => 'On', 'false' => 'Off',), $options['keyboardNav']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="pauseOnHover">Pause On Hover</label>
			<?php echo form_dropdown('pauseOnHover', array('true' => 'On', 'false' => 'Off',), $options['pauseOnHover']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="manualAdvance">Manual Advance</label>
			<?php echo form_dropdown('manualAdvance', array('true' => 'On', 'false' => 'Off',), $options['manualAdvance']); ?>
		</li>
	</fieldset>


	<fieldset>
		<legend>Effect Settings</legend>
		<li class="<?php echo alternator('even', ''); ?>">
			<label for="slices">Slices</label>
			<?php echo form_input('slices', $options['slices']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="boxCols">Box Columns</label>
			<?php echo form_input('boxCols', $options['boxCols']); ?>
		</li>

		<li class="<?php echo alternator('even', ''); ?>">
			<label for="boxRows">Box Rows</label>
			<?php echo form_input('boxRows', $options['boxRows']); ?>
		</li>
	</fieldset>
</ol>