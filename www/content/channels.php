<?php
$bouquet = $request->getParam('bouquet', 'all');

$channels = $application->run('\\DreamboxRecorder\\Controller\\Dreambox', 'getChannels', array('bouquet' => $bouquet));

?>

<div class="panel-group" id="accordion">
	<?php
	foreach ($channels['data'] as $key => $channel) {
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" data-service-reference="<?php echo $channel->getReference(); ?>" data-target="#collapse<?php echo $key; ?>">
						<?php echo  $channel->getName(); ?>
					</a>
				</h4>
			</div>
			<div id="collapse<?php echo $key; ?>" class="panel-collapse collapse">
				<div class="panel-body">
					loading...
					<?php
						// do with ajax by collapsing a channel, this is too slow
						/*$broadcasts = $application->run(
							'\\DreamboxRecorder\\Controller\\Dreambox', 'getBroadcasts',
							array('service' => $channel->getReference())
						);
						$date = 'not set';
						foreach ($broadcasts['data'] as $broadcast) {
							$newDate = date('d.m.Y', $broadcast->getTimeStart());
							if ($newDate !== $date) {
								$date = $newDate;
								echo '<h1>' . $date . '</h1>';
							}


							echo '<div>';
							echo date('H:i:s', $broadcast->getTimeStart());
							echo ' - ';
							echo date('H:i:s', $broadcast->getTimeEnd());
							echo '<br />';
							echo '<input type="checkbox" name="broadcast[]" value="' . $broadcast->getId() . '" />';
							echo '&nbsp;<strong>' . $broadcast->getTitle() . '</strong>';
							echo '</div>';
							echo '<hr />';
						}
						//print_r($broadcasts);
						//echo  urlencode($channel->getReference()); */
					?>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>
