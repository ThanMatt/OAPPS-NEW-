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
  <?php 
  $this->load->view('layouts/header');
  ?>

  <!-- MAIN START -->

  <div class="container profile-main">
    <div class="row">
      <div class="col-xs-12 profile-main-header" style="margin-left: 45%; margin-top: 1%;">
        Profile
      </div>
    </div>

    <div class="row">
      <div class="col-xs-3" style="margin-left: 50px;">
        <div class="display-picture-holder">
          <div class="display-picture">
            <img src="<?=base_url()?>assets/img/logo/<?=$prefix?>_logo.jpg">
          </div>
        </div>
      </div>
      <div class="col-xs-3 profile-main-header2" style="margin-top: 2.7vw; margin-left: 2%;">
        <?=$organization?>
      </div>
    </div>

    <div class="row">

      <!-- first half -->

      <div class="profile-main-text col-xs-5" style="width: 40% !important; margin-left: 50px;">
        <div class="profile-main-header2">Organization Details: </div>
        Organization Representative Name: <?=$full_name?> <br>
        Organization Representative Contact Number: <?=$contact_number?> <br>
        <br>

        <hr>

        <div class="profile-main-text col-xs-5" style="width: 100% !important; border: .5px #333 solid;">
          <div class="profile-main-header2">Pending Proposal List: </div> <br>
          <div class="profile-main-text" style="text-decoration: underline;">
          <?php if (is_array($pending_records) || is_object($pending_records)): ?>
          <?php
            foreach($pending_records as $pending_record) {
              echo '<a href='. base_url() .'proposal/view/'. $pending_record->Proposal_ID .'><div class="table-tae proposal-list-item"  style="width: 100% !important;" id="view_btn/'.$pending_record->Proposal_ID.'">'. $pending_record->ActivityName . ' - ' . $this->proposals_model->getSubmitDate($pending_record->Proposal_ID) .'</div></a>';
            } 
          ?>
        <?php else: ?>
          <h1 id="nav-left-container-no-records" class="proposal-list-empty">No Records</h1>
        <?php endif ?>
          </div>
        </div>
      </div>

      <!-- second half -->

      <div class="profile-main-text col-xs-5" style="width: 40% !important; margin-left: 70px;">
        <div class="profile-main-header2">Proposal Details: </div>
        Total Approved Proposals: <?=$this->proposals_model->countApprovedProposals($account_id, $org_type)?> <br>
        <?php if ($org_type != 'N/A'): ?>
        Total Expenditure: P 50 <br>
        Average Expenditure Per Proposal: P 4 <br>
        <?php endif ?>

        <hr>

        <div class="profile-main-text col-xs-5" style="width: 100% !important; border: .5px #333 solid;">
        <div class="profile-main-header2">Approved Proposal List: </div> <br>
          <div class="profile-main-text" style="text-decoration: underline;">
          <?php if (is_array($approved_records) || is_object($approved_records)): ?>
            <?php
              foreach($approved_records as $approved_record) {
                echo '<a href='. base_url() .'proposal/view/'. $approved_record->Proposal_ID .'><div class="table-tae proposal-list-item" style="width: 100% !important;" id="view_btn/'.$approved_record->Proposal_ID.'">'. $approved_record->ActivityName . ' - ' . $this->proposals_model->getApprovedDate($approved_record->Proposal_ID, $account_id, $org_type) . '</div></a>';
              } 
            ?>
          <?php else: ?>
            <h1 id="nav-left-container-no-records" class="proposal-list-empty">No Records</h1>
          <?php endif ?>
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
  <script src="<?= base_url();?>assets/js/dropdown.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>
</body>


</html>
