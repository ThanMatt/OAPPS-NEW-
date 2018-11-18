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
  <link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">
</head>
<body>
  <div class="container-fluid" style="height: 100vh; width: 100%;">
    
    <?php 
    $this->load->view('layouts/header');
    ?>
  
    <!-- MAIN START -->
  
    <div class="container profile-main">
      <div class="row">
        <div class="card mt-3 w-100">
          <div class="card-body">
            <h4 class="card-title">Profile</h4>
          </div>
        </div>
        <div class="card mb-3 w-100">
            <div class="card-body">
              <div class="display-picture-holder">
                <div class="display-picture">
                  <img src="<?=base_url()?>assets/img/logo/<?=$prefix?>_logo.jpg">
                </div>
              </div>
              <h4 class="card-title"><?=$organization?></h4>
            </div>
        </div>
  
        <div class="card mt-3 w-50">
          <div class="card-body">
            <h4 class="card-title">Organization Details: </h4>
            <p class="card-text">Organization Representative Name: <?=$full_name?> </p>
            <p class="card-text">Organization Representative Contact Number: <?=$contact_number?> </p>
          </div>
        </div>
  
        <div class="card mt-3 w-50">
          <div class="card-body">
            <h4 class="card-title">Proposal Details: </h4>
            <p class="card-text">Total Approved Proposals: <?=$this->proposals_model->countApprovedProposals($account_id, $org_type)?> </p>
            <?php if ($org_type != 'N/A'): ?>
              <p class="card-text">Total Expenditure: P 50</p>
              <p class="card-text">Average Expenditure Per Proposal: P 4 </p>
            <?php endif ?>
          </div>
        </div>
  
        <div class="card mt-3 w-50">
          <div class="card-body">
            <h4 class="card-title">Pending Proposal List: </h4>
  
            <?php if (is_array($pending_records) || is_object($pending_records)): ?>
              <?php
                foreach($pending_records as $pending_record) {
                if ($org_type == 'N/A') {
                  if ($this->proposals_model->checkDuplicationTitle($pending_record->ActivityName)) {
                    echo '<p class="card-text"><a style="text-decoration: underline !important; color: grey !important;" href='. base_url() .'proposal/view/'. $pending_record->Proposal_ID .'><div class="table-tae proposal-list-item" style="width: 100% !important;" id="view_btn/'.$pending_record->Proposal_ID.'">'. $pending_record->ActivityName . ' (' . $pending_record->Account_ID . ') ' .' - ' . $this->proposals_model->getSubmitDate($pending_record->Proposal_ID, $account_id, $org_type) . '</div></a></p>';
                  } else {
                    echo '<p class="card-text text-primary"><a style="text-decoration: underline !important; color: grey !important;" href='. base_url() .'proposal/view/'. $pending_record->Proposal_ID .'><div class="table-tae proposal-list-item" style="width: 100% !important;" id="view_btn/'.$pending_record->Proposal_ID.'">'. $pending_record->ActivityName . ' - ' . $this->proposals_model->getSubmitDate($pending_record->Proposal_ID, $account_id, $org_type) . '</div></a></p>';
                  }
                } else {
                    echo '<p class="card-text text-primary"><a style="text-decoration: underline !important; color: grey !important;" href='. base_url() .'proposal/view/'. $pending_record->Proposal_ID .'><div class="table-tae proposal-list-item" style="width: 100% !important;" id="view_btn/'.$pending_record->Proposal_ID.'">'. $pending_record->ActivityName . ' - ' . $this->proposals_model->getSubmitDate($pending_record->Proposal_ID, $account_id, $org_type) . '</div></a></p>';
                  }
                } 
              ?>
              <?php else: ?>
                <h1 id="nav-left-container-no-records" class="proposal-list-empty">No Records</h1>
              <?php endif ?>
          </div>
        </div>
  
        <div class="card mt-3 w-50">
          <div class="card-body">
            <h4 class="card-title">Approved Proposal List: </h4>
              <?php if (is_array($approved_records) || is_object($approved_records)): ?>
                <?php
                  foreach($approved_records as $approved_record) {
                    if ($org_type == 'N/A') {
                      if ($this->proposals_model->checkDuplicationTitle($approved_record->ActivityName)) {
                        echo '<p class="card-text"><a style="text-decoration: underline !important; color: grey !important;" href='. base_url() .'proposal/view/'. $approved_record->Proposal_ID .'><div class="table-tae proposal-list-item" style="width: 100% !important;" id="view_btn/'.$approved_record->Proposal_ID.'">'. $approved_record->ActivityName . ' (' . $approved_record->Account_ID . ') ' .' - ' . $this->proposals_model->getApprovedDate($approved_record->Proposal_ID, $account_id, $org_type) . '</div></a></p>';
                      } else {
                        echo '<p class="card-text"><a style="text-decoration: underline !important; color: grey !important;" href='. base_url() .'proposal/view/'. $approved_record->Proposal_ID .'><div class="table-tae proposal-list-item" style="width: 100% !important;" id="view_btn/'.$approved_record->Proposal_ID.'">'. $approved_record->ActivityName . ' - ' . $this->proposals_model->getApprovedDate($approved_record->Proposal_ID, $account_id, $org_type) . '</div></a></p>';
                      }
                    } else {
                      echo '<p class="card-text"><a style="text-decoration: underline !important; color: grey !important;" href='. base_url() .'proposal/view/'. $approved_record->Proposal_ID .'><div class="table-tae proposal-list-item" style="width: 100% !important;" id="view_btn/'.$approved_record->Proposal_ID.'">'. $approved_record->ActivityName . ' - ' . $this->proposals_model->getApprovedDate($approved_record->Proposal_ID, $account_id, $org_type) . '</div></a></p>';
                    }
                  } 
                ?>
              <?php else: ?>
                <h1 id="nav-left-container-no-records" class="proposal-list-empty">No Records</h1>
              <?php endif ?>
          </div>
        </div>
      </div>
    <!-- MAIN END -->
  </div>


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
