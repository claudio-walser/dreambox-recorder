<?php

include('./bootstrap.php');

$application = new \Spaf\Core\Application('json');
echo $application->run();

?>