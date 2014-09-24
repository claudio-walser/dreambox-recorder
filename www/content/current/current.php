<h1>Aktuelle Aufnahme</h1>

<?php

$recording = $application->run(
	'\\DreamboxRecorder\\Controller\\Recording', 
	'get', 
	array(
		'state' => 'recording'
	)
);

if (!empty($recording['data']) && is_array($recording['data'])) {
	foreach ($recording['data'] as $broadcastDto) {
		include('content/shared/displayBroadcastDto.php');
	}
} else {
	include('content/shared/empty.php');
}
?>