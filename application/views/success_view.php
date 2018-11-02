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

</head>

<body>
  <div class="container-sent">
    <div class="margin-sent">
    <?php if ($org_type != 'N/A' && $proposal->ProposalStatus == 'PENDING'): ?>
      <div class="header-container-sent">
        <h1>Your proposal has been submitted!</h1>
        <hr>
      </div>

      <div class="body-container-sent">
        <p>Your proposal, <?=$proposal->ActivityName?>, has been submitted
        to the ! You can view your proposal by clicking 
        the View My Proposal button, otherwise click the Home button
        to redirect back to the home page </p>
      </div>

      <div class="button-container-sent">
        <a href="<?=base_url()?>home">
          <button type="button" id="button">Home</button>
        </a>
        <a href="<?=base_url()?>proposal/view/<?=$proposal_id?>">
          <button type="button" id="button">View My Proposal</button>
        </a>
      </div>
    <?php elseif ($org_type == 'N/A' && $proposal->ProposalStatus == 'UNDER REVISION'): ?>
      <div class="header-container-sent">
        <h1>Your comments have been submitted!</h1>
        <hr>
      </div>

      <div class="body-container-sent">
        <p>It has been submitted to <?=$proposal->Account_ID?>! IF you want to view your comments 
        just click the View My Comments button, otherwise click the Home button to 
        redirect to the home page</p>
      </div>

      <div class="button-container-sent">
        <a href="<?=base_url()?>home">
          <button type="button" id="button">Home</button>
        </a>
      </div>
    <?php endif ?>
    </div>
  </div>

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>
  <script type="text/javascript">
  var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?=base_url();?>assets/js/plugin.js"></script>
</body>

</html>