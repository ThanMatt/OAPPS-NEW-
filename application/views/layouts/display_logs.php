<?php if (is_array($logs) || is_object($logs)): ?>
<?php $counter = 0; ?>
<?php foreach($logs as $log): ?>
  <?php 
  $counter++; 
  $time = $log->DateTime;

  ?>
  <hr class="mr-5">
  <span class="text-monospace"><?=$log->Activity?> <span class="text-muted oapps-text-small"><?=$time?></span> </p>
<?php endforeach ?>

<?php else: ?>
<p class="text-monospace">No Logs</p>
<?php endif ?>


