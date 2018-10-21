<!doctype html>
<html lang="en">
<head>
  <?php $counter = 0 ?>
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $prefix = $this->session->userdata('prefix'); 
  $account_id = $this->session->userdata('account_id'); 
  $organization = $this->session->userdata('organization');
  $full_name = $this->session->userdata('full_name');
  $position = $this->session->userdata('position');
  ?>
  <title><?= strtoupper($prefix) . " - Index" ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/boot_styles.css">
  

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
            Pending
          </div>
          <div class="table-header button" id="btn_approved">
            Approved
          </div>
          <div class="table-header button" id="btn_revisions">
            Revisions
          </div>

        <?php else: ?>

          <div class="table-header button" id="btn_pending">
            Pending
          </div>
          <div class="table-header button" id="btn_approved">
            Approved
          </div>
          <div class="table-header button" id="btn_revisions">
            Revisions
          </div>
          <div class="table-header button" id="btn_drafts">
            Drafts
          </div>
      <?php endif ?>
      </div>
      <div class="col-md-2 main">
        <div class="table-header linear-gradient main-header-text">Proposal List</div>
        <div class="main-text" style="overflow-y: scroll;">
          <?php if (is_array($records) || is_object($records)): ?>
            <?php
              foreach($records as $record) {
                $counter++;
                echo '<div class="proposal-view button table-header" style="margin: 0 !important; border-left: 0px; border-right: 0px; border-bottom: 0px; border-top: 0px;" id="view_btn/'.$record->Proposal_ID.'">'. $record->ActivityName . '</div>';
              } 
            ?>
          <?php else: ?>
            <h1 id="nav-left-container-no-records" class="button-no-record">No Records</h1>
          <?php endif ?>
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