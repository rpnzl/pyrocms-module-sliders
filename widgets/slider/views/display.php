<table>
	<thead>
		<tr>
			<?php echo isset($options['display']['datetime']) ? '<th>Date</th>' : null; ?>
			<?php echo isset($options['display']['on_sale_datetime']) ? '<th>On Sale Date</th>' : null; ?>
			<?php echo isset($options['display']['formatted_location']) ? '<th>Where</th>' : null; ?>
			<?php echo isset($options['display']['venue_name']) ? '<th>Venue</th>' : null; ?>
			<?php if(in_array(true, $options['display']['links'])): ?>
				<th>Links</th>
			<?php endif; ?>
		</tr>
	</thead>

	<tfoot>
		<tr>
			<?php $remaining = count($results) - $options['limit']; ?>
			<?php if($remaining > 0): ?>
				<td colspan="<?php echo $colspan; ?>">
					<?php echo $options['limit']; ?> events displayed. <?php echo $remaining; ?> undisplayed events.
				</td>
			<?php endif; ?>
		</tr>
	</tfoot>

	<?php if( ! $options['artist'] && ! $options['mbid']): ?>
		<tr>
			<td colspan="<?php echo $colspan; ?>">Please enter an artist's name or Music Brainz ID.</td>
		</tr>
	<?php elseif( ! $options['app_id']): ?>
		<tr>
			<td colspan="<?php echo $colspan; ?>">Please choose a custom app ID.</td>
		</tr>
	<?php elseif(count($results) <= 0): ?>
		<tr>
			<td colspan="<?php echo $colspan; ?>">There are no events to display.</td>
		</tr>
	<?php else: ?>
		<?php $i = 0; ?>
		<?php foreach($results as $event): ?>
			<?php if($i < $options['limit']): ?>
			<tr>
				<?php if(isset($options['display']['datetime'])): ?>
					<td><?php echo date('m/d', strtotime($event->datetime)) ?></td>
				<?php endif; ?>

				<?php if(isset($options['display']['on_sale_datetime'])): ?>
					<td><?php echo date('m/d', strtotime($event->on_sale_datetime)) ?></td>
				<?php endif; ?>

				<?php if(isset($options['display']['formatted_location'])): ?>
					<td><?php echo $event->formatted_location; ?></td>
				<?php endif; ?>

				<?php if(isset($options['display']['venue_name'])): ?>
					<td><?php echo $event->venue->name; ?></td>
				<?php endif; ?>

				<?php if(in_array(true, $options['display']['links'])): ?>
					<td>
					<?php if(isset($options['display']['links']['tickets'])): ?>
						<?php if($event->ticket_status === 'available'): ?>
							<a href="<?php echo $event->ticket_url; ?>" target="_blank">
								Get Tickets
							</a>
						<?php else: ?>
							<span>Sold Out</span>
						<?php endif; ?>
					<?php endif; ?>

					<?php if(isset($options['display']['links']['google_maps'])): ?>
						<a href="#" target="_blank">
							Get Directions
						</a>
					<?php endif; ?>

					<?php if(isset($options['display']['links']['fb_event'])): ?>
						<a href="#" target="_blank">
							Facebook
						</a>
					<?php endif; ?>
					</td>
				<?php endif; ?>

				<?php $i++; ?>
			</tr>
			<?php endif; ?>
		<?php endforeach; ?>
	<?php endif; ?>
</table>