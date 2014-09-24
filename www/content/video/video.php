<h1>Aufgenommene Videos</h1>
<?php

$recorded = $application->run(
	'\\DreamboxRecorder\\Controller\\Recording', 
	'get', 
	array(
		'state' => 'recorded'
	)
);

if (!empty($recorded['data']) && is_array($recorded['data'])) {
	foreach ($recorded['data'] as $broadcastDto) {
		include('content/shared/displayBroadcastDto.php');
	}
} else {
	include('content/shared/empty.php');
}
?>