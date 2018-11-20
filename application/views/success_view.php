<!DOCTYPE html>
<html>
<head>
<?php if ($this->session->userdata('logged_in')): ?>
<?php 
$account_id = $this->session->userdata('account_id');
$org_type = $this->session->userdata('org_type');
$proposal_id = $proposal->Proposal_ID;
?>

<?php if (!$this->proposals_model->isThisMine($account_id, $proposal_id)):?>
  <?php redirect(base_url() . "home")?>
<?php endif ?>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Activity Proposal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?=base_url();?>assets/js/plugin.js"></script>


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">

</head>

<body class="oapps-bg-head">
  <div class="container-fluid" style="height: 100vh; max-width: 100%;">
    <div class="row no-gutters justify-content-center">
      <?php if ($org_type != 'N/A' && $proposal->ProposalStatus == 'PENDING'): ?>
      <div class="card w-50 mt-5">
        <div class="card-header">
          <h2>Proposal Successfully Submitted</h2>
        </div>
        <div class="card-body">
          <p>Your proposal, <?=$proposal->ActivityName?>, has been submitted
          to the ! You can view your proposal by clicking 
          the View My Proposal button, otherwise click the Home button
          to redirect back to the home page </p>
  
          <div class="button-container-sent">
            <a href="<?=base_url()?>home">
              <button class="btn btn-light" type="button" id="button">Home</button>
            </a>
            <a href="<?=base_url()?>proposal/view/<?=$proposal_id?>">
              <button class="btn btn-light" type="button" id="button">View My Proposal</button>
            </a>
          </div>
        </div>
      </div>
      <?php elseif ($org_type == 'N/A' && $proposal->ProposalStatus == 'UNDER REVISION'): ?>
  
      <div class="card w-75">
        <div class="card-header">
          <h2>Comments Successfully Submitted</h2>
        </div>
        <div class="card-body">
            <p>It has been submitted to <?=$proposal->Account_ID?>! IF you want to view your comments 
            just click the View My Comments button, otherwise click the Home button to 
            redirect to the home page</p>
  
          <div class="button-container-sent">
            <a href="<?=base_url()?>home">
              <button class="btn btn-light" type="button" id="button">Home</button>
            </a>
          </div>
        </div>
      </div>
      <?php endif ?>
    </div>
  </div>

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
    crossorigin="anonymous">
  </script>
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/dropdown.js">
  </script>
  <script src="<?=base_url();?>assets/js/plugin.js">
  </script>


</body>
</html>