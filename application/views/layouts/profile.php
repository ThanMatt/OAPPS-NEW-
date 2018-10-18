<!DOCTYPE html>
<html lang="en">
<head>
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $org_type = $this->session->userdata('org_type');
  $prefix = $this->session->userdata('prefix'); 
  $account_id = $this->session->userdata('account_id'); 
  $organization = $this->session->userdata('organization');
  $full_name = $this->session->userdata('full_name');
  $position = $this->session->userdata('position');
  $contact_number = $this->session->userdata('contact_number');
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/boot_styles.css">
</head>
<body>
    <!-- MAIN HEADER START -->

  <div class="container-fluid linear-gradient header-height">
    <div class="row" style="width: 100%;">
      <div class="col-xl-4 col-md-4 col-xs-4">          
        <div class="javanese-header">
          <a href="<?=base_url()?>home">
            OAPPS
          </a>
        </div>
      </div>
      <div class="col-xl-8 col-md-8 col-xs-8">
        <div class="dropdown">
          <div class="img">
            <div class="display-picture-holder">
              <div class="display-picture">
                <img class="dropbtn" src="<?=base_url()?>assets/img/logo/<?=$prefix?>_logo.png">

              </div>
            </div>
          </div>
          <div id="myDropdown" class="dropdown-content">
            <div class="dropdown-details">
              Org: <?=strtoupper($prefix)?>
            </div>
            <div class="dropdown-details">
              <?=$position . ': ' . $full_name?>
            </div>
            <div>
              <a href="<?=base_url()?>home/profile">
                <div class="table-header button" id="profile_btn">
                  Profile
                </div>
              </a>
              <a href="<?=base_url()?>accounts/logout">
                <div class="table-header button" id="logout_btn">
                  Log Out
                </div>
              </a>
            </div>
          </div> 
        </div>
      </div>
      <div class="row col-md-12 col-xs-12 calibri-sub-header">
        <a href="<?=base_url()?>home">
          Online Activity Proposal Processing System
        </a>
      </div>
    </div>
  </div>

  <!-- MAIN HEADER END -->
  <!-- SECOND HEADER START -->

  <div class="container-fluid">
    <div class="row second-header-color second-header-height align-items-center" >
      <div style="width: 1% !important;">
    </div>
    <div class="col-md col-xs">
      <a href="<?=base_url()?>submit">
      <div class="second-header-text">Make New Proposal</div>
      </a>
    </div>     
    <div class="col-md col-xs">
      <div class="second-header-text">Reports</div>
    </div>   
    <div class="col-md col-xs">
      <div class="second-header-text">Downloadable Forms</div>
    </div> 
    <div class="col-md-7"></div>   
    </div>
  </div>

  <!-- SECOND HEADER END -->

  <!-- MAIN START -->

  <div class="container profile-main">
    <div class="row">
      <div class="col-xs-12 profile-main-header" style="margin-left: 45%; margin-top: 1%;">
        Profile
      </div>
    </div>

    <!-- For ORGS -->
    <?php if ($org_type != 'N/A'): ?>
    <div class="row">
      <div class="col-xs-3" style="margin-left: 50px;">
        <div class="display-picture-holder">
          <div class="display-picture">
            <img src="<?=base_url()?>assets/img/logo/<?=$prefix?>_logo.png">
          </div>
        </div>
      </div>
      <div class="col-xs-3 profile-main-header2" style="margin-top: 2.7vw; margin-left: 2%;">
        <?=$organization?>
      </div>
    </div>

    <div class="row">
      <div class="profile-main-text col-xs-5" style="width: 40% !important;">
        <div class="profile-main-header2">Organization Details: </div>
        Organization Representative Name: <?=$full_name?> <br>
        Organization Representative Contact Number: <?=$contact_number?> <br>

        <hr>

        <div class="profile-main-text col-xs-5" style="width: 100% !important; border: .5px #333 solid;">
          <div class="profile-main-header2">Pending Proposal List: </div> <br>
          <div class="profile-main-text" style="text-decoration: underline;">
          <?php if (is_array($pending_records) || is_object($pending_records)): ?>
          <?php
            foreach($pending_records as $record) {
              echo '<a href='. base_url() .'proposal/view/'. $record->Proposal_ID .'><div class="table-tae proposal-list-item" id="view_btn/'.$record->Proposal_ID.'">'. $record->ActivityName . '</div></a>';
            } 
          ?>
        <?php else: ?>
          <h1 id="nav-left-container-no-records" class="proposal-list-empty">No Records</h1>
        <?php endif ?>
          </div>
        </div>
        Total Approved Proposals: <?=$this->accounts_model->orgApprovedProposals($account_id)?> <br>
        Total Expenditure: P 50 <br>
        Average Expenditure Per Proposal: P 4 <br>


        


      </div>
      
      <div class="profile-main-text col-xs-5" style="margin-left: 10%; width: 40% !important; border: .5px #333 solid;">
        <div class="profile-main-header2">Approved Proposal List: </div> <br>
        <div class="profile-main-text" style="text-decoration: underline;">
        <?php if (is_array($approved_records) || is_object($approved_records)): ?>
          <?php
            foreach($approved_records as $record) {
              echo '<a href='. base_url() .'proposal/view/'. $record->Proposal_ID .'><div class="table-tae proposal-list-item" id="view_btn/'.$record->Proposal_ID.'">'. $record->ActivityName . ' - ' . $this->proposals_model->getApprovedDate($record->Proposal_ID) . '</div></a>';
            } 
          ?>
        <?php else: ?>
          <h1 id="nav-left-container-no-records" class="proposal-list-empty">No Records</h1>
        <?php endif ?>
        </div>
      </div>
    </div>

    <div style="height: 200px;"></div>

    <!-- For OFFICES -->
    <?php else: ?>

    <div class="row">
      <div class="profile-main-text col-xs-5" style="width: 40% !important;">
        <div class="profile-main-header2">Organization Details: </div>
        Name: <?=$full_name?><br>
        Position: <?=$position?> <br>
        Contact Number: <?=$contact_number?> <br>

        <hr>

        <div class="profile-main-text col-xs-5" style="width: 100% !important; border: .5px #333 solid;">
          <div class="profile-main-header2">Pending Proposal List: </div> <br>
          <div class="profile-main-text" style="text-decoration: underline;">
            Proposal Something 1 - datesubmitted (clicking will take them to proposal overview)<br>
            Proposal Something 2 - datesubmitted (arranged from OLDEST)<br>
            Proposal Something 3 - datesubmitted<br>
            Proposal Something 4 - datesubmitted<br>
            Proposal Something 5 - datesubmitted<br>
          </div>
        </div>
      </div>

      <div class="profile-main-text col-xs-5" style="margin-left: 10%; width: 40% !important; border: .5px #333 solid;">
        <div class="profile-main-header2">Approved Proposal List: </div> <br>
        <div class="profile-main-text" style="text-decoration: underline;">
          Proposal Something 1 - dateapproved (clicking will take them to proposal overview)<br>
          Proposal Something 2 - dateapproved (arranged from NEWEST)<br>
          Proposal Something 3 - dateapproved<br>
          Proposal Something 4 - dateapproved<br>
          Proposal Something 5 - dateapproved<br>
        </div>
        Total Approved Proposals: 10
      </div>
    </div>
  </div>
  <?php endif ?>

  <!-- MAIN END -->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
  </script>
  <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?= base_url();?>assets/js/core.js"></script>
  <script src="<?= base_url();?>assets/js/progress.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>
</body>


</html>