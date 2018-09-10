<!DOCTYPE html>
<html lang="en">
<head>

  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $account_id = $this->session->userdata('prefix'); 
  $organization = $this->session->userdata('organization');
  $full_name = $this->session->userdata('full_name');
  $position = $this->session->userdata('position');
  ?>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $account_id . " - Index" ?></title>

  <link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">

  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
  </script>
  <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?= base_url();?>assets/js/core.js"></script>

</head>
<body>
  <div class="header-container">
    <header>
      <div class="header-margin">
        <div class="left-header-text">
          <h2 class="heady">
            <label><?=$organization?></label>
            <label>Logged in as <?=$full_name?></label>
            <label> <?=strtoupper($position)?></label>
          </h2>
          <div class="dropdown">
            <div class="img">
              <img src="<?=base_url()?>assets/img/logo/<?=$account_id?>_logo.png">
            </div>
            <div id="myDropdown" class="dropdown-content">
              <a href="#">Link 1</a>
              <a href="#">Link 2</a>
              <a href="<?=base_url()?>accounts/logout">
                <input type="button" id="nav-button-left" class="nav-button" value="Log Out">
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>
  <div class="nav-right-container-index">
    <div class="nav-right-container-margin-index">
    <!-- N/A means Not An org -->
    <?php if ($this->session->userdata('org_type') == 'N/A'): ?>
      
      <input type="button" id="btn_pending" class="nav-button" value="Pending">
      <input type="button" id="btn_approved" class="nav-button" value="Approved">
      <input type="button" id="btn_revisions" class="nav-button" value="Revisions">
  
    <?php else: ?>

      <input type="button" id="btn_pending" class="nav-button" value="Pending">
      <input type="button" id="btn_approved" class="nav-button" value="Approved">
      <input type="button" id="btn_revisions" class="nav-button" value="Revisions">
      <input type="button" id="btn_new" class="nav-button" value="Submit">
      <input type="button" id="btn_drafts" class="nav-button" value="Drafts">  
    
    <?php endif ?>
    
    </div>
  </div>
  <!-- Table -->
  <div class="container-index" id="table-container">
    <h2 id="table-title"><?php echo $title ?></h2>
    <?php if (is_array($records) || is_object($records)): ?>
    <table id="proposal-table">
      <tr>
      <?php if ($this->session->userdata('org_type') != 'N/A'): ?>
        <th>#</th>
        <th>Proposal Title</th>
        <th>Date Submitted</th>
        <th>Office</th>
        <?php

        foreach($records as $record) {
          $counter = 1;
          echo "<tr>";
          echo "<td>" . $counter++ . "</td>";
          echo "<td>" . $record->ActivityName . "</td>";
          echo "<td>" . $record->DateProposed . "</td>";
          echo "<td>" . $record->OfficeProposal . "</td>";
          echo "<td><input type='button' class='button' id='btn_view' value='VIEW'></td>";
          echo "</tr>";
        } 

        ?>
      <?php else: ?>
        <th>#</th>
        <th>Proposal Title</th>
        <th>Date Submitted</th>
        <?php

        foreach($records as $record) {
          $counter = 1;
          echo "<tr>";
          echo "<td>" . $counter++ . "</td>";
          echo "<td>" . $record->ActivityName . "</td>";
          echo "<td>" . $record->DateProposed . "</td>";
          echo "<td><input type='button' class='button' id='btn_view' value='VIEW'></td>";
          echo "</tr>";
        } 

        ?>
      <?php endif ?>
      </tr>
    </table>
  <?php else: ?>
  <h1>No records</h1>
  <?php endif ?>
  </div>

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>



</body>
</html>


