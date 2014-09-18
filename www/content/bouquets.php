<?php
$bouquets = $application->run('\\DreamboxRecorder\\Controller\\Dreambox', 'getBouquets');
?>

<div class="list-group">

	<?php
	foreach ($bouquets['data'] as $bouquet) {
		$active = $request->getParam('bouquet') == $bouquet->getReference() ? 'active' : '';
		echo '<a class="list-group-item ' . $active . '" href="' . getCurrentLink(array('bouquet' => $bouquet->getReference())) .  '">' . $bouquet->getName() . '</a>';
	}
	?>	

</div>