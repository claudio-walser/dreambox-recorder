<h1>Aufgenommene Videos</h1>
<?php

$recorded = $application->run(
	'\\DreamboxRecorder\\Controller\\Recording', 
	'get', 
	array(
		'state' => 'recorded'
	)
);
$videoId = $request->getParam('video', '');
if (!empty($videoId)) {
	if (!empty($recorded['data']) && is_array($recorded['data'])) {
		foreach ($recorded['data'] as $broadcastDto) {
			if ($broadcastDto->getId() == $videoId) {
				include('content/shared/video.php');
				echo '<a href="' . getCurrentLink(array('video' => '')) . '"></a>';
			}
		}
	} 
} else {

	if (!empty($recorded['data']) && is_array($recorded['data'])) {
		foreach ($recorded['data'] as $broadcastDto) {
			echo '<a href="' . getCurrentLink(array('video' => $broadcastDto->getId())) . '">Player öffnen</a>';
			include('content/shared/displayBroadcastDto.php');

		}
	} else {
		include('content/shared/empty.php');
	}
}
?>