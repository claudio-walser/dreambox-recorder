
<ul class="channel-nav">
	<li><a class ="<?php echo $request->getParam('type') == 'bouquet' ? 'active' : ''; ?>" href="?type=bouquet">Bouquets</a></li>
	<li><a class ="<?php echo $request->getParam('type') == 'all' ? 'active' : ''; ?>"  href="?type=all">Alle</a></li>
</ul>
<div class="clear"></div>
