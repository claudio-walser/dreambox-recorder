<?php

include('./bootstrap.php');

$application = new \DreamboxRecorder\Application('json');
echo $application->run();

?>