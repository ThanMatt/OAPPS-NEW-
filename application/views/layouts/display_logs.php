<?php if (is_array($logs) || is_object($logs)): ?>
<?php $counter = 0;?>
<?php foreach($logs as $log): ?>
  <?php $counter++ ?>
  <hr class="mr-5">
  <p class="text-monospace">Log <?=$counter?>: <?=$log->Activity?></p>
<?php endforeach ?>

<?php else: ?>
<p class="text-monospace">No Logs</p>
<?php endif ?>


