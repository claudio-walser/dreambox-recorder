<?php
$dto = $broadcastDto;
?>
<div >
<?php echo date('H:i:s', $dto->getTimeStart()); ?>  - <?php echo date('H:i:s', $dto->getTimeEnd()); ?>
<br />
<strong class="title"><?php echo $dto->getTitle(); ?></strong> - <?php echo $dto->getChannel(); ?>
<br />
</div>
<hr />