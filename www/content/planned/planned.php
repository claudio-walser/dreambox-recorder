<h1>Zur Aufnahme vorbereitet</h1>

<?php

$waiting = $application->run(
	'\\DreamboxRecorder\\Controller\\Recording', 
	'get', 
	array(
		'state' => 'waiting'
	)
);

if (!empty($waiting['data']) && is_array($waiting['data'])) {
	foreach ($waiting['data'] as $broadcastDto) {
		include('content/shared/displayBroadcastDto.php');
	}
} else {
	include('content/shared/empty.php');
}

?>