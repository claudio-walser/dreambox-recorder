
<ul class="channel-nav">
	<li><a class ="<?php echo $request->getParam('header') == 'record' ? 'active' : ''; ?>" href="?header=record">Aufnehmen</a></li>
	<li><a class ="<?php echo $request->getParam('header') == 'video' ? 'active' : ''; ?>"  href="?header=video">Videothek</a></li>
</ul>
<div class="clear"></div>
