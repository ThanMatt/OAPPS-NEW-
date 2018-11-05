<!doctype html>
<html lang="en">

<head>
  <?php $counter = 0?>
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php
  $prefix = $this->session->userdata('prefix');
  $account_id = $this->session->userdata('account_id');
  $organization = $this->session->userdata('organization');
  $full_name = $this->session->userdata('full_name');
  $position = $this->session->userdata('position');
  $org_type = $this->session->userdata('org_type');
?>
  <title>
    <?=strtoupper($prefix) . " - Index"?>
  </title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/boot_styles.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/progress.css">


</head>

<body>

  <?php
    $this->load->view('layouts/header');
  ?>
  <!-- MAIN START -->

  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-2 main" style="margin-left: 3vw !important; border: 0px;">
        <?php if ($this->session->userdata('org_type') == 'N/A'): ?>

        <div class="table-header button" id="btn_pending">
        <?php if ($this->notifications_model->checkNotifications($account_id)): ?>
          Pending*
        <?php else: ?>
          Pending
        <?php endif ?>
        </div>
        <div class="table-header button" id="btn_approved">
          Approved
        </div>
        <div class="table-header button" id="btn_revisions">
          Revisions
        </div>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/progress.css">
  </head>
  <body>
    <div class="container-fluid" style="height: 100vh; width: 100%;">
      <!-- primary header start -->
      
      <div class="row oapps-h oapps-bg-head"> <!-- HEADER ROW START -->
        <div class="col-lg-10"> <!-- TEXT COL START -->
          <div class="row"> <!-- TEXT ROW START -->
            <div class="col-lg-12 bottom-align-text">
              <p class="oapps-primaryhead-text-1" style="position: relative; top: 30px;">OAPPS</p>
            </div>
            <div class="col-lg-12">
              <a href="index.html">
                <p class="oapps-subhead-text-1">Online Activity Proposal Processing System</p>
              </a>
            </div>
          </div> <!-- TEXT ROW START -->
        </div> <!-- TEXT COL END -->
        <div class="col-lg-2 d-flex justify-content-end p-4"> <!-- DISPLAY PIC COL START -->
          <a href="profile.html">
            <div class="oapps-profile"></div>
          </a>
        </div> <!-- DISPLAY PIC COL END -->
      </div> <!-- HEADER END START -->
      <!-- primary header end -->
      <!-- secondary header start -->
      <div class="row oapps-sh oapps-bg-nav">

        <div class="table-header button" id="btn_pending">
        <?php if ($this->notifications_model->checkPendingNotifications($account_id)): ?>
          Pending*
        <?php else: ?>
          Pending
        <?php endif ?>
        </div>
        <div class="table-header button" id="btn_approved">
        <?php if ($this->notifications_model->checkApprovedNotifications($account_id)): ?>
          Approved*
        <?php else: ?>
          Approved
        <?php endif ?>
        </div>
        <div class="table-header button" id="btn_revisions">
        <?php if ($this->notifications_model->checkUnderRevNotifications($account_id)): ?>
          Revisions*
        <?php else: ?>
          Revisions
        <?php endif ?>
        </div>
        <div class="table-header button" id="btn_drafts">
          Drafts
        </div>
        <?php endif?>
      </div>
      <!-- secondary header end -->
      
      <div class="row mx-5 oapps-mh"> 
      <!-- MAIN START -->

       <!-- BUTTONS FOR OFFICES -->
       <?php if ($this->session->userdata('org_type') == 'N/A'): ?>
        <div class="col-lg-2 mt-5 h-100" > <!-- BUTTONS COL START -->
          <div class="row align-items-center"> <!-- BUTTONS ROW START-->
            <!-- PENDING -->
            <div class="oapps-btn oapps-hh col-12" id="btn_pending" style="border: 1px black solid">
              <p class="text-center oapps-bmb">
              <?php if ($this->notifications_model->checkNotifications($account_id)): ?>
                Pending <span class="badge badge-pill badge-danger"><?=$this->notifications_model->countNotifs($account_id) ?></span>
              <?php else: ?>
                Pending
              <?php endif ?>
              </p>
            </div>
            <!-- APPROVED -->
            <div class="oapps-btn oapps-hh col-12 mt-4" id="btn_approved" style="border: 1px black solid">
              <p class="text-center oapps-bmb">Approved</p>
            </div>
            <!-- REVISIONS -->
            <div class="oapps-btn oapps-hh col-12 mt-4" id="btn_revisions" style="border: 1px black solid">
              <p class="text-center oapps-bmb">Revisions</p>
            </div>
          </div> <!-- BUTTONS ROW END   -->
        </div> <!-- BUTTON COL END -->
        <?php else: ?>

        <!-- BUTTONS FOR ORGS -->

        <div class="col-lg-2 mt-5 h-100" > <!-- BUTTONS COL START -->
          <div class="row align-items-center"> <!-- BUTTONS ROW START-->
            <!-- PENDING -->
            <div class="oapps-btn oapps-hh col-12" id="btn_pending" style="border: 1px black solid">
              <p class="text-center oapps-bmb">
              <?php if ($this->notifications_model->checkPendingNotifications($account_id)): ?>
                Pending <span class="badge badge-pill badge-danger"><?=$this->notifications_model->countPendingNotifs($account_id) ?></span>
              <?php else: ?>
                Pending
              <?php endif ?>
              </p>
            </div>
            <!-- APPROVED -->
            <div class="oapps-btn oapps-hh col-12 mt-4" id="btn_approved" style="border: 1px black solid">
              <p class="text-center oapps-bmb">
              <?php if ($this->notifications_model->checkApprovedNotifications($account_id)): ?>
                Approved <span class="badge badge-pill badge-danger"><?=$this->notifications_model->countApprovedNotifs($account_id) ?></span>
              <?php else: ?>
                Approved
              <?php endif ?>
              </p>
            </div>
            <!-- REVISIONS -->
            <div class="oapps-btn oapps-hh col-12 mt-4" id="btn_revisions" style="border: 1px black solid">
              <p class="text-center oapps-bmb">
              <?php if ($this->notifications_model->checkUnderRevNotifications($account_id)): ?>
                Revisions <span class="badge badge-pill badge-danger"><?=$this->notifications_model->countUnderRevNotifs($account_id) ?></span>
              <?php else: ?>
                Revisions
              <?php endif ?>
              </p>
            </div>
            <!-- DRAFT -->
            <div class="oapps-btn oapps-hh col-12 mt-4" id="btn_drafts" style="border: 1px black solid">
              <p class="text-center oapps-bmb">
                Draft
              </p>
            </div>
          </div> <!-- BUTTONS ROW END   -->
        </div> <!-- BUTTON COL END -->
        <?php endif ?>
        

        <!-- PROPOSAL LIST -->

        <div class="col-lg-2 offset-lg-1 mt-5 oapps-rh h-100" style="border: 1px black solid"> <!-- PROPOSAL LIST COL START -->
          <div class="row oapps-bg-head"> <!-- PROPOSAL LIST HEAD ROW START -->
            <div class="oapps-hh col-12 oapps-head-text-1 text-white">
              <p class="text-center oapps-bmb">Proposal List</p>
            </div>
          </div> <!-- PROPOSAL LIST HEAD ROW END -->
          <div class="row oapps-ch" style="overflow-y: auto;"> <!-- PROPOSAL LIST ROW START -->

          <?php if (is_array($records) || is_object($records)): ?>
          <?php
            foreach ($records as $record) {
              $counter++;
              if ($org_type == 'N/A') {
                if ($this->proposals_model->checkDuplicationTitle($record->ActivityName)) {
                  if ($this->notifications_model->unreadNotification($record->Proposal_ID, $account_id)) {
                    echo '<div class="proposal-view button table-header" style="margin: 0 !important; border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;" id="view_btn/' . $record->Proposal_ID . '">' . $record->ActivityName . ' (' . $record->Account_ID . ')*' . '</div>';  
                  } else {
                    echo '<div class="proposal-view button table-header" style="margin: 0 !important; border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;" id="view_btn/' . $record->Proposal_ID . '">' . $record->ActivityName . ' (' . $record->Account_ID . ') ' . '</div>';
                  }

                } else {
                  if ($this->notifications_model->unreadNotification($record->Proposal_ID, $account_id)) {
                    echo '<div class="proposal-view button table-header" style="margin: 0 !important; border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;" id="view_btn/' . $record->Proposal_ID . '">' . $record->ActivityName . '*</div>';
                  } else {
                    echo '<div class="proposal-view button table-header" style="margin: 0 !important; border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;" id="view_btn/' . $record->Proposal_ID . '">' . $record->ActivityName . '</div>';
                  }
                }
              } else {
                if ($this->notifications_model->unreadNotification($record->Proposal_ID, $account_id)) {
                  echo '<div class="proposal-view button table-header" style="margin: 0 !important; border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;" id="view_btn/' . $record->Proposal_ID . '">' . $record->ActivityName . '*</div>';
                } else {
                  echo '<div class="proposal-view button table-header" style="margin: 0 !important; border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;" id="view_btn/' . $record->Proposal_ID . '">' . $record->ActivityName . '</div>';
                }
              }
            }
          ?>
          <?php else: ?>
          <h1 id="nav-left-container-no-records" class="button-no-record">No Records</h1>
          <?php endif?>
        </div>
      </div>
      <div class="col-md-6 main">
        <div class="table-header linear-gradient main-header-text">Proposal Overview</div>
        <div id="table-container" class="main-text" style="overflow-y: scroll;">
        </div>
      </div>
    </div>
  </div>

  <!-- MAIN END -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
    crossorigin="anonymous">
  </script>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
    crossorigin="anonymous">
  </script>


  <!-- Local files -->
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/core.js">
  </script>
  <script src="<?=base_url();?>assets/js/progress.js">
  </script>

  <?php else: ?>
  <?php
  $this->load->view('users/login_view');
  ?>
  <?php endif?>

</body>

</html>
