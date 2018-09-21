<!DOCTYPE html>
<html lang="en">
<head>
<?php $counter = 0 ?>
<!-- Check user login -->
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $prefix = $this->session->userdata('prefix'); 
  $account_id = $this->session->userdata('account_id'); 
  $organization = $this->session->userdata('organization');
  $full_name = $this->session->userdata('full_name');
  $position = $this->session->userdata('position');
  ?>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= strtoupper($prefix) . " - Index" ?></title>

  <link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">

  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
  </script>
  <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?= base_url();?>assets/js/core.js"></script>
  <script src="<?= base_url();?>assets/js/progress.js"></script>

</head>
<body>
  <div class="header-container">
    <header>
      <div class="header-margin">
        <div class="left-header-text">
          <h2 class="heady">
            <a href="home">
              OAPPS
            </a>
          </h2>
          <h4 class="smaller-heady">
            Online Activity Proposal Processing System
          </h4>
          <div class="dropdown">
            <div class="img">
              <img class="dropbtn" src="<?=base_url()?>assets/img/logo/<?=$prefix?>_logo.png">
            </div>
            <div id="myDropdown" class="dropdown-content">
              <div class="dropdown-details">
                Org: <?=strtoupper($prefix)?>
              </div>
              <div class="dropdown-details">
                <?=$position . ': ' . $full_name?>
              </div>
              <div>
                <a href="<?=base_url()?>accounts/logout">Log Out</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
  </div>

    <!-- Right Container -->

  <div class="nav-right-container-index">
    <div class="nav-right-container-margin-index">
    <!-- N/A means Not An org -->
    <?php if ($this->session->userdata('org_type') == 'N/A'): ?>
      
      <input type="button" id="btn_pending" class="nav-button-right" value="Pending">
      <input type="button" id="btn_approved" class="nav-button-right" value="Approved">
      <input type="button" id="btn_revisions" class="nav-button-right" value="Revisions">
  
    <?php else: ?>

      <input type="button" id="btn_pending" class="nav-button-right" value="Pending">
      <input type="button" id="btn_approved" class="nav-button-right" value="Approved">
      <input type="button" id="btn_revisions" class="nav-button-right" value="Revisions">
      <input type="button" id="btn_drafts" class="nav-button-right" value="Drafts">  
      <!-- <input type="button" id="btn_forms" class="nav-button-right" value="Forms">   -->
      <a href="<?=base_url()?>submit">
        <input type="button" id="btn_new" class="nav-button-right" value="Submit">  
      </a>
    <?php endif ?>
    
    </div>
  </div>

  <!-- Left Container-->

  <div class="nav-left-container-index">
    <div class="nav-left-container-header-index">
      <h2 id="table-title" class="header-texts"><?php echo $title ?></h2>
    </div>
    <?php if (is_array($records) || is_object($records)): ?>
      <?php
        foreach($records as $record) {
          $counter++;
          echo '<input type="button" id="view_btn/'.$record->Proposal_ID.'" class="nav-button-left" value="'. $record->ActivityName . '"/>';
        } 
      ?>
    <?php else: ?>
    <h1 id="nav-left-container-no-records">No Records</h1>
    <?php endif ?>
  </div>

  <!-- Table -->
<div class="container-index" id="table-container">
  <div class="nav-container-header-index">
    <h2 id="table-title" class="header-texts">Proposal Overview</h2>
  </div>
  <!-- Add Proposal Name, Organization Name, Organization Representative, Nature of Activity, Date Of Activity, Date Of Submission, Contact Number -->
</div>


  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>



</body>
</html>


