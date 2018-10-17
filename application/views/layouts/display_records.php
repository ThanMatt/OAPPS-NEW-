<?php if (is_array($records) || is_object($records)): ?>

<?php

$counter = 0;

foreach ($records as $record) {
  
  $counter++;
  echo '<div class="table-tae proposal-list-item" id="view_btn/' . $record->Proposal_ID . '">' . $record->ActivityName . '</div>';

}
?>

<?php else: ?>
  <h1 id="nav-left-container-no-records" class="proposal-list-empty">No Records</h1>
<?php endif?>