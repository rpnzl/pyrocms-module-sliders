<ol>
	<?php echo form_hidden('api_version', $options['api_version']); ?>
	<?php echo form_hidden('format', $options['format']); ?>

	<fieldset>
		<legend>General Settings</legend>
		<li class="odd">
			<label for="app_id">App ID</label>
			<br>
			<?php echo form_input('app_id', $options['app_id']); ?>
		</li>
		<li class="even">
			<label for="limit">Limit</label>
			<br>
			<?php echo form_input('limit', $options['limit']); ?>
		</li>
		<li class="odd">
			<label for="callback">JSONP Callback</label>
			<br>
			<?php echo form_input('callback', $options['callback']); ?>
		</li>
		<li class="even">
			<label for="location">Location</label>
			<br>
			<?php echo form_input('location', $options['location']); ?>
		</li>
	</fieldset>

	<fieldset>
		<legend>Artist Info</legend>
		<li class="odd">
			<label for="mbid">Music Brainz ID</label>
			<br>
			<?php echo form_input('mbid', $options['mbid']); ?>
		</li>
		<p><strong>OR</strong></p>
		<li class="even">
			<label for="artist">Artist Name</label>
			<br>
			<?php echo form_input('artist', $options['artist']); ?>
		</li>
		<li class="odd">
			<label for="fbid">Artist FB Page ID</label>
			<br>
			<?php echo form_input('fbid', $options['fbid']); ?>
		</li>
	</fieldset>

	<fieldset>
		<legend>Display</legend>
		<li class="even">
			<label for="display[datetime]">Date</label>
			<?php echo form_checkbox(
				'display[datetime]',
				true,
				isset($options['display']['datetime']) ? true : false
			); ?>
		</li>
		<li class="odd">
			<label for="display[on_sale_datetime]">On Sale Date</label>
			<?php echo form_checkbox(
				'display[on_sale_datetime]',
				true,
				isset($options['display']['on_sale_datetime']) ? true : false
			); ?>
		</li>
		<li class="even">
			<label for="display[formatted_location]">Formatted Location</label>
			<?php echo form_checkbox(
				'display[formatted_location]',
				true,
				isset($options['display']['formatted_location']) ? true : false
			); ?>
		</li>
		<li class="odd">
			<label for="display[venue_name]">Venue Name</label>
			<?php echo form_checkbox(
				'display[venue_name]',
				true,
				isset($options['display']['venue_name']) ? true : false
			); ?>
		</li>
		<li class="even">
			<label for="display[links][tickets]">Ticket Link</label>
			<?php echo form_checkbox(
				'display[links][tickets]',
				true,
				isset($options['display']['links']['tickets']) ? true : false
			); ?>
		</li>
		<li class="odd">
			<label for="display[links][google_maps]">Google Maps Link</label>
			<?php echo form_checkbox(
				'display[links][google_maps]',
				true,
				isset($options['display']['links']['google_maps']) ? true : false
			); ?>
		</li>
		<li class="even">
			<label for="display[links][fb_event]">Facebook Event Link</label>
			<?php echo form_checkbox(
				'display[links][fb_event]',
				true,
				isset($options['display']['links']['fb_event']) ? true : false
			); ?>
		</li>
	</fieldset>
</ol>