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
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key; ?>">
						<?php echo  $channel->getName(); ?>
					</a>
				</h4>
			</div>
			<div id="collapse<?php echo $key; ?>" class="panel-collapse collapse">
				<div class="panel-body">
					EPG Data with checkbox for recording
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>
