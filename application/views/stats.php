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
    <?php if ($prefix != 'OD'): ?>
      <?=strtoupper($prefix) . " | Index"?>
    <?php else: ?>
      <?=$position . " | Index"?>
    <?php endif ?>
  </title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
  crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
</head>
<body>
  <div class="container-fluid" style="height: 100vh; width: 100%;">

    <?php 
    $this->load->view('layouts/header');
    ?>
  
    <div class="row mx-5 oapps-mh"><!-- MAIN START -->
        <!-- READY TO BE LOOPED DE LOOPED -->
      <?php if (is_array($orgs) || is_object($orgs)): ?>
        <?php foreach ($orgs as $org): ?>
          <div class="card border-danger m-3">
            <div class="card-body">
              <h4 class="card-title"><?=$org->Organization?></h4>
              <div class="row h-75">
                <div class="col-6">
                <p class="card-text">Pending Proposals:</p>
                <?php 
                $pending_records = $this->proposals_model->showPendingRecords($org->Account_ID);
                ?>
                <?php if (is_array($pending_records) || is_object($pending_records)): ?>
                  <?php foreach($pending_records as $pending_record): ?>
                    <p class="card-text"><?=$pending_record->ActivityName?></p>
                  <?php endforeach ?>
                <?php endif ?>
           
                  <!-- <p class="card-text font-weight-bold">No Records</p> -->
            
                </div>
                <div class="col-6">
                  <p class="card-text">Approved Proposals:</p>
                  <?php 
                  $approved_records = $this->proposals_model->showApprovedRecords($org->Account_ID);
                  $counter = 0;
                  ?>
                  <?php if (is_array($approved_records) || is_object($approved_records)): ?>
                    <?php foreach($approved_records as $approved_record): ?>
                    <?php $counter++;?>
                      <p class="card-text"><?=$approved_record->ActivityName?></p>
                    <?php endforeach ?>
                  <?php endif ?>
                
                
                  <!-- <p class="card-text font-weight-bold">No Records</p> -->
                
                </div>
              </div>
              <h4 class="card-title mt-3">General Info</h4>
              <div class="row h-25">
                <div class="col-12">
                  <p class="card-text">Total Approved Proposals: <?=$counter?></p>
                  <p class="card-text">Total Expenditure: PHP <?=number_format($this->proposals_model->totalExpenditure($org->Account_ID))?></p>
                  <p class="card-text">Average Expenditure Per Proposal: PHP <?=number_format($this->proposals_model->averageExpenditure($org->Account_ID))?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php endif ?>
    </div> <!-- MAIN END -->
  </div>
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

<?php else: ?>
<title>
  Organization Reports
</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
  crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
</head>
<body>
  <div class="container-fluid" style="height: 100vh; width: 100%;">

    <?php 
    $this->load->view('layouts/guest_header');
    ?>
  
    <div class="row mx-5 oapps-mh"><!-- MAIN START -->
        <!-- READY TO BE LOOPED DE LOOPED -->
      <?php if (is_array($orgs) || is_object($orgs)): ?>
        <?php foreach ($orgs as $org): ?>
          <div class="card border-danger m-3">
            <div class="card-body">
              <h4 class="card-title"><?=$org->Organization?></h4>
              <div class="row h-75">
                <div class="col-6">
                <p class="card-text">Pending Proposals:</p>
                <?php 
                $pending_records = $this->proposals_model->showPendingRecords($org->Account_ID);
                ?>
                <?php if (is_array($pending_records) || is_object($pending_records)): ?>
                  <?php foreach($pending_records as $pending_record): ?>
                    <p class="card-text"><?=$pending_record->ActivityName?></p>
                  <?php endforeach ?>
                <?php endif ?>
           
                  <!-- <p class="card-text font-weight-bold">No Records</p> -->
            
                </div>
                <div class="col-6">
                  <p class="card-text">Approved Proposals:</p>
                  <?php 
                  $approved_records = $this->proposals_model->showApprovedRecords($org->Account_ID);
                  $counter = 0;
                  ?>
                  <?php if (is_array($approved_records) || is_object($approved_records)): ?>
                    <?php foreach($approved_records as $approved_record): ?>
                    <?php $counter++;?>
                      <p class="card-text"><?=$approved_record->ActivityName?></p>
                    <?php endforeach ?>
                  <?php endif ?>
                
                
                  <!-- <p class="card-text font-weight-bold">No Records</p> -->
                
                </div>
              </div>
              <h4 class="card-title mt-3">General Info</h4>
              <div class="row h-25">
                <div class="col-12">
                  <p class="card-text">Total Approved Proposals: <?=$counter?></p>
                  <p class="card-text">Total Expenditure: PHP <?=number_format($this->proposals_model->totalExpenditure($org->Account_ID))?></p>
                  <p class="card-text">Average Expenditure Per Proposal: PHP <?=number_format($this->proposals_model->averageExpenditure($org->Account_ID))?></p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      <?php endif ?>
    </div> <!-- MAIN END -->
  </div>
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

<?php endif?>
</body>



</html>